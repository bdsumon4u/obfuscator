<?php

namespace App;

use App\Facades\Hotash;
use Closure;
use Exception;
use Illuminate\Support\Str;

class Scrambler
{
    const SCRAMBLER_CONTEXT_VERSION = '1.1';

    private $r = null;     // seed and salt for random char generation, modified at each iteration.

    private $caseSensitive = true;     // self explanatory

    private $scrambleLength = 10;     // current length of scrambled names

    private $scrambleLengthMax = 32;     // max     length of scrambled names

    private $tIgnore = [];     // array where keys are names to ignore.

    private $tIgnorePrefix = [];     // array where keys are prefix of names to ignore.

    private $tScramble = [];     // array of scrambled items (key = source name , value = scrambled name)

    private $tRscramble = [];     // array of reversed scrambled items (key = scrambled name, value = source name)

    private $labelCounter = 0;     // internal label counter.

    private $contextDirectory = null;     // directory where the context is saved.

    private static $tReservedVariableNames = [
        'this', 'GLOBALS', '_SERVER', '_GET', '_POST', '_FILES', '_COOKIE', '_SESSION', '_ENV', '_REQUEST',
        'php_errormsg', 'HTTP_RAW_POST_DATA', 'http_response_header', 'argc', 'argv',
    ];

    private static $tReservedFunctionNames = [
        '__halt_compiler', '__autoload', 'abstract', 'and', 'array', 'as', 'bool', 'break', 'callable', 'case', 'catch',
        'class', 'clone', 'const', 'continue', 'declare', 'default', 'die', 'do', 'echo', 'else',
        'elseif', 'empty', 'enddeclare', 'endfor', 'endforeach', 'endif', 'endswitch', 'endwhile',
        'eval', 'exit', 'extends', 'false', 'final', 'finally', 'float', 'for', 'foreach', 'function', 'global', 'goto', 'if', 'fn',
        'implements', 'include', 'include_once', 'instanceof', 'insteadof', 'int', 'interface', 'isset', 'list',
        'namespace', 'new', 'null', 'or', 'print', 'private', 'protected', 'public', 'require', 'require_once',
        'return', 'static', 'string', 'switch', 'throw', 'trait', 'true', 'try', 'unset', 'use', 'var', 'while', 'xor', 'yield',
        'apache_request_headers',                        // seems that it is not included in get_defined_functions ..
    ];

    private static $tReservedClassNames = [
        'parent', 'self', 'static',                    // same reserved names for classes, interfaces  and traits...
        'int', 'float', 'bool', 'string', 'true', 'false', 'null', 'void', 'iterable', 'object',  'resource', 'scalar', 'mixed', 'numeric', 'fn',
    ];

    private static $tReservedMethodNames = ['__construct', '__destruct', '__call', '__callstatic', '__get', '__set', '__isset', '__unset', '__sleep', '__wakeup', '__tostring', '__invoke', '__set_state', '__clone', '__debuginfo'];

    public static function make($type): static
    {
        return match (true) {
            $type == 'constant' => (new static())
                ->caseSensitive()
                ->ignore(static::$tReservedFunctionNames)
                ->ignore(array_keys(get_defined_constants(false)))
                ->ignore(Hotash::get('t_ignore_constants', []))
                ->ignorePrefix(Hotash::get('t_ignore_constant_prefixes', [])),

            $type == 'konstant' => (new static())
                ->caseSensitive()
                ->ignore(static::$tReservedFunctionNames)
                ->ignore(array_keys(get_defined_constants(false)))
                ->ignore(Hotash::get('t_pre_defined_konstants', []), Hotash::get('t_ignore_pre_defined_classes', 'none') == 'all')
                ->ignore(function () {
                    $constants = Hotash::get('t_pre_defined_konstants_by_class', []);

                    return collect(Hotash::get('t_pre_defined_classes'))
                        ->flatMap(fn ($class) => $constants[$class] ?? [])
                        ->toArray();
                }, is_array(Hotash::get('t_ignore_pre_defined_classes', 'none')))
                ->ignore(Hotash::get('t_ignore_konstants', []))
                ->ignorePrefix(Hotash::get('t_ignore_konstant_prefixes', [])),

            $type == 'variable' => (new static())
                ->caseSensitive()
                ->ignore(static::$tReservedVariableNames)
                ->ignore(Hotash::get('t_ignore_variables', []))
                ->ignorePrefix(Hotash::get('t_ignore_variable_prefixes', [])),

            in_array($type, ['function', 'class', 'interface', 'trait', 'namespace']) => (new static())
                ->caseSensitive()
                ->ignore(static::$tReservedFunctionNames)
                ->ignore(get_defined_functions()['internal'])
                ->ignore(Hotash::get('t_ignore_functions', []))
                ->ignorePrefix(Hotash::get('t_ignore_function_prefixes', []))
                ->ignore(static::$tReservedClassNames)
                ->ignore(static::$tReservedVariableNames)
                ->ignore(Hotash::get('t_pre_defined_classes', []), Hotash::get('t_ignore_pre_defined_classes', 'none') == 'all')
                ->ignore(fn () => Hotash::get('t_ignore_pre_defined_classes'), is_array(Hotash::get('t_ignore_pre_defined_classes', 'none')))
                ->ignore(Hotash::get('t_ignore_classes', []))
                ->ignore(Hotash::get('t_ignore_interfaces', []))
                ->ignore(Hotash::get('t_ignore_traits', []))
                ->ignore(Hotash::get('t_ignore_namespaces', []))
                ->ignorePrefix(Hotash::get('t_ignore_class_prefixes', []))
                ->ignorePrefix(Hotash::get('t_ignore_interface_prefixes', []))
                ->ignorePrefix(Hotash::get('t_ignore_trait_prefixes', []))
                ->ignorePrefix(Hotash::get('t_ignore_namespace_prefixes', [])),

            $type == 'property' => (new static())
                ->caseSensitive()
                ->ignore(static::$tReservedVariableNames)
                ->ignore(Hotash::get('t_pre_defined_properties'), Hotash::get('t_ignore_pre_defined_classes', 'none') == 'all')
                ->ignore(function () {
                    $properties = Hotash::get('t_pre_defined_properties_by_class', []);

                    return collect(Hotash::get('t_pre_defined_classes'))
                        ->flatMap(fn ($class) => $properties[$class] ?? [])
                        ->toArray();
                }, is_array(Hotash::get('t_ignore_pre_defined_classes', 'none')))
                ->ignore(Hotash::get('t_ignore_properties', []))
                ->ignorePrefix(Hotash::get('t_ignore_property_prefixes', [])),

            $type == 'method' => (new static())
                ->caseSensitive()
                ->ignore(Hotash::get('parser_mode') == 'ONLY_PHP7' ? [] : static::$tReservedFunctionNames)
                ->ignore(static::$tReservedMethodNames)
                ->ignore(get_defined_functions()['internal'])
                ->ignore(Hotash::get('t_pre_defined_methods'), Hotash::get('t_ignore_pre_defined_classes', 'none') == 'all')
                ->ignore(function () {
                    $methods = Hotash::get('t_pre_defined_methods_by_class', []);

                    return collect(Hotash::get('t_pre_defined_classes'))
                        ->flatMap(fn ($class) => $methods[$class] ?? [])
                        ->toArray();
                }, is_array(Hotash::get('t_ignore_pre_defined_classes', 'none')))
                ->ignore(Hotash::get('t_ignore_methods', []))
                ->ignorePrefix(Hotash::get('t_ignore_method_prefixes', [])),

            $type == 'label' => (new static())
                ->caseSensitive()
                ->ignore(static::$tReservedFunctionNames)
                ->ignore(Hotash::get('t_ignore_labels', []))
                ->ignorePrefix(Hotash::get('t_ignore_label_prefixes', [])),
            default => throw new Exception('Undefined scrambler type'),
        };
    }

    public function __construct()
    {
        $this->r = md5(microtime(true));     // random seed

        // if (file_exists($file = "{$this->contextDirectory}/obfuscator/context/{$this->scrambleType}")) {
        //     $t = unserialize(file_get_contents($file));
        //     if ($t[0] !== self::SCRAMBLER_CONTEXT_VERSION) {
        //         fprintf(STDERR, "Error:\tContext format has changed! run with --clean option!".PHP_EOL);
        //         $this->contextDirectory = null;        // do not overwrite incoherent values when exiting
        //         exit(1);
        //     }
        //     $this->tScramble = $t[1];
        //     $this->tRscramble = $t[2];
        //     $this->scrambleLength = $t[3];
        //     $this->labelCounter = $t[4];
        // }
    }

    public function caseSensitive(bool $caseSensitive = true): static
    {
        $this->caseSensitive = $caseSensitive;

        return $this;
    }

    public function ignore(array|Closure $value, bool|Closure $condition = true): static
    {
        if (value($condition)) {
            $this->tIgnore = array_merge($this->tIgnore, value($value));
        }

        return $this;
    }

    public function ignorePrefix(array|Closure $value, bool|Closure $condition = true): static
    {
        if (value($condition)) {
            $this->tIgnorePrefix = array_merge($this->tIgnorePrefix, value($value));
        }

        return $this;
    }

    public function __destruct()
    {
        // if (! Hotash::get('silent')) {
        //     fprintf(STDERR, "Info:\t[%-17s] scrambled \t: %8d%s", $this->scrambleType, count($this->tScramble), PHP_EOL);
        // }
        // if (isset($this->contextDirectory)) {                            // the destructor will save the current context
        //     $t = [];
        //     $t[0] = self::SCRAMBLER_CONTEXT_VERSION;
        //     $t[1] = $this->tScramble;
        //     $t[2] = $this->tRscramble;
        //     $t[3] = $this->scrambleLength;
        //     $t[4] = $this->labelCounter;
        //     file_put_contents("{$this->contextDirectory}/obfuscator/context/{$this->scrambleType}", serialize($t));
        // }
    }

    private function str_scramble($s)                                   // scramble the string according parameters
    {
        $c1 = 'x';      // first char of the identifier
        $c2 = Str::random(1);      // prepending salt for md5
        $this->r = str_shuffle(md5($c2.$s.md5($this->r)));           // 32 chars random hex number derived from $s and lot of pepper and salt

        for ($i = 0, $l = $this->scrambleLength - 1; $i < $l; $i++) {
            $c1 .= substr($this->r, $i, 1);
        }

        return $c1;
    }

    private function case_shuffle($s)   // this function is used to even more obfuscate insensitive names: on each acces to the name, a different randomized case of each letter is used.
    {
        for ($i = 0; $i < strlen($s); $i++) {
            $s[$i] = mt_rand(0, 1) ? strtoupper($s[$i]) : strtolower($s[$i]);
        }

        return $s;
    }

    public function scramble(string $s)
    {
        dump('scrambling: '.$s);
        $r = $s;
        // $r = $this->caseSensitive ? $s : strtolower($s);
        if (in_array($r, $this->tIgnore)) {
            return $s;
        }

        foreach ($this->tIgnorePrefix as $key) {
            if (substr($r, 0, strlen($key)) === $key) {
                return $s;
            }
        }

        if (isset($this->tScramble[$r])) {
            return $this->tScramble[$r];
        }

        if (! isset($this->tScramble[$r])) {      // if not already scrambled:
            for ($i = 0; $i < 50; $i++) {                // try at max 50 times if the random generated scrambled string has already beeen generated!
                $x = $this->str_scramble($s);
                $z = strtolower($x);
                $y = $this->caseSensitive ? $x : $z;
                if (isset($this->tRscramble[$y]) || isset($this->tIgnore[$z])) {           // this random value is either already used or a reserved name
                    if (($i == 5) && ($this->scrambleLength < $this->scrambleLengthMax)) {
                        $this->scrambleLength++;
                    }    // if not found after 5 attempts, increase the length...

                    continue;                                                                                           // the next attempt will always be successfull, unless we already are maxlength
                }
                $this->tScramble[$r] = $y;
                $this->tRscramble[$y] = $r;
                break;
            }
            if (! isset($this->tScramble[$r])) {
                fprintf(STDERR, 'Scramble Error: Identifier not found after 50 iterations!%sAborting...%s', PHP_EOL, PHP_EOL); // should statistically never occur!
                exit(2);
            }
        }

        return $this->tScramble[$r];

        return $this->caseSensitive ? $this->tScramble[$r] : $this->case_shuffle($this->tScramble[$r]);
    }

    public function unscramble($s)
    {
        if (! $this->caseSensitive) {
            $s = strtolower($s);
        }

        return isset($this->tRscramble[$s]) ? $this->tRscramble[$s] : '';
    }

    public function generateLabelName($prefix = '!label')
    {
        return $this->scramble($prefix.($this->labelCounter++));
    }
}

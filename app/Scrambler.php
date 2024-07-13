<?php

namespace App;

use App\Facades\Hotash;
use Illuminate\Support\Str;

class Scrambler
{
    const SCRAMBLER_CONTEXT_VERSION = '1.1';

    private static array $scramblers = [];

    private $r = null;     // seed and salt for random char generation, modified at each iteration.

    private $caseSensitive = true;     // self explanatory

    private $scrambleLength = 10;     // current length of scrambled names

    private $scrambleLengthMin = 6;     // min     length of scrambled names

    private $scrambleLengthMax = 32;     // max     length of scrambled names

    private $tIgnore = [];     // array where keys are names to ignore.

    private $tIgnorePrefix = [];     // array where keys are prefix of names to ignore.

    private $tScramble = [];     // array of scrambled items (key = source name , value = scrambled name)

    private $tRscramble = [];     // array of reversed scrambled items (key = scrambled name, value = source name)

    private $labelCounter = 0;     // internal label counter.

    private $tReservedVariableNames = [
        'this', 'GLOBALS', '_SERVER', '_GET', '_POST', '_FILES', '_COOKIE', '_SESSION', '_ENV', '_REQUEST',
        'php_errormsg', 'HTTP_RAW_POST_DATA', 'http_response_header', 'argc', 'argv',
    ];

    private $tReservedFunctionNames = [
        '__halt_compiler', '__autoload', 'abstract', 'and', 'array', 'as', 'bool', 'break', 'callable', 'case', 'catch',
        'class', 'clone', 'const', 'continue', 'declare', 'default', 'die', 'do', 'echo', 'else',
        'elseif', 'empty', 'enddeclare', 'endfor', 'endforeach', 'endif', 'endswitch', 'endwhile',
        'eval', 'exit', 'extends', 'false', 'final', 'finally', 'float', 'for', 'foreach', 'function', 'global', 'goto', 'if', 'fn',
        'implements', 'include', 'include_once', 'instanceof', 'insteadof', 'int', 'interface', 'isset', 'list',
        'namespace', 'new', 'null', 'or', 'print', 'private', 'protected', 'public', 'require', 'require_once',
        'return', 'static', 'string', 'switch', 'throw', 'trait', 'true', 'try', 'unset', 'use', 'var', 'while', 'xor', 'yield',
        'apache_request_headers',                        // seems that it is not included in get_defined_functions ..
    ];

    private $tReservedClassNames = [
        'parent', 'self', 'static',                    // same reserved names for classes, interfaces  and traits...
        'int', 'float', 'bool', 'string', 'true', 'false', 'null', 'void', 'iterable', 'object',  'resource', 'scalar', 'mixed', 'numeric', 'fn',
    ];

    private $tReservedMethodNames = ['__construct', '__destruct', '__call', '__callstatic', '__get', '__set', '__isset', '__unset', '__sleep', '__wakeup', '__tostring', '__invoke', '__set_state', '__clone', '__debuginfo'];

    public static function make($scrambleType, $contextDirectory = null): static
    {
        if (isset(static::$scramblers[$scrambleType])) {
            return static::$scramblers[$scrambleType];
        }

        return static::$scramblers[$scrambleType] = new static($scrambleType, $contextDirectory);
    }

    public function __construct(
        private $scrambleType,     // type on which scrambling is done (i.e. variable, function, etc.)
        private $contextDirectory,
    ) {
        $this->r = md5(microtime(true));     // random seed

        switch ($scrambleType) {
            case 'constant':
                $this->caseSensitive = true;
                $this->tIgnore = array_merge($this->tIgnore, $this->tReservedFunctionNames, array_keys(get_defined_constants(false)));
                if ($ignore = Hotash::get('t_ignore_constants')) {
                    $this->tIgnore = array_merge($this->tIgnore, $ignore);
                }
                if ($prefix = Hotash::get('t_ignore_constants_prefix')) {
                    $this->tIgnorePrefix = $prefix;
                }
                break;
            case 'class_constant':
                $this->caseSensitive = true;
                $this->tIgnore = array_merge($this->tIgnore, $this->tReservedFunctionNames, array_keys(get_defined_constants(false)));
                if (($ignore = Hotash::get('t_ignore_pre_defined_classes')) != 'none') {
                    if ($ignore == 'all') {
                        $this->tIgnore = array_merge($this->tIgnore, Hotash::get('t_pre_defined_class_constants'));
                    }
                    if (is_array($ignore)) {
                        $t_pre_defined_class_constants_by_class = Hotash::get('t_pre_defined_class_constants_by_class');
                        foreach ($ignore as $class_name) {
                            $this->tIgnore = array_merge($this->tIgnore, $t_pre_defined_class_constants_by_class[$class_name] ?? []);
                        }
                    }
                }
                if ($ignore = Hotash::get('t_ignore_class_constants')) {
                    $this->tIgnore = array_merge($this->tIgnore, $ignore);
                }
                if ($prefix = Hotash::get('t_ignore_class_constants_prefix')) {
                    $this->tIgnorePrefix = $prefix;
                }
                break;
            case 'variable':
                $this->caseSensitive = true;
                $this->tIgnore = $this->tReservedVariableNames;
                if ($ignore = Hotash::get('t_ignore_variables')) {
                    $this->tIgnore = array_merge($this->tIgnore, $ignore);
                }
                if ($prefix = Hotash::get('t_ignore_variables_prefix')) {
                    $this->tIgnorePrefix = $prefix;
                }
                break;
                /*
            //  case 'function':
            //     $this->case_sensitive       = false;
            //     $this->t_ignore             = array_flip($this->t_reserved_function_names);
            //     $t                          = get_defined_functions();                  $t = array_map('strtolower',$t['internal']);    $t = array_flip($t);
            //     $this->t_ignore             = array_merge($this->t_ignore,$t);
            //     if (isset($conf->t_ignore_functions))
            //     {
            //         $t                      = $conf->t_ignore_functions;                $t = array_map('strtolower',$t);                $t = array_flip($t);
            //         $this->t_ignore         = array_merge($this->t_ignore,$t);
            //     }
            //     if (isset($conf->t_ignore_functions_prefix))
            //     {
            //         $t                      = $conf->t_ignore_functions_prefix;         $t = array_map('strtolower',$t);                $t = array_flip($t);
            //         $this->t_ignore_prefix  = $t;
            //     }
            //     break;
            //     */
            case 'property':
                $this->caseSensitive = true;
                $this->tIgnore = $this->tReservedVariableNames;
                if (($ignore = Hotash::get('t_ignore_pre_defined_classes')) != 'none') {
                    if ($ignore == 'all') {
                        $this->tIgnore = array_merge($this->tIgnore, Hotash::get('t_pre_defined_class_properties'));
                    }
                    if (is_array($ignore)) {
                        $t_pre_defined_class_properties_by_class = Hotash::get('t_pre_defined_class_properties_by_class');
                        foreach ($ignore as $class_name) {
                            $this->tIgnore = array_merge($this->tIgnore, $t_pre_defined_class_properties_by_class[$class_name] ?? []);
                        }
                    }
                }
                if ($ignore = Hotash::get('t_ignore_properties')) {
                    $this->tIgnore = array_merge($this->tIgnore, $ignore);
                }
                if ($prefix = Hotash::get('t_ignore_properties_prefix')) {
                    $this->tIgnorePrefix = $prefix;
                }
                break;
            case 'function_or_class':           // same instance is used for scrambling classes, interfaces, and traits.  and namespaces... and functions ...for aliasing
                $this->caseSensitive = false;
                $this->tIgnore = array_merge($this->tIgnore, $this->tReservedFunctionNames, $this->tReservedClassNames, $this->tReservedVariableNames, get_defined_functions()['internal']);
                if ($ignore = Hotash::get('t_ignore_functions')) {
                    $this->tIgnore = array_merge($this->tIgnore, $ignore);
                }
                if ($prefix = Hotash::get('t_ignore_functions_prefix')) {
                    $this->tIgnorePrefix = $prefix;
                }

                if (($ignore = Hotash::get('t_ignore_pre_defined_classes')) != 'none') {
                    if ($ignore == 'all') {
                        $this->tIgnore = array_merge($this->tIgnore, $t = Hotash::get('t_pre_defined_classes'));
                    }
                    if (is_array($ignore)) {
                        foreach ($ignore as $class_name) {
                            if (isset($t[$class_name])) {
                                $this->tIgnore[] = $t;
                            }
                        }
                    }
                }
                $this->tIgnore = array_merge(
                    $this->tIgnore,
                    Hotash::get('t_ignore_classes', []),
                    Hotash::get('t_ignore_interfaces', []),
                    Hotash::get('t_ignore_traits', []),
                    Hotash::get('t_ignore_namespaces', []),
                );

                $this->tIgnorePrefix = array_merge(
                    $this->tIgnorePrefix,
                    Hotash::get('t_ignore_classes_prefix', []),
                    Hotash::get('t_ignore_interfaces_prefix', []),
                    Hotash::get('t_ignore_traits_prefix', []),
                    Hotash::get('t_ignore_namespaces_prefix', []),
                );
                break;
            case 'method':
                $this->caseSensitive = false;
                if (Hotash::get('parser_mode') == 'ONLY_PHP7') {
                    $this->tIgnore = [];
                }      // in php7 method names can be keywords
                else {
                    $this->tIgnore = $this->tReservedFunctionNames;
                }

                $this->tIgnore = array_merge($this->tIgnore, $this->tReservedMethodNames, get_defined_functions());

                if (($ignore = Hotash::get('t_ignore_pre_defined_classes')) != 'none') {
                    if ($ignore == 'all') {
                        $this->tIgnore = array_merge($this->tIgnore, Hotash::get('t_pre_defined_class_methods'));
                    }
                    if (is_array($ignore)) {
                        $t_pre_defined_class_methods_by_class = Hotash::get('t_pre_defined_class_methods_by_class');
                        foreach ($ignore as $class_name) {
                            $this->tIgnore = array_merge($this->tIgnore, $t_pre_defined_class_methods_by_class[$class_name]);
                        }
                    }
                }
                if ($ignore = Hotash::get('t_ignore_methods')) {
                    $this->tIgnore = array_merge($this->tIgnore, $ignore);
                }
                if ($prefix = Hotash::get('t_ignore_methods_prefix')) {
                    $this->tIgnorePrefix = $prefix;
                }
                break;
            case 'label':
                $this->caseSensitive = true;
                $this->tIgnore = $this->tReservedFunctionNames;
                if ($ignore = Hotash::get('t_ignore_labels')) {
                    $this->tIgnore = array_merge($this->tIgnore, $ignore);
                }
                if ($prefix = Hotash::get('t_ignore_labels_prefix')) {
                    $this->tIgnorePrefix = $prefix;
                }
                break;
        }

        if (file_exists($file = "{$this->contextDirectory}/obfuscator/context/{$this->scrambleType}")) {
            $t = unserialize(file_get_contents($file));
            if ($t[0] !== self::SCRAMBLER_CONTEXT_VERSION) {
                fprintf(STDERR, "Error:\tContext format has changed! run with --clean option!".PHP_EOL);
                $this->contextDirectory = null;        // do not overwrite incoherent values when exiting
                exit(1);
            }
            $this->tScramble = $t[1];
            $this->tRscramble = $t[2];
            $this->scrambleLength = $t[3];
            $this->labelCounter = $t[4];
        }
    }

    public function __destruct()
    {
        if (! Hotash::get('silent')) {
            fprintf(STDERR, "Info:\t[%-17s] scrambled \t: %8d%s", $this->scrambleType, count($this->tScramble), PHP_EOL);
        }
        if (isset($this->contextDirectory)) {                            // the destructor will save the current context
            $t = [];
            $t[0] = self::SCRAMBLER_CONTEXT_VERSION;
            $t[1] = $this->tScramble;
            $t[2] = $this->tRscramble;
            $t[3] = $this->scrambleLength;
            $t[4] = $this->labelCounter;
            file_put_contents("{$this->contextDirectory}/obfuscator/context/{$this->scrambleType}", serialize($t));
        }
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
        return $prefix.($this->labelCounter++);
    }
}

<?php

namespace App;

use Illuminate\Support\Collection;
use ReflectionClass;

class Hotash extends Collection
{
    const VERSION = '1.0';

    private array $scramblers = [];

    public function comment($comment = ''): string
    {
        $comment .= "/*   ___________________________________________________" . PHP_EOL;
        $comment .= "    |    Obfuscated by Hotash - PHP Obfuscator   %-6.6s |" . PHP_EOL;
        $comment .= "    |              on %s              |" . PHP_EOL;
        $comment .= "    |  GitHub: https://github.com/bdsumon4u/obfuscator  |" . PHP_EOL;
        $comment .= "    |___________________________________________________|" . PHP_EOL;
        $comment .= "*/" . PHP_EOL;

        return sprintf($comment, static::VERSION, date('Y-m-d  H:i:s'));
    }

    public function processDefinedClassNames(): void
    {
        $this->prepend(array_merge(
            get_declared_classes(),
            get_declared_interfaces(),
            get_declared_traits(),
        ), 't_pre_defined_classes');

        foreach ($this->get('t_pre_defined_classes') as $pre_defined_class) {
            $t = get_class_methods($pre_defined_class);
            $this->items['t_pre_defined_methods_by_class'][$pre_defined_class] = $t;
            $this->items['t_pre_defined_methods'] = array_merge($this->get('t_pre_defined_methods', []), $t);

            $t = array_keys(get_class_vars($pre_defined_class));
            $this->items['t_pre_defined_properties_by_class'][$pre_defined_class] = $t;
            $this->items['t_pre_defined_properties'] = array_merge($this->get('t_pre_defined_properties', []), $t);

            $t = array_keys((new ReflectionClass($pre_defined_class))->getConstants());
            $this->items['t_pre_defined_konstants_by_class'][$pre_defined_class] = $t;
            $this->items['t_pre_defined_konstants'] = array_merge($this->get('t_pre_defined_konstants', []), $t);
        }
    }

    public function stack(string $key, $value)
    {
        if (is_array($this->items[$key] ?? null)) {
            $this->items[$key][] = $value;
        } else {
            $this->items[$key] = [$value];
        }
    }

    public function unstack(string $key)
    {
        return array_pop($this->items[$key]);
    }

    public function scrambler(string $type): Scrambler
    {
        if (!isset($this->scramblers[$type])) {
            $this->scramblers[$type] = Scrambler::make($type);
        }

        return $this->scramblers[$type];
    }
}

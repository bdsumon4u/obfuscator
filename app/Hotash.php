<?php

namespace App;

use Illuminate\Support\Collection;
use ReflectionClass;

class Hotash extends Collection
{
    public function processDefinedClassNames(): void
    {
        $this->prepend(array_merge(
            get_declared_classes(),
            get_declared_interfaces(),
            get_declared_traits(),
        ), 't_pre_defined_classes');

        foreach ($this->get('t_pre_defined_classes') as $pre_defined_class_name) {
            $t = get_class_methods($pre_defined_class_name);
            $this->items['t_pre_defined_class_methods_by_class'][$pre_defined_class_name] = $t;
            $this->items['t_pre_defined_class_methods'] = array_merge($this->get('t_pre_defined_class_methods', []), $t);

            $t = array_keys(get_class_vars($pre_defined_class_name));
            $this->items['t_pre_defined_class_properties_by_class'][$pre_defined_class_name] = $t;
            $this->items['t_pre_defined_class_properties'] = array_merge($this->get('t_pre_defined_class_properties', []), $t);

            $t = array_keys((new ReflectionClass($pre_defined_class_name))->getConstants());
            $this->items['t_pre_defined_class_constants_by_class'][$pre_defined_class_name] = $t;
            $this->items['t_pre_defined_class_constants'] = array_merge($this->get('t_pre_defined_class_constants', []), $t);
        }
    }

    public function stack_push(string $key, $value)
    {
        $this->items[$key] = array_merge($this->get($key, []), [$value]);
    }

    public function stack_pop(string $key)
    {
        return array_pop($this->items[$key]);
    }
}

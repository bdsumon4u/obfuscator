<?php

namespace App\Commands\Traits;

use App\Facades\Hotash;

trait HasConfig
{
    private function processArguments(): void
    {
        $this->askToIgnoreConstant();
        $this->askToIgnoreVariable();
        $this->askToIgnoreFunction();
        $this->askToIgnoreClass();
        $this->askToIgnoreKonstant();
        $this->askToIgnoreInterface();
        $this->askToIgnoreTrait();
        $this->askToIgnoreProperty();
        $this->askToIgnoreMethod();
        $this->askToIgnoreNamespace();
        $this->askToIgnoreLabel();
    }

    private function askToIgnoreConstant(): void
    {
        if (($value = $this->ask('Enter the constants to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_constants', array_map('trim', explode(',', $value)));
        }

        if (($value = $this->ask('Enter the constant prefixes to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_constant_prefixes', array_map('trim', explode(',', $value)));
        }
    }

    private function askToIgnoreVariable(): void
    {
        if (($value = $this->ask('Enter the variables to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_variables', array_map('trim', explode(',', $value)));
        }

        if (($value = $this->ask('Enter the variable prefixes to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_variable_prefixes', array_map('trim', explode(',', $value)));
        }
    }

    private function askToIgnoreFunction(): void
    {
        if (($value = $this->ask('Enter the functions to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_functions', array_map('trim', explode(',', $value)));
        }

        if (($value = $this->ask('Enter the function prefixes to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_function_prefixes', array_map('trim', explode(',', $value)));
        }
    }

    private function askToIgnoreClass(): void
    {
        if (($value = $this->ask('Enter the classes to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_classes', array_map('trim', explode(',', $value)));
        }

        if (($value = $this->ask('Enter the class prefixes to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_class_prefixes', array_map('trim', explode(',', $value)));
        }
    }

    private function askToIgnoreKonstant(): void
    {
        if (($value = $this->ask('Enter the konstants to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_konstants', array_map('trim', explode(',', $value)));
        }

        if (($value = $this->ask('Enter the konstant prefixes to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_konstant_prefixes', array_map('trim', explode(',', $value)));
        }
    }

    private function askToIgnoreInterface(): void
    {
        if (($value = $this->ask('Enter the interfaces to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_interfaces', array_map('trim', explode(',', $value)));
        }

        if (($value = $this->ask('Enter the interface prefixes to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_interface_prefixes', array_map('trim', explode(',', $value)));
        }
    }

    private function askToIgnoreTrait(): void
    {
        if (($value = $this->ask('Enter the traits to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_traits', array_map('trim', explode(',', $value)));
        }

        if (($value = $this->ask('Enter the trait prefixes to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_trait_prefixes', array_map('trim', explode(',', $value)));
        }
    }

    private function askToIgnoreProperty(): void
    {
        if (($value = $this->ask('Enter the properties to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_properties', array_map('trim', explode(',', $value)));
        }

        if (($value = $this->ask('Enter the property prefixes to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_property_prefixes', array_map('trim', explode(',', $value)));
        }
    }

    private function askToIgnoreMethod(): void
    {
        if (($value = $this->ask('Enter the methods to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_methods', array_map('trim', explode(',', $value)));
        }

        if (($value = $this->ask('Enter the method prefixes to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_method_prefixes', array_map('trim', explode(',', $value)));
        }
    }

    private function askToIgnoreNamespace(): void
    {
        if (($value = $this->ask('Enter the namespaces to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_namespaces', array_map('trim', explode(',', $value)));
        }

        if (($value = $this->ask('Enter the namespace prefixes to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_namespace_prefixes', array_map('trim', explode(',', $value)));
        }
    }

    private function askToIgnoreLabel(): void
    {
        if (($value = $this->ask('Enter the labels to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_labels', array_map('trim', explode(',', $value)));
        }

        if (($value = $this->ask('Enter the label prefixes to ignore', $default = 'none')) !== $default) {
            Hotash::put('t_ignore_label_prefixes', array_map('trim', explode(',', $value)));
        }
    }

    private function processOptions(): void
    {
        if ($this->option('shuffle-statements')) {
            Hotash::put('t_shuffle_statements', true);

            Hotash::put('shuffle_stmts_min_chunk_size', $this->option('shuffle-min-chunk-size') ?? 1);
            Hotash::put('shuffle_stmts_chunk_mode', $this->option('shuffle-chunk-mode') ?? 'fixed');
            Hotash::put('shuffle_stmts_chunk_ratio', $this->option('shuffle-chunk-ratio') ?? 5);
        }

        if ($this->option('obfuscate-string-literal')) {
            Hotash::put('t_obfuscate_string_literal', true);
        }

        if ($this->option('obfuscate-loop-statement')) {
            Hotash::put('t_obfuscate_loop_statement', true);
        }

        if ($this->option('obfuscate-if-statement')) {
            Hotash::put('t_obfuscate_if_statement', true);
        }

        if ($this->option('obfuscate-constant-name')) {
            Hotash::put('t_obfuscate_constant_name', true);
        }

        if ($this->option('obfuscate-variable-name')) {
            Hotash::put('t_obfuscate_variable_name', true);
        }

        if ($this->option('obfuscate-function-name')) {
            Hotash::put('t_obfuscate_function_name', true);
        }

        if ($this->option('obfuscate-class-name')) {
            Hotash::put('t_obfuscate_class_name', true);
        }

        if ($this->option('obfuscate-konstant-name')) {
            Hotash::put('t_obfuscate_konstant_name', true);
        }

        if ($this->option('obfuscate-interface-name')) {
            Hotash::put('t_obfuscate_interface_name', true);
        }

        if ($this->option('obfuscate-trait-name')) {
            Hotash::put('t_obfuscate_trait_name', true);
        }

        if ($this->option('obfuscate-property-name')) {
            Hotash::put('t_obfuscate_property_name', true);
        }

        if ($this->option('obfuscate-method-name')) {
            Hotash::put('t_obfuscate_method_name', true);
        }

        if ($this->option('obfuscate-namespace-name')) {
            Hotash::put('t_obfuscate_namespace_name', true);
        }

        if ($this->option('obfuscate-label-name')) {
            Hotash::put('t_obfuscate_label_name', true);
        }

        if ($this->option('strip-indentation')) {
            Hotash::put('t_strip_indentation', true);
        }
    }
}
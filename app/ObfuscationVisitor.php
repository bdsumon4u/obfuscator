<?php

namespace App;

use App\Facades\Hotash;
use Exception;
use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

class ObfuscationVisitor extends NodeVisitorAbstract
{
    public function enterNode(Node $node)
    {
        if ($stack = Hotash::get('t_node_stack')) {
            $node->setAttribute('parent', end($stack));
        }
        Hotash::stack('t_node_stack', $node);

        // Obfuscate Loop Statements
        if (($node instanceof Node\Stmt\For_) || ($node instanceof Node\Stmt\Foreach_) || ($node instanceof Node\Stmt\Switch_)
            || ($node instanceof Node\Stmt\While_) || ($node instanceof Node\Stmt\Do_)
        ) {
            $scrambler = Scrambler::make('label');
            Hotash::stack('t_loop_stack', [
                $scrambler->generateLabelName(),
                $scrambler->generateLabelName(),
            ]);
        }

        // Obfuscate Function and Method Names
        if ($node instanceof Node\Stmt\Class_) {
            Hotash::put('current_class_name', $node->name->toString());
        }

        // Obfuscate Class Constants
        if ($node instanceof Node\Stmt\ClassConst) {
            Hotash::put('is_in_class_const_definition', true);
        }

        return $node;
    }

    public function leaveNode(Node $node)
    {
        if ($node instanceof Node\Stmt\Class_) {
            Hotash::put('current_class_name', null);
        }
        if ($node instanceof Node\Stmt\ClassConst) {
            Hotash::put('is_in_class_const_definition', false);
        }

        // Obfuscate String Literals
        if ($node instanceof Node\Stmt\InlineHTML) {
            return new Node\Stmt\Echo_([new Node\Scalar\String_($node->value)]);
        }

        // Obfuscate Number Literals
        if (false && $node instanceof Node\Scalar\Int_) {
            if (! mt_rand(0, 2)) {
                return new Node\Expr\FuncCall(new Node\Name('hexdec'), [
                    new Node\Arg(new Node\Scalar\String_('0x'.dechex($node->value))),
                ]);
            }

            if (! mt_rand(0, 2)) {
                return new Node\Expr\FuncCall(new Node\Name('octdec'), [
                    new Node\Arg(new Node\Scalar\String_('0'.decoct($node->value))),
                ]);
            }

            if (! mt_rand(0, 2)) {
                return new Node\Expr\FuncCall(new Node\Name('bindec'), [
                    new Node\Arg(new Node\Scalar\String_('0b'.decbin($node->value))),
                ]);
            }

            return $node;
        }

        // Obfuscate Constant Names
        if (Hotash::get('t_obfuscate_constant_name')) {
            $scrambler = Hotash::scrambler('constant');
            if ($node instanceof Node\Const_ && ! Hotash::get('is_in_class_const_definition')) {
                $node->name = new Node\Identifier(
                    $scrambler->scramble($node->name),
                    $node->name->getAttributes(),
                );
            }
            if ($node instanceof Node\Expr\FuncCall) {
                if ($node->name instanceof Node\Name) {
                    if (in_array($function = $node->name->getLast(), ['define', 'defined'])) {
                        $arg = current($node->getArgs())->value;
                        if (! $arg instanceof Node\Scalar\String_) {
                            throw new Exception("Error: your use of $function() function is not compatible with obfuscator!".PHP_EOL."\tOnly 1 literal string parameter is allowed...");
                        }

                        $arg->value = $scrambler->scramble($arg->value);
                    }
                }
            }
            if ($node instanceof Node\Expr\ConstFetch) {
                $node->name = new Node\Name(
                    $scrambler->scramble($node->name),
                    $node->name->getAttributes(),
                );
            }
        }

        // Obfuscate Variable Names
        if (Hotash::get('t_obfuscate_variable_name')) {
            $scrambler = Hotash::scrambler('variable');
            if ($node instanceof Node\Expr\Variable) {
                if (is_string($node->name)) {
                    $node->name = $scrambler->scramble($node->name);
                } else {
                    dump('variable name is not a string');
                }
            }

            if (($node instanceof Node\Stmt\Catch_) || ($node instanceof Node\ClosureUse) || ($node instanceof Node\Param)) {
                if ($node->var instanceof Node\Expr\Variable) {
                    $node->var->name = $scrambler->scramble($node->var->name);
                }
            }
        }

        // Obfuscate Function Names
        if (Hotash::get('t_obfuscate_function_name')) {
            $scrambler = Hotash::scrambler('function');
            if ($node instanceof Node\Stmt\Function_) {
                $node->name = new Node\Identifier(
                    $scrambler->scramble($node->name),
                    $node->name->getAttributes(),
                );
            }
            if ($node instanceof Node\Expr\FuncCall) {
                if ($node->name instanceof Node\Name) {
                    $node->name = new Node\Name(
                        $scrambler->scramble($node->name),
                        $node->name->getAttributes(),
                    );

                    if ($node->name->getLast() === 'function_exists') {
                        $arg = current($node->getArgs())->value;
                        if (! $arg instanceof Node\Scalar\String_) {
                            throw new Exception('Error: your use of function_exists() function is not compatible with obfuscator!'.PHP_EOL."\tOnly 1 literal string parameter is allowed...");
                        }

                        $arg->value = $scrambler->scramble($arg->value);
                    }
                } elseif (! $node->name instanceof Node\Expr\Variable) {
                    dump('function name is not a Name or Variable');
                }
            }
        }

        // Obfuscate Class Names
        if (Hotash::get('t_obfuscate_class_name')) {
            $scrambler = Hotash::scrambler('class');
            if ($node instanceof Node\Stmt\Class_) {
                $node->name = new Node\Identifier(
                    $scrambler->scramble($node->name),
                    $node->name->getAttributes(),
                );
                if ($node->extends) {
                    $node->extends = new Node\Name\FullyQualified(
                        $scrambler->scramble($node->extends),
                        $node->extends->getAttributes(),
                    );
                }
            }
            if (($node instanceof Node\Expr\New_)
                || ($node instanceof Node\Expr\StaticCall)
                || ($node instanceof Node\Expr\StaticPropertyFetch)
                || ($node instanceof Node\Expr\ClassConstFetch)
                || ($node instanceof Node\Expr\Instanceof_)
            ) {
                $node->class = new Node\Name(
                    $scrambler->scramble($node->class),
                    $node->class->getAttributes(),
                );
            }

            if ($node instanceof Node\Param) {
                if ($node->type instanceof Node\Name) {
                    $node->type = new Node\Name(
                        $scrambler->scramble($node->type),
                        $node->type->getAttributes(),
                    );
                }
                if ($node->type instanceof Node\Identifier) {
                    $node->type = new Node\Identifier(
                        $scrambler->scramble($node->type),
                        $node->type->getAttributes(),
                    );
                }
            }

            if ($node instanceof Node\Stmt\ClassMethod || $node instanceof Node\Stmt\Function_) {
                if ($node->returnType instanceof Node\NullableType) {
                    $node->returnType->type->name = $scrambler->scramble($node->returnType->type->name);
                }
                if ($node->returnType instanceof Node\Identifier) {
                    $node->returnType = new Node\Identifier(
                        $scrambler->scramble($node->returnType),
                        $node->returnType->getAttributes(),
                    );
                }
                if ($node->returnType instanceof Node\Name) {
                    $node->returnType = new Node\Name(
                        $scrambler->scramble($node->returnType),
                        $node->returnType->getAttributes(),
                    );
                }
            }

            if ($node instanceof Node\Stmt\Catch_) {
                foreach ($node->types as &$type) {
                    $type = new Node\Name(
                        $scrambler->scramble($type),
                        $type->getAttributes(),
                    );
                }
            }
        }

        // Obfuscate Konstant Names
        if (Hotash::get('t_obfuscate_konstant_name')) {
            $scrambler = Hotash::scrambler('konstant');
            if ($node instanceof Node\Stmt\ClassConst) {
                $node->consts = array_map(function ($const) use ($scrambler) {
                    $const->name = new Node\Identifier(
                        $scrambler->scramble($const->name),
                        $const->name->getAttributes(),
                    );

                    return $const;
                }, $node->consts);
            }
        }

        // Obfuscate Interface Names
        if (Hotash::get('t_obfuscate_interface_name')) {
            $scrambler = Hotash::scrambler('interface');
            if ($node instanceof Node\Stmt\Interface_) {
                $node->name = new Node\Identifier(
                    $scrambler->scramble($node->name),
                    $node->name->getAttributes(),
                );

                $node->extends = array_map(function ($extend) use ($scrambler) {
                    return new Node\Name(
                        $scrambler->scramble($extend),
                        $extend->getAttributes(),
                    );
                }, $node->extends);
            }
            if ($node instanceof Node\Stmt\Class_) {
                $node->implements = array_map(function ($implement) use ($scrambler) {
                    return new Node\Name(
                        $scrambler->scramble($implement),
                        $implement->getAttributes(),
                    );
                }, $node->implements);
            }
        }

        // Obfuscate Trait Names
        if (Hotash::get('t_obfuscate_trait_name')) {
            $scrambler = Hotash::scrambler('trait');
            if ($node instanceof Node\Stmt\Trait_) {
                $node->name = new Node\Identifier(
                    $scrambler->scramble($node->name),
                    $node->name->getAttributes(),
                );
            }
            if ($node instanceof Node\Stmt\Class_) {
                $node->implements = array_map(function ($implement) use ($scrambler) {
                    return new Node\Name(
                        $scrambler->scramble($implement),
                        $implement->getAttributes(),
                    );
                }, $node->implements);
            }
        }

        // Obfuscate Property Names
        if (Hotash::get('t_obfuscate_property_name')) {
            $scrambler = Hotash::scrambler('property');
            if (($node instanceof Node\Expr\PropertyFetch) || ($node instanceof Node\PropertyItem) || ($node instanceof Node\Expr\StaticPropertyFetch)) {
                if ($node->name instanceof Node\Identifier) {
                    $node->name = new Node\Identifier(
                        $scrambler->scramble($node->name),
                        $node->name->getAttributes(),
                    );
                }

                if ($node->name instanceof Node\VarLikeIdentifier) {
                    $node->name = new Node\VarLikeIdentifier(
                        $scrambler->scramble($node->name),
                        $node->name->getAttributes(),
                    );
                }
            }
        }

        // Obfuscate Method Names
        if (Hotash::get('t_obfuscate_method_name')) {
            $scrambler = Hotash::scrambler('method');
            if (($node instanceof Node\Stmt\ClassMethod) || ($node instanceof Node\Expr\MethodCall) || ($node instanceof Node\Expr\StaticCall)) {
                if ($node->name instanceof Node\Identifier) {
                    $node->name = new Node\Identifier(
                        $scrambler->scramble($node->name),
                        $node->name->getAttributes(),
                    );
                }

                if ($node->name instanceof Node\VarLikeIdentifier) {
                    $node->name = new Node\VarLikeIdentifier(
                        $scrambler->scramble($node->name),
                        $node->name->getAttributes(),
                    );
                }
            }
        }

        // Obfuscate Namespace Names
        if (Hotash::get('t_obfuscate_namespace_name')) {
            $scrambler = Hotash::scrambler('namespace');
            if (($node instanceof Node\Stmt\Namespace_) || ($node instanceof Node\UseItem)) {
                if ($node->name instanceof Node\Name) {
                    $node->name = new Node\Name(
                        $scrambler->scramble($node->name),
                        $node->name->getAttributes(),
                    );
                }
            }
            if (($node instanceof Node\Expr\FuncCall) || ($node instanceof Node\Expr\ConstFetch)) {
                if ($node->name instanceof Node\Name) {
                    $node->name = new Node\Name(
                        $scrambler->scramble($node->name),
                        $node->name->getAttributes(),
                    );
                }
                if ($node->name instanceof Node\Identifier) {
                    $node->name = new Node\Identifier(
                        $scrambler->scramble($node->name),
                        $node->name->getAttributes(),
                    );
                }
                if ($node->name instanceof Node\VarLikeIdentifier) {
                    $node->name = new Node\VarLikeIdentifier(
                        $scrambler->scramble($node->name),
                        $node->name->getAttributes(),
                    );
                }
                if ($node->name instanceof Node\Expr\Variable) {
                    $node->name = new Node\Expr\Variable(
                        $scrambler->scramble($node->name),
                        $node->name->getAttributes(),
                    );
                }
            }
            if (($node instanceof Node\Expr\New_)
                || ($node instanceof Node\Expr\Instanceof_)
                || ($node instanceof Node\Expr\StaticCall)
                || ($node instanceof Node\Expr\StaticPropertyFetch)
                || ($node instanceof Node\Expr\ClassConstFetch)
            ) {
                if ($node->class instanceof Node\Name) {
                    $node->class = new Node\Name(
                        $scrambler->scramble($node->class),
                        $node->class->getAttributes(),
                    );
                }
                if ($node->class instanceof Node\Identifier) {
                    $node->class = new Node\Identifier(
                        $scrambler->scramble($node->class),
                        $node->class->getAttributes(),
                    );
                }
                if ($node->class instanceof Node\VarLikeIdentifier) {
                    $node->class = new Node\VarLikeIdentifier(
                        $scrambler->scramble($node->class),
                        $node->class->getAttributes(),
                    );
                }
                if ($node->class instanceof Node\Expr\Variable) {
                    $node->class = new Node\Expr\Variable(
                        $scrambler->scramble($node->class),
                        $node->class->getAttributes(),
                    );
                }
            }
            if ($node instanceof Node\Stmt\Class_) {
                if ($node->extends instanceof Node\Name) {
                    $node->extends = new Node\Name(
                        $scrambler->scramble($node->extends),
                        $node->extends->getAttributes(),
                    );
                }
                $node->implements = array_map(function ($implement) use ($scrambler) {
                    return new Node\Name(
                        $scrambler->scramble($implement),
                        $implement->getAttributes(),
                    );
                }, $node->implements);
            }
            if ($node instanceof Node\Param) {
                if ($node->type instanceof Node\Name) {
                    $node->type = new Node\Name(
                        $scrambler->scramble($node->type),
                        $node->type->getAttributes(),
                    );
                }
                if ($node->type instanceof Node\Identifier) {
                    $node->type = new Node\Identifier(
                        $scrambler->scramble($node->type),
                        $node->type->getAttributes(),
                    );
                }
                if ($node->type instanceof Node\VarLikeIdentifier) {
                    $node->type = new Node\VarLikeIdentifier(
                        $scrambler->scramble($node->type),
                        $node->type->getAttributes(),
                    );
                }
                if ($node->type instanceof Node\Expr\Variable) {
                    $node->type = new Node\Expr\Variable(
                        $scrambler->scramble($node->type),
                        $node->type->getAttributes(),
                    );
                }
            }
            if ($node instanceof Node\Stmt\Interface_) {
                $node->extends = array_map(function ($extend) use ($scrambler) {
                    return new Node\Name(
                        $scrambler->scramble($extend),
                        $extend->getAttributes(),
                    );
                }, $node->extends);
            }
            if ($node instanceof Node\Stmt\TraitUse) {
                $node->traits = array_map(function ($trait) use ($scrambler) {
                    return new Node\Name(
                        $scrambler->scramble($trait),
                        $trait->getAttributes(),
                    );
                }, $node->traits);
            }
            if ($node instanceof Node\Stmt\Catch_) {
                $node->types = array_map(function ($type) use ($scrambler) {
                    return new Node\Name(
                        $scrambler->scramble($type),
                        $type->getAttributes(),
                    );
                }, $node->types);
            }
        }

        // Obfuscate Label Names
        if (Hotash::get('t_obfuscate_label_name')) {                    // label: goto label;   -
            $scrambler = Hotash::scrambler('label');
            if (($node instanceof Node\Stmt\Label) || ($node instanceof Node\Stmt\Goto_)) {
                $node->name = new Node\Identifier(
                    $scrambler->scramble($node->name),
                    $node->name->getAttributes(),
                );
            }
        }

        // Obfuscate If Statements
        if (Hotash::get('t_obfuscate_if_statement')) {                  // if else elseif   are replaced by goto ...
            if ($node instanceof Node\Stmt\If_) {
                $scrambler = Hotash::scrambler('label');
                $condition = $node->cond;
                $stmts = $node->stmts;

                if ($elseifs = $node->elseifs) {       // elseif mode
                    $label_endif_name = $scrambler->generateLabelName();
                    $label_endif = [new Node\Stmt\Label($label_endif_name)];
                    $goto_endif = [new Node\Stmt\Goto_($label_endif_name)];

                    $new_nodes_1 = [];
                    $new_nodes_2 = [];
                    $label_if_name = $scrambler->generateLabelName();
                    $label_if = [new Node\Stmt\Label($label_if_name)];
                    $goto_if = [new Node\Stmt\Goto_($label_if_name)];
                    $if = new Node\Stmt\If_($condition);
                    $if->stmts = $goto_if;
                    $new_nodes_1 = array_merge($new_nodes_1, [$if]);
                    $new_nodes_2 = array_merge($new_nodes_2, $label_if, $stmts, $goto_endif);

                    for ($i = 0; $i < count($elseifs); $i++) {
                        $condition = $elseifs[$i]->cond;
                        $stmts = $elseifs[$i]->stmts;
                        $label_if_name = $scrambler->generateLabelName();
                        $label_if = [new Node\Stmt\Label($label_if_name)];
                        $goto_if = [new Node\Stmt\Goto_($label_if_name)];
                        $if = new Node\Stmt\If_($condition);
                        $if->stmts = $goto_if;
                        $new_nodes_1 = array_merge($new_nodes_1, [$if]);
                        $new_nodes_2 = array_merge($new_nodes_2, $label_if, $stmts);
                        if ($i < count($elseifs) - 1) {
                            $new_nodes_2 = array_merge($new_nodes_2, $goto_endif);
                        }
                    }
                    if (isset($else)) {
                        $new_nodes_1 = array_merge($new_nodes_1, $else);
                    }
                    $new_nodes_1 = array_merge($new_nodes_1, $goto_endif);
                    $new_nodes_2 = array_merge($new_nodes_2, $label_endif);

                    return array_merge($new_nodes_1, $new_nodes_2);
                } elseif ($else = $node->else?->stmts) {       // if else mode
                    $label_then_name = $scrambler->generateLabelName();
                    $label_then = [new Node\Stmt\Label($label_then_name)];
                    $goto_then = [new Node\Stmt\Goto_($label_then_name)];
                    $label_endif_name = $scrambler->generateLabelName();
                    $label_endif = [new Node\Stmt\Label($label_endif_name)];
                    $goto_endif = [new Node\Stmt\Goto_($label_endif_name)];
                    $node->stmts = $goto_then;
                    $node->else = null;

                    return array_merge([$node], $else, $goto_endif, $label_then, $stmts, $label_endif);
                } else { // no else statement found
                    if ($condition instanceof Node\Expr\BooleanNot) {     // avoid !! in generated code
                        $new_condition = $condition->expr;
                    } else {
                        $new_condition = new Node\Expr\BooleanNot($condition);
                    }
                    $label_endif_name = $scrambler->generateLabelName();
                    $label_endif = [new Node\Stmt\Label($label_endif_name)];
                    $goto_endif = [new Node\Stmt\Goto_($label_endif_name)];
                    $node->cond = $new_condition;
                    $node->stmts = $goto_endif;

                    return array_merge([$node], $stmts, $label_endif);
                }
            }
        }

        // Obfuscate Loop Statements
        if (Hotash::get('t_obfuscate_loop_statement')) {                  // for while do while   are replaced by goto ...
            $scrambler = Hotash::scrambler('label');
            if ($node instanceof Node\Stmt\For_) {
                [$label_loop_break_name, $label_loop_continue_name] = Hotash::unstack('t_loop_stack');

                $label_loop_name = $scrambler->generateLabelName();
                $label_loop = [new Node\Stmt\Label($label_loop_name)];
                $goto_loop = [new Node\Stmt\Goto_($label_loop_name)];
                $label_break = [new Node\Stmt\Label($label_loop_break_name)];
                $goto_break = [new Node\Stmt\Goto_($label_loop_break_name)];
                $label_continue = [new Node\Stmt\Label($label_loop_continue_name)];
                $goto_continue = [new Node\Stmt\Goto_($label_loop_continue_name)];

                $new_node = array_map(function ($init) {
                    return new Node\Stmt\Expression($init);
                }, $node->init);

                $new_node = array_merge($new_node, $label_loop);
                if ($cond = end($node->cond)) {
                    $cond = $cond instanceof Node\Expr\BooleanNot ? $cond->expr : new Node\Expr\BooleanNot($cond);
                    $new_node[] = new Node\Stmt\If_($cond, ['stmts' => $goto_break]);
                }
                $new_node = array_merge($new_node, $node->stmts);
                $new_node = array_merge($new_node, $label_continue);
                $new_node = array_merge($new_node, array_map(function ($loop) {
                    return new Node\Stmt\Expression($loop);
                }, $node->loop));
                $new_node = array_merge($new_node, $goto_loop);
                $new_node = array_merge($new_node, $label_break);

                return $new_node;
            }

            if ($node instanceof Node\Stmt\Foreach_) {
                [$label_loop_break_name, $label_loop_continue_name] = Hotash::unstack('t_loop_stack');

                $label_break = [new Node\Stmt\Label($label_loop_break_name)];
                $node->stmts[] = new Node\Stmt\Label($label_loop_continue_name);
                $this->shuffle_stmts($node);

                return array_merge([$node], $label_break);
            }

            if ($node instanceof Node\Stmt\Switch_) {
                [$label_loop_break_name, $label_loop_continue_name] = Hotash::unstack('t_loop_stack');

                $label_break = [new Node\Stmt\Label($label_loop_break_name)];
                $label_continue = [new Node\Stmt\Label($label_loop_continue_name)];

                return array_merge([$node], $label_continue, $label_break);
            }

            if ($node instanceof Node\Stmt\While_) {
                [$label_loop_break_name, $label_loop_continue_name] = Hotash::unstack('t_loop_stack');

                $condition = $node->cond;
                $stmts = $node->stmts;
                $label_break = [new Node\Stmt\Label($label_loop_break_name)];
                $goto_break = [new Node\Stmt\Goto_($label_loop_break_name)];
                $label_continue = [new Node\Stmt\Label($label_loop_continue_name)];
                $goto_continue = [new Node\Stmt\Goto_($label_loop_continue_name)];
                if ($condition instanceof Node\Expr\BooleanNot) {     // avoid !! in generated code
                    $new_condition = $condition->expr;
                } else {
                    $new_condition = new Node\Expr\BooleanNot($condition);
                }
                $if = new Node\Stmt\If_($new_condition);
                $if->stmts = $goto_break;

                return array_merge($label_continue, [$if], $stmts, $goto_continue, $label_break);
            }

            if ($node instanceof Node\Stmt\Do_) {
                [$label_loop_break_name, $label_loop_continue_name] = Hotash::unstack('t_loop_stack');

                $condition = $node->cond;
                $stmts = $node->stmts;
                $label_break = [new Node\Stmt\Label($label_loop_break_name)];
                $label_continue = [new Node\Stmt\Label($label_loop_continue_name)];
                $goto_continue = [new Node\Stmt\Goto_($label_loop_continue_name)];
                $if = new Node\Stmt\If_($condition);
                $if->stmts = $goto_continue;

                return array_merge($label_continue, $stmts, [$if], $label_break);
            }

            if ($node instanceof Node\Stmt\Break_) {
                $n = $node->num instanceof Node\Scalar\Int_ ? $node->num->value : 1;

                if (($i = count(Hotash::get('t_loop_stack')) - $n) < 0) {
                    throw new Exception('Error: break statement outside loop found!;'.PHP_EOL);
                }

                [$label_loop_break_name, $label_loop_continue_name] = Hotash::get('t_loop_stack')[$i];
                $node = new Node\Stmt\Goto_($label_loop_break_name);
            }
            if ($node instanceof Node\Stmt\Continue_) {
                $n = $node->num instanceof Node\Scalar\Int_ ? $node->num->value : 1;
                if (($i = count(Hotash::get('t_loop_stack')) - $n) < 0) {
                    throw new Exception('Error: continue statement outside loop found!;'.PHP_EOL);
                }
                [$label_loop_break_name, $label_loop_continue_name] = Hotash::get('t_loop_stack')[$i];
                $node = new Node\Stmt\Goto_($label_loop_continue_name);
            }
        }

        // Shuffle Statements
        if (Hotash::get('t_shuffle_statements')) {
            if (($node instanceof Node\Stmt\Function_)
                || ($node instanceof Node\Expr\Closure)
                || ($node instanceof Node\Stmt\ClassMethod)
                || ($node instanceof Node\Stmt\Foreach_)     // occurs when $conf->obfuscate_loop_statement is set to false
                || ($node instanceof Node\Stmt\If_)          // occurs when $conf->obfuscate_loop_statement is set to false
                || ($node instanceof Node\Stmt\TryCatch)
                || ($node instanceof Node\Stmt\Catch_)
                || ($node instanceof Node\Stmt\Case_)
                || ($node instanceof Node\Stmt\Namespace_)
            ) {
                $this->shuffle_stmts($node);
            }

            if (($node instanceof Node\Stmt\If_)) {           // occurs when $conf->obfuscate_if_statement is set to false
                if ($node->else) {                          // else mode
                    $this->shuffle_stmts($node->else);
                }

                $node->elseifs = array_map(function ($elseif) {
                    $this->shuffle_stmts($elseif);

                    return $elseif;
                }, $node->elseifs);
            }
        }

        Hotash::unstack('t_node_stack');

        return $node;
    }

    private function shuffle_stmts(Node &$node)
    {
        if (Hotash::get('t_shuffle_statements')) {
            if ($stmts = $node->stmts) {
                $chunk_size = $this->shuffle_get_chunk_size($stmts);

                if (count($stmts) > $chunk_size + Hotash::get('t_shuffle_statements_min_chunk_size')) {
                    $node->stmts = $this->shuffle_statements($stmts);

                    return true;
                }
            }
        }

        return false;
    }

    private function shuffle_get_chunk_size(&$stmts)
    {
        $chunk_size = Hotash::get('t_shuffle_statements_min_chunk_size');
        if (Hotash::get('t_shuffle_statements_chunk_mode') === 'ratio') {
            $chunk_size = max($chunk_size, count($stmts) / Hotash::get('t_shuffle_statements_chunk_ratio'));
        }

        return round($chunk_size);
    }

    private function shuffle_statements($stmts)
    {
        $chunk_size = $this->shuffle_get_chunk_size($stmts);

        $scrambler = Hotash::scrambler('label');
        $label_name_prev = $scrambler->generateLabelName();
        $first_goto = new Node\Stmt\Goto_($label_name_prev);
        $t = [];
        $t_chunk = [];
        for ($i = 0; $i < count($stmts); $i++) {
            $t_chunk[] = $stmts[$i];
            if (count($t_chunk) >= $chunk_size) {
                $label = [new Node\Stmt\Label($label_name_prev)];
                $label_name = $scrambler->generateLabelName();
                $goto = [new Node\Stmt\Goto_($label_name)];
                $t[] = array_merge($label, $t_chunk, $goto);
                $label_name_prev = $label_name;
                $t_chunk = [];
            }
        }
        if (count($t_chunk) > 0) {
            $label = [new Node\Stmt\Label($label_name_prev)];
            $label_name = $scrambler->generateLabelName();
            $goto = [new Node\Stmt\Goto_($label_name)];
            $t[] = array_merge($label, $t_chunk, $goto);
            $label_name_prev = $label_name;
            $t_chunk = [];
        }

        shuffle($t);
        $stmts = [$first_goto];
        foreach ($t as $stmt) {
            foreach ($stmt as $inst) {
                $stmts[] = $inst;
            }
        }
        $stmts[] = new Node\Stmt\Label($label_name);

        return $stmts;
    }
}

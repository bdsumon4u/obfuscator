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
        Hotash::stack_push('t_node_stack', $node);

        // Obfuscate Loop Statements
        if (($node instanceof Node\Stmt\For_) || ($node instanceof Node\Stmt\Foreach_) || ($node instanceof Node\Stmt\Switch_)
            || ($node instanceof Node\Stmt\While_) || ($node instanceof Node\Stmt\Do_)
        ) {
            $scrambler = Scrambler::make('label');
            Hotash::stack_push('t_loop_stack', [
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

        // Obfuscate Variable Names
        $scrambler = Scrambler::make('variable');
        if ($node instanceof Node\Expr\Variable) {
            if (is_string($node->name)) {
                $node->name = $scrambler->scramble($node->name);
            } else {
                dump('variable name is not a string');
            }
        }

        // Obfuscate Function and Method Names (or Class)
        $scrambler = Scrambler::make('function_or_class');
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
                        throw new Exception('Error: your use of function_exists() function is not compatible with obfuscator!' . PHP_EOL . "\tOnly 1 literal string parameter is allowed...");
                    }
                    
                    $arg->value = $scrambler->scramble($arg->value);
                }
            } else if (! $node->name instanceof Node\Expr\Variable) {
                dump('function name is not a Name or Variable');
            }
        }

        // Obfuscate Class Name
        $scrambler = Scrambler::make('function_or_class');
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
        
        return $node;
    }
}

<?php

namespace App;

use PhpParser\Node;
use PhpParser\Node\Scalar;
use PhpParser\PrettyPrinter;

class HotashPrinter extends PrettyPrinter\Standard
{
    private function obfuscate_string(string $str)
    {
        return implode('', array_map(function ($char) {
            $ord = ord($char);
            if (mt_rand(0, 1)) {
                return '\x'.dechex($ord);
            }

            return '\\'.decoct($ord);
        }, str_split($str)));
    }

    public function pScalar_String(Scalar\String_ $node): string
    {
        // return parent::pScalar_String($node);
        if (! strlen($this->obfuscate_string($node->value))) {
            return "''";
        }

        return '"'.$this->obfuscate_string($node->value).'"';
    }

    protected function pScalar_InterpolatedString(Scalar\InterpolatedString $node): string
    {
        // return parent::pScalar_InterpolatedString($node);
        /*
        if ($node->getAttribute('kind') === Scalar\String_::KIND_HEREDOC) {
            $label = $node->getAttribute('docLabel');
            if ($label && !$this->encapsedContainsEndLabel($node->parts, $label)) {
                $nl = $this->phpVersion->supportsFlexibleHeredoc() ? $this->nl : $this->newline;
                if (count($node->parts) === 1
                    && $node->parts[0] instanceof Node\InterpolatedStringPart
                    && $node->parts[0]->value === ''
                ) {
                    return "<<<$label$nl$label{$this->docStringEndToken}";
                }

                return "<<<$label$nl" . $this->pEncapsList($node->parts, null)
                     . "$nl$label{$this->docStringEndToken}";
            }
        }
        */
        $return = '';
        foreach ($node->parts as $element) {
            if ($element instanceof Node\InterpolatedStringPart) {
                $return .= $this->obfuscate_string($element->value);
            } else {
                $return .= '{'.$this->p($element).'}';
            }
        }

        return '"'.$return.'"';
    }
}

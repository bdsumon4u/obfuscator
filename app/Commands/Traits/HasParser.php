<?php

namespace App\Commands\Traits;

use PhpParser\Parser;
use PhpParser\ParserFactory;
use PhpParser\PhpVersion;

trait HasParser
{
    private Parser $parser;

    private function createPhpParser(): void
    {
        $this->parser = (new ParserFactory)->createForVersion(
            match ($this->choice('Use parser for PHP version', ['Host', 'Newest', 'Custom'], 0)) {
                'Custom' => PhpVersion::fromString($this->ask('Enter PHP version')),
                'Newest' => PhpVersion::getNewestSupported(),
                'Host' => PhpVersion::getHostVersion(),
            }
        );
    }
}

<?php

namespace App\Commands\Traits;

use Generator;

trait HasFile
{
    private function getPhpFiles(): Generator
    {
        $projectDir = $this->argument('project');

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($projectDir),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($iterator as $file) {
            if ($file->getExtension() === 'php') {
                yield $file->getPathname();
            }
        }
    }

    private function obfuscateFile($file): void
    {
        try {
            $code = file_get_contents($file);
            $nodes = $this->parser->parse($code);
            $stmts = $this->traverser->traverse($nodes);
            $code = $this->printer->prettyPrintFile($stmts);
            file_put_contents($this->outputPath($file), $code);
        } catch (\PhpParser\Error $e) {
            $this->error("Parse error: {$e->getMessage()}");
        }
    }

    private function outputPath($file): string
    {
        $projectDir = $this->argument('project');
        $outputDir = $this->argument('output');

        $outputFile = str_replace($projectDir, $outputDir, $file);

        if (!file_exists(dirname($outputFile))) {
            mkdir(dirname($outputFile), 0755, true);
        }

        return $outputFile;
    }
}
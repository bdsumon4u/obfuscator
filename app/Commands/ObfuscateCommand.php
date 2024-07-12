<?php

namespace App\Commands;

use App\Facades\Hotash;
use App\HotashPrinter;
use App\ObfuscationVisitor;
use App\Scrambler;
use Generator;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\NameResolver;
use PhpParser\Parser;
use PhpParser\ParserFactory;

class ObfuscateCommand extends Command
{
    private Parser $parser;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'obfuscate
        {project : The project directory to obfuscate}
        {output=output : The output directory to save}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Obfuscate PHP project';

    public function __construct(
        private NodeTraverser $traverser,
        private HotashPrinter $printer,
    ) {
        parent::__construct();

        Hotash::processDefinedClassNames();

        Hotash::stack_push('t_ignore_variables', 'var');
        Hotash::put('t_ignore_pre_defined_classes', 'all');

        // $scrambler = Scrambler::make('variable');
        // dump($scrambler->scramble('request'));
        // dd($scrambler->scramble('request'));

        $this->parser = (new ParserFactory)->createForHostVersion();

        // $this->traverser->addVisitor(new NameResolver);
        $this->traverser->addVisitor(new ObfuscationVisitor);
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Obfuscating project...');

        foreach ($this->getPhpFiles() as $file) {
            $this->obfuscateFile($file);
        }

        $this->info('Obfuscation complete.');
    }

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

        if (! file_exists(dirname($outputFile))) {
            mkdir(dirname($outputFile), 0755, true);
        }

        return $outputFile;
    }

    /**
     * Define the command's schedule.
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}

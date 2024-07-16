<?php

namespace App\Commands;

use App\Commands\Traits\HasConfig;
use App\Commands\Traits\HasFile;
use App\Commands\Traits\HasParser;
use App\Facades\Hotash;
use App\HotashPrinter;
use App\ObfuscationVisitor;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use PhpParser\NodeTraverser;
use PhpParser\ParserFactory;

class ObfuscateCommand extends Command
{
    use HasConfig, HasFile, HasParser;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'obfuscate
        {project : The project directory to obfuscate}
        {output=output : The output directory to save}
        {--shuffle-statements : Enable statement shuffling}
        {--shuffle-min-chunk-size=5 : Minimum chunk size for statement shuffling}
        {--shuffle-chunk-mode=fixed : Chunk mode for statement shuffling (fixed or ratio)}
        {--shuffle-chunk-ratio=20 : Chunk ratio for statement shuffling (ratio mode only)}
        {--obfuscate-string-literal : Enable obfuscation of string literals}
        {--obfuscate-loop-statement : Enable obfuscation of loop statements}
        {--obfuscate-if-statement : Enable obfuscation of if statements}
        {--obfuscate-constant-name : Enable obfuscation of constant names}
        {--obfuscate-variable-name : Enable obfuscation of variable names}
        {--obfuscate-function-name : Enable obfuscation of function names}
        {--obfuscate-class-name : Enable obfuscation of class names}
        {--obfuscate-konstant-name : Enable obfuscation of constant names}
        {--obfuscate-interface-name : Enable obfuscation of interface names}
        {--obfuscate-trait-name : Enable obfuscation of trait names}
        {--obfuscate-property-name : Enable obfuscation of property names}
        {--obfuscate-method-name : Enable obfuscation of method names}
        {--obfuscate-namespace-name : Enable obfuscation of namespace names}
        {--obfuscate-label-name : Enable obfuscation of label names}
        {--strip-indentation : Enable stripping of indentation}
        {--config : Allow prompts for configuration}';

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

        Hotash::put('t_ignore_pre_defined_classes', 'all');

        $this->traverser->addVisitor(new ObfuscationVisitor);

        $this->parser = (new ParserFactory)->createForHostVersion();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Obfuscating project...');

        $this->processOptions();
        if ($this->option('config')) {
            $this->createPhpParser();
            $this->processArguments();
        }

        foreach ($this->getPhpFiles() as $file) {
            $this->obfuscateFile($file);
        }

        $this->info('Obfuscation complete.');
    }

    /**
     * Define the command's schedule.
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}

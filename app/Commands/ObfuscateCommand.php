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
        {--no-shuffle-statements : Disable statement shuffling}
        {--shuffle-min-chunk-size=5 : Minimum chunk size for statement shuffling}
        {--shuffle-chunk-mode=fixed : Chunk mode for statement shuffling (fixed or ratio)}
        {--shuffle-chunk-ratio=5 : Chunk ratio for statement shuffling (ratio mode only)}
        {--no-obfuscate-string-literal : Disable obfuscation of string literals}
        {--no-obfuscate-loop-statement : Disable obfuscation of loop statements}
        {--no-obfuscate-if-statement : Disable obfuscation of if statements}
        {--no-obfuscate-constant-name : Disable obfuscation of constant names}
        {--no-obfuscate-variable-name : Disable obfuscation of variable names}
        {--no-obfuscate-function-name : Disable obfuscation of function names}
        {--no-obfuscate-class-name : Disable obfuscation of class names}
        {--no-obfuscate-konstant-name : Disable obfuscation of class constants}
        {--no-obfuscate-interface-name : Disable obfuscation of interface names}
        {--no-obfuscate-trait-name : Disable obfuscation of trait names}
        {--no-obfuscate-property-name : Disable obfuscation of property names}
        {--no-obfuscate-method-name : Disable obfuscation of method names}
        {--no-obfuscate-namespace-name : Disable obfuscation of namespace names}
        {--no-obfuscate-label-name : Disable obfuscation of label names}
        {--no-strip-indentation : Disable stripping of indentation}
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

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class FileCodeDescriptionGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:file-code-description-generator';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Start file code description');
        $fileCode = base_path('fileCode.MD');
        File::put($fileCode, '');

        foreach (File::allFiles(app_path()) as $file) {
            if ($file->getExtension() == 'php') {
                File::append($fileCode, $this->getFileTextMD($file));
                $this->comment('File: ' . $file->getRealPath());
            }
        }
        $this->warn('Finish file code description');
    }

    public function getAppPath(\SplFileInfo $file): string
    {
        return str_replace(base_path(), '', $file->getRealPath());
    }

    public function getFileTextMD(\SplFileInfo $file): string
    {

        $string = sprintf('Файл: %s', $this->getAppPath($file));
        $string .= PHP_EOL . PHP_EOL . PHP_EOL;
        $string .= '```php';
        $string .= PHP_EOL;
        $string .= File::get($file);
        $string .= PHP_EOL;
        $string .= '```';
        $string .= PHP_EOL . PHP_EOL . PHP_EOL;
        return $string;
    }
}

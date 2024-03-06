<?php

namespace Aysetas\ShortlyPackage\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeConfigCommand extends Command
{
    protected $signature = 'package:make-config';
    protected $description = 'Create config file for package';

    public function handle()
    {
        $configPath = config_path('shortly.php');
        $stubPath = __DIR__ . '/../shortly.php';

        if (!File::exists($configPath)) {
            File::copy($stubPath, $configPath);
            $this->info('Shortly Config dosyası başarılı bir şekilde oluştu.');
        } else {
            $this->warn('Shortly Config dosyası zaten mevcut.');
        }
    }
}

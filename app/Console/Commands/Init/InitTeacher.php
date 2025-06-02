<?php

namespace App\Console\Commands\Init;

use App\Models\Teacher;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class InitTeacher extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:teacher';

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
        Teacher::create([
            'full_name' => 'Петров Петр Петрович',
            'email'     => 'teacher@teacher.com',
            'password'  => Hash::make('teacher@teacher.com'),
        ]);
    }
}

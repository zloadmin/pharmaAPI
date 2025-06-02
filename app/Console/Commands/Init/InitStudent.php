<?php

namespace App\Console\Commands\Init;

use App\Models\Student;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class InitStudent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:student';

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
        Student::create([
            'full_name' => 'Иванов Иван Иванович',
            'email' => 'student@student.com',
            'password' => Hash::make('student@student.com'),
        ]);
    }
}

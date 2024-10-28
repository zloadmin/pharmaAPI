<?php
declare(strict_types=1);


namespace App\Livewire\Traits;


use Illuminate\Support\Facades\Route;

trait HasSession
{


    public string $session;

    public function setSession(string $session): void
    {
        $this->session = $session;
    }

//    public function getSession()
//    {
//        return $this->session;
//    }

}
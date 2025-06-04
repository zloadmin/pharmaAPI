<?php

namespace App\Livewire;

use App\Mail\Student\StudentAccessEmail;
use App\Mail\User\UserRecoverPasswordEmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class RecoverPasswordPage extends Component
{
    public string $email = '';
    protected $rules = [
        'email' => [
            'required',
            'email',
        ],
    ];

    public function recoverPassword(): void
    {
        $this->validate();
        $user = User::where('email', $this->email)->first();
        if (!$user) {
            $this->addError('email', 'Данный email не найден.');
            return;
        }
        $password = Str::random(8);
        $user->update([ 'password' => Hash::make($password) ]);
        Mail::queue(new UserRecoverPasswordEmail($user, $password));
        session()->flash('status', 'Пароль был выслан вам на email: ' . $this->email);
        $this->email = '';
    }

    public function render()
    {
        return view('livewire.recover-password-page')
            ->layout('components.layouts.card')->layoutData([
                'title' => 'Восстановить пароль'
            ]);
    }

}

<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\Users;

class Login extends Component
{
    public $email, $password, $errormsg;
    public function render()
    {
        return view('livewire.auth.login');
    }
}

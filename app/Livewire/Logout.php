<?php

namespace App\Livewire;

use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        auth()->logout();
        $this->redirectRoute("home");
//        return view('livewire.logout');
    }
}

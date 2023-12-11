<?php

namespace App\Livewire;

use Livewire\Component;

class Login extends Component
{

    public $phone = "";

    public $isOtp = false;

    public function render(){

        return view('livewire.login');
    }

    public function otp(){

        $val= $this->validate([
            "phone" => "required |digits:11 | regex:/(09)[0-9]{9}/"
        ],[
            "phone.required" => "وارد کردن شماره موبایل ضروری است !",
            "phone.digits" => "شماره موبایل باید ۱۱ رقم باشد !",
            "phone.regex" => "شماره موبایل اشتباه است !",
        ]);



        $this->isOtp = true;
    }

}

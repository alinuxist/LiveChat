<?php

namespace App\Livewire;

use App\Models\Otp;
use App\Models\User;
use Livewire\Component;
use Morilog\Jalali\Jalalian;

class Login extends Component
{

    public $phone = "";

    public $otp1;
    public $otp2;
    public $otp3;
    public $otp4;

    public $isOtp = false;

    public function render(){

        return view('livewire.login');
    }

    public function otp(){

        $this->validate([
            "phone" => "required |digits:11 | regex:/(09)[0-9]{9}/"
        ],[
            "phone.required" => "وارد کردن شماره موبایل ضروری است !",
            "phone.digits" => "شماره موبایل باید ۱۱ رقم باشد !",
            "phone.regex" => "شماره موبایل اشتباه است !",
        ]);

        if (!is_null(Otp::where("phone", $this->phone)->latest()->first())) {
            if (!Otp::where("phone", $this->phone)->latest()->first()->used && !is_null(Otp::where("phone", $this->phone)->latest()->first()->created_at) && !Jalalian::fromDateTime(Otp::where("phone", $this->phone)->latest()->first()->created_at)->addMinutes(2)->isPast()) {

                $timeAgo = Jalalian::fromDateTime(Otp::where("phone", $this->phone)->latest()->first()->created_at)->ago();

                session()->flash("repeatError", "[ ! ] کد قبلی برای شما $timeAgo ارسال شده است، لطفا همان را وارد کنید.");

                return $this->isOtp = true;
            }
        }

        $otp = Otp::create([
            'phone' => "$this->phone",
        ]);

        if ($otp->sendCode($this->phone)) {
            session()->put("code_id", $otp->id);
            session()->put("phone", $this->phone);
            return $this->isOtp = true;
        }

        $otp->delete();
//        $this->redirect(route('login') , navigate: true)->with("sendError", "[ ! ] امکان ارسال کد تایید وجود ندارد.");
        dd("error send sms");

    }

    public function verify(){

        $this->validate([
            "otp1" => "required|digits:1",
            "otp2" => "required|digits:1",
            "otp3" => "required|digits:1",
            "otp4" => "required|digits:1",
        ]);

        $code = "$this->otp1$this->otp2$this->otp3$this->otp4";




        if (!session()->has('code_id') || !session()->has('phone'))
            return redirect()->route('loginPhone');

        $otp = Otp::where('phone', session()->get('phone'))->find(session()->get('code_id'));


        if (!$otp || empty($otp->id))
            return redirect()->route('login');
        if (!$otp->isValid())
            return redirect()->back()->with('codeExpired', "کد تایید استفاده یا منقضی شده.");
        if ($otp->code != $code)
            return redirect()->back()->with('codeWrong', "کد تایید اشتباه است.");
        $otp->update([
            'used' => true
        ]);

        if (is_null(User::where("phone", session()->get("phone"))->first())) {
            $user = User::create([
                "phone" => session()->get("phone"),
            ]);
            auth()->login($user, true);
        } else {
            auth()->login(User::where("phone", session()->get("phone"))->first(), true);
        }
        $this->redirect(route("home") , navigate: true);



    }

}

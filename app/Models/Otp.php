<?php

namespace App\Models;

use Carbon\Carbon;
use Cryptommer\Smsir\Classes\Smsir;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    use HasFactory;

    const expireTime = 15;

    protected $fillable = [
        "code",
        "user_id",
        "used",
        "phone",
    ];


    public function __construct(array $attributes = [])
    {
        if (!isset($attributes['code'])) {
            $attributes['code'] = $this->generateCode();
        }
        parent::__construct($attributes);
    }

    public function generateCode($codeLength = 4): int
    {
        $max = pow(10, $codeLength);
        $min = $max / 10 - 1;
        return mt_rand($min, $max);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isUsed()
    {
        return $this->used;
    }

    public function isValid()
    {
        return !$this->isUsed() && !$this->isExpired();
    }

    public function isExpired()
    {
        return $this->created_at->diffInMinutes(Carbon::now()) > static::expireTime;
    }

    public function sendCode(string $phone)
    {
        if (!$this->user()) {
            throw new \Exception("This OTP has no Users");
        }
        if (!$this->code) {
            $this->code = $this->generateCode();
        }
        try {
            (new Smsir)->send()->Verify("$phone", "100000", [new \Cryptommer\Smsir\Objects\Parameters("code", "$this->code")]);


        } catch (\Exception $ex) {
            return false;
        }
        return true;
    }

}

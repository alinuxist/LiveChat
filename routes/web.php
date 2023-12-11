<?php

namespace App\Livewire;





use Cryptommer\Smsir\Classes\Smsir;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
//    $user = User::whereId(1)->first();

//    User::create([
//        "phone" => "09907731266"
//    ]);

    return auth()->user();

//    $msg = \App\Models\Message::create([
//        "conversation_id" => 1,
//        "sender_id" => 1,
//    ]);
//    dd($msg->sender());

//    \App\Models\Conversation::create();

})->name("home");


Route::get("/login" , Login::class)->middleware("guest")->name("login");
Route::get("/logout" , [Logout::class , "logout"])->middleware("auth")->name("logout");

//Route::get("/send" , function (){
//    (new Smsir)->send()->Verify("09907731266", "100000", [new \Cryptommer\Smsir\Objects\Parameters("code", "1111")]);
//});



<?php

namespace App\Livewire;


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

//    $msg = \App\Models\Message::create([
//        "conversation_id" => 1,
//        "sender_id" => 1,
//    ]);
//    dd($msg->sender());

//    \App\Models\Conversation::create();

});


Route::get("/login" , Login::class)->name("login");

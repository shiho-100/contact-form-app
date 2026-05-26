<?php

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

    $categories = [
        1 => '商品のお届けについて',
        2 => '商品の交換について',
        3 => '商品トラブル',
        4 => 'ショップへのお問い合わせ',
        5 => 'その他',
    ];

    return view('contact.index', compact('categories'));
});

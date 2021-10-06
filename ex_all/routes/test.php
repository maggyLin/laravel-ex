<?php
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;

// route provider test


Route::get('/', function () {
    return " This is test route ";
});

Route::get('/testdb', function () {
    $users = DB::select('select * from users ;');
    $user = collect($users)->first();
    dd($user);
});
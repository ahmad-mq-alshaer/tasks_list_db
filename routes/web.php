<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    $tasks = DB::table('tasks')->get();
    return view('index', compact('tasks'));
});

Route::post('insert', function () {
    DB::table('tasks')->insert([
        'name' => $_POST['name'],
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return redirect() -> back();
});


Route::post('delete/{id}',function($id){
    DB::table('tasks')-> where('id',$id)-> delete();

    return redirect() -> back();
});
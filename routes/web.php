<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/member', function (){
    return view('admin.member');

});

Route::get('/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
Route::post('/members/{member}/update', [MemberController::class,'update'])->name('members.update');


// ルートディレクトリにアクセスされたら、viewディレクトリのwelcomeファイルを開く

Route::controller(FirstController::class)->group(function() {
    //controller(FirstController::class)でコントローラーのクラスを呼び出す
    // ->group(function() {｝で呼び出したい処理をグループ化
    // function()　無名クラス
    Route::get('first', 'index');
});

// Route::get('first', [FirstController::class, 'index']);
// getは引数二個って決まっているから、2個目は配列の形

// 第一引数はURLのパス、第二引数実際にアクセスする
// @以降はmethod名
// phpだから最後セミコロンだろうが！

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

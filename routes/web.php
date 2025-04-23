<?php

use App\Livewire\Member;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SelfIntroductionController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('admin/member', function (){
    return view('admin.member');

});

// メンバー一覧ページを表示するルートを追加
Route::get('/', App\livewire\Member::class)->name('members.index');
// 特定のメンバーの編集フォームを表示するルート
Route::get('/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
// 特定のメンバー情報を更新するルート（フォームからのPOST送信を受け取る）
Route::post('/members/{member}/update', [MemberController::class,'update'])->name('members.update');

// 自己紹介ページ
Route::get('/introduction', [SelfIntroductionController::class, 'index'])->name('introduction');


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

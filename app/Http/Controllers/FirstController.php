<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FirstController extends Controller
{
    public function index(){
        $name = 'maki';
        $products = Product::where('price', '>=', 300)->get();
        // プロダクトテーブルからpriceが、300以上の商品をgetする
        return view('first', compact('name' , 'products'));
        // compact()変数を渡したい時に使う（変数と同じ名前で、連想配列を作る）
    }
}

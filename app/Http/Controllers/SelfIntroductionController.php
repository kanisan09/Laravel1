<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SelfIntroductionController extends Controller
{
    public function index(): View{
        return view('self_introduction');
    }
}

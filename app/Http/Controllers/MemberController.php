<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse; 

class MemberController extends Controller
{

    public function index(): View{
        $members = Member::all();
        return view('member', compact('members'));
    }

    // 特定のメンバーの編集フォーム
    public function edit(Member $member): View{
        return view('members.edit', compact('member'));
    }

    // 特定のメンバーの情報更新
    public function update(Request $request, Member $member): RedirectResponse{
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $member->update(['name' => $request->name]);

        return Redirect::route('members.index')->with('message', '更新しました！');
    }

}

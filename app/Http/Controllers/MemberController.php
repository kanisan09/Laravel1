<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MemberController extends Controller
{
    public function edit(Member $member){
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member){
        $request->validate([
            'name' => 'required|max255',
        ]);

        $member->update(['name' => $request->name]);

        return Redirect::route('members.index')->with('message', '更新しました！');
    }
}

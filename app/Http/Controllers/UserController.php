<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getIndex()
    {
        // 通常のORMを使用した場合
        // $latestUser = User::orderBy('created_at', 'desc')->take(10)->get();

        // クエリスコープメソッド
        $latestUser = User::createdlatest(10)->get();

        \Debugbar::info($latestUser);

        return view('user/index', [
            'latestUsers' => $latestUser
        ]);
    }
}

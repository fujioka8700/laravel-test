<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Libs\ClassL;

// use App\Facades\FacadeClassL;
// use App\Facades\FacadeClassY;

class UserController extends Controller
{
    public function getIndex()
    {
        // 通常のORMを使用した場合
        // $latestUser = User::orderBy('created_at', 'desc')->take(10)->get();

        // $ClassL = new ClassL();
        // \Debugbar::info($ClassL);

        \Debugbar::info(\FacadeClassL::method());

        \Debugbar::info(\FacadeClassY::methodY());

        // クエリスコープメソッド
        $latestUser = User::createdlatest(10)->get();

        \Debugbar::info($latestUser);

        return view('user/index', [
            'latestUsers' => $latestUser
        ]);
    }
}

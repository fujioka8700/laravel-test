<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;

class BoardController extends Controller
{
    public function getIndex()
    {
        $boards = Board::all();
        \Debugbar::info($boards);

        return view('board.index', [
            'boards' => $boards
        ]);
    }
}

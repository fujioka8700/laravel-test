<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dice;
use App\LoadedDice;
use Illuminate\Support\Facades\App;

class DiceController extends Controller
{
    public function rollDouble()
    {
        if (App::environment('testing')) {
            $dice = new LoadedDice();
        } else {
            $dice = new Dice();
        }

        return $dice->roll() + $dice->roll();
    }
}

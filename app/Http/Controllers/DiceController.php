<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dice;
use App\LoadedDice;
use App\RollableDice;
use Illuminate\Support\Facades\App;

class DiceController extends Controller
{
    private $dice;

    public function __construct(RollableDice $dice)
    {
        $this->dice = $dice;
    }

    public function rollDouble()
    {
        return $this->dice->roll() + $this->dice->roll();
    }
}

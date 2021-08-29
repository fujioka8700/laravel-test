<?php

namespace App;

class Dice
{
    public function roll(): int
    {
        return mt_rand(1, 6);
    }
}

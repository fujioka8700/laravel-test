<?php

namespace App;

class LoadedDice implements RollableDice
{
    public function roll(): int
    {
        return 6;
    }
}

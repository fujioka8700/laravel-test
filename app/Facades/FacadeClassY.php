<?php

namespace App\Facades;

use App\ClassY;
use Illuminate\Support\Facades\Facade;

class FacadeClassY extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ClassY::class;
    }
}
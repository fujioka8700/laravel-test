<?php

namespace App\Facades;

use App\Libs\ClassL;
use Illuminate\Support\Facades\Facade;

class FacadeClassL extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ClassL::class;
    }
}
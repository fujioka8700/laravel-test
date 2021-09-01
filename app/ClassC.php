<?php

namespace App;

class ClassC
{
    public function __construct()
    {
        \Debugbar::info('ClassCインスタンス化完了');
    }
}
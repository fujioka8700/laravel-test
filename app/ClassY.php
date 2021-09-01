<?php

namespace App;

class ClassY
{
    public $foo;

    public function __construct()
    {
        \Debugbar::info('ClassYのインスタンス化、完了。');
    }

    public function methodY()
    {
        return 'methodY called';
    }
}
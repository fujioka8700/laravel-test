<?php

namespace App;

class ClassX
{
    public $foo;

    public function __construct(ClassA $ClassA)
    {
        \Debugbar::info('ClassX instantiated');
    }

    public function methodX()
    {
        return 'methodX called';
    }
}
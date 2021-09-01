<?php

namespace App;

class ClassA
{
    public function __construct(ClassB $classB)
    {
        \Debugbar::info('ClassAインスタンス化完了');
    }
}
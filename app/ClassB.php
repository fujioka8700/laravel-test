<?php

namespace App;

class ClassB
{
    public function __construct(ClassC $classC)
    {
        \Debugbar::info('ClassBインスタンス化完了');
    }
}
<?php

namespace App\Http\Components;

class FileOperation
{
    /**
     * テキストファイルを作成する
     * @return string // ファイルの場所を返す
     */
    public function makeTextFile()
    {
        $file = sprintf('%s/test.txt', storage_path('texts'));

        if (file_exists($file)) {
            unlink($file);
        }

        touch($file);

        return $file;
    }

    /**
     * ファイルに指定回数分の、追加書き込みを行う
     * @param string $file
     * @param int $max
     * @return void
     */
    public function write(string $file, int $max)
    {
        for ($i=0; $i < $max; $i++) {
            $current = file_get_contents($file);
            $current .= $i;
            file_put_contents($file, $current);
        }
    }
}

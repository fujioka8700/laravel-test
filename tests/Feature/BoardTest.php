<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Board;

class BoardTest extends TestCase
{
    /**
     * 掲示板 トップページの表示内容のテスト
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/boards');
        $response->assertSee('掲示板のテスト');
    }

    /**
     * 掲示板 トップページの表示内容のテスト
     * @return void
     */
    public function testTopIndex()
    {
        // テストデータが二つ存在するとする
        $first = Board::factory()->create();
        $second = Board::factory()->create();
        $first->save();
        $second->save();

        // テスト開始
        $response = $this->get('/boards');
        $response->assertSee('掲示板のテスト');
        $response->assertSee($first->title)->assertSee($first->content);
        $response->assertSee($second->title)->assertSee($second->content);
    }

}

<?php

namespace Tests\Feature\Dice;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\DiceController;

class DiceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_サイコロ2つの合計が12()
    {
        $response = $this->get('dice');
        $response->assertSee(12);
    }
}

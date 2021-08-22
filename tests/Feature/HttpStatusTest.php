<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HttpStatusTest extends TestCase
{
    /**
     * index ページのステータスコードは 200
     * @return void
     */
    public function testIndexStatus()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
    }
}

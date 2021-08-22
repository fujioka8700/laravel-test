<?php

namespace Tests\Feature\Database;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // $this->artisan('config:clear');
    }

    public function testDatabase()
    {
        $this->assertTrue(
            Schema::hasColumns('books', [
                'id', 'title', 'author'
            ])
        );
    }

    public function testSaveDatabase()
    {
        $book = new Book();
        $book->title = 'hoge';
        $book->author = 'tarou';
        $saveBook = $book->save();

        $this->assertTrue($saveBook);
    }

    public function testRegisterDatabase()
    {
        $book = new Book();
        $book->title = 'hoge';
        $book->author = 'tarou';
        $book->save();

        $book = [
            'title' => 'hoge'
        ];
        $this->assertDatabaseHas('books', $book);
    }

    public function testFactoryDatabase()
    {
        $book = [
            'title' => 'hogehoge',
            'author' => 'yamadahanako'
        ];

        Book::factory()->create($book);

        $this->assertDatabaseHas('books', $book);
    }

    public function testFactoryCreateThreeDatabase()
    {
        $books = Book::factory()->count(3)->create();
        $bookCount = count($books) == 3;
        $this->assertTrue($bookCount);
    }
}

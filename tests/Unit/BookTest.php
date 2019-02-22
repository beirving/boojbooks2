<?php

namespace Test\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class BookTest extends TestCase
{
    //trait for reverting any database changes
    use RefreshDatabase;

    public function testCreateAndFind()
    {
        $newBook = factory(Book::class)->create([
            'title' => 'Storm Front',
            'publication_date' => '2000-04-01',
            'description' => 'Harry Desden must save Chicago and I guess the rest of the world'),
            'pages' => '322',
            'author_id' => 1
        ]);

        $checkFind = Book::findOrCreate('Storm Front');

        $this->assertEquals($newBook->id, $checkFind->id);
    }
}
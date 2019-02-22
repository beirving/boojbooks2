<?php

namespace Test\Unit;

use App\Author;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class AuthorTest extends TestCase
{
    //trait for reverting any database changes
    use RefreshDatabase;

    public function testCreateAndFind()
    {
        $newAuthor = factory(Author::class)->create([
            'name' => 'Jim Butcher',
            'biography' => 'Writes some really good books about wizards',
            'birthday' => '1971-10-26'
        ]);

        $checkFind = Author::findOrCreate('Jim Butcher');

        $this->assertEquals($newAuthor->id, $checkFind->id);
    }
}
<?php

namespace Test\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class AuthorTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/home');
        $response->assertStatus(200);
    }

    public function testCreateAuthorForm()
    {
        $this->visit('\authors')
            ->type('Jim Butcher', 'name')
            ->type('Has written some amazing Books', 'biography')
            ->type('1971-10-26', 'birthday')
            ->press('Submit')
            ->see('Jim Butcher');
    }

    public function testCreateBookForm()
    {
        $this->visit('\authors')
            ->type('Storm Front','title')
            ->select('1', 'author_id')
            ->type('2000-04-01', 'publication_date')
            ->type('Harry Desden must save Chicago and I guess the rest of the world', 'description')
            ->type('322','pages')
            ->press('Submit')
            ->see('Storm Front');
    }
}
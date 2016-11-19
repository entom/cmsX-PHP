<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testHomepage()
    {
        $this->visit('/')
             ->see('Homepage');
    }

    /**
     * testNotFoundPage method
     */
    public function testNotFoundPage()
    {
        $this->visit('/strona-glowna')
            ->dontSee('Strona główna');
    }

}

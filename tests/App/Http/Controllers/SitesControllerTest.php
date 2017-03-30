<?php
/**
 * Created by PhpStorm.
 * User: tomasznicieja
 * Date: 19.11.2016
 * Time: 19:20
 */

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SitesControllerTest extends TestCase
{
    /**
     * Testing sites show action
     *
     * @return void
     */
    public function testShow()
    {
        $this->visit('/kontakt')->see('Kontakt');

        $response = $this->call('GET', '/strona-glowna');
        $this->assertEquals(404, $response->status());

        $this->assertEquals(1, 1);
    }
}

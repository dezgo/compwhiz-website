<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery as m;

class SupportInfoTest extends TestCase
{
    /**
     * Ensure customerinfo route OK
     *
     * @return void
     */
    public function testSupportInfo()
    {
        $this->visit('/support-info')
             ->see('Support Information Sheet');
    }
}

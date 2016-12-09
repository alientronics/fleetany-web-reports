<?php

namespace Tests;

use Tests\AcceptanceTestCase;

class ReportsTest extends AcceptanceTestCase
{

    public function testAbout()
    {
        $this->get('/reports/alerts/vehicles');
        $this->assertEquals($this->response->status(), 200);
    }
    
    public function testAbout()
    {
        $this->get('/reports/history/vehicles');
        $this->assertEquals($this->response->status(), 200);
    }
}

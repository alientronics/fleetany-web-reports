<?php

namespace Tests;

use Tests\AcceptanceTestCase;

class ReportsTest extends AcceptanceTestCase
{

    public function testAlertsVehicles()
    {
        $this->get('/reports/alerts/vehicles');
        $this->assertEquals($this->response->status(), 200);
    }
    
    public function testHistoryVehicles()
    {
        $this->get('/reports/history/vehicles');
        $this->assertEquals($this->response->status(), 200);
    }
}

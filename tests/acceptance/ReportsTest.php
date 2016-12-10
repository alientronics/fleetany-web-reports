<?php

namespace Tests;

use Tests\AcceptanceTestCase;

class ReportsTest extends AcceptanceTestCase
{

    public function testAlertsVehicles()
    {
        $this->get('/reports/alerts/vehicles');
        echo $this->response->getContent();
        $this->assertEquals($this->response->status(), 200);
    }
    
    public function testHistoryVehicles()
    {
        $this->get('/reports/history/vehicles');
        $this->assertEquals($this->response->status(), 200);
    }
    
    public function testAlertsReport()
    {
        $this->get('/reports/alerts/tire/1');
        $this->assertEquals($this->response->status(), 200);
    }
}

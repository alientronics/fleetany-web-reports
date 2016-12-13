<?php

namespace Tests;

use Tests\AcceptanceTestCase;

class ReportsTest extends AcceptanceTestCase
{

    private function setEloquentMock($method, $return)
    {
        $mockRepo = \Mockery::mock('Alientronics\FleetanyWebReports\Controllers\ReportController');
        $mockRepo->shouldReceive($method)->andReturn($return);

        $this->app->instance('Alientronics\FleetanyWebReports\Controllers\ReportController', $mockRepo);
    }
    
    public function testAlertsReportSuccess()
    {
        $this->setEloquentMock('alertsReport', 'entity attributes');
        $this->get('/reports/alerts/tire/1');
        echo $this->response->getContent();
        $this->assertEquals($this->response->status(), 200);
    }
    
    public function testAlertTypeReportSuccess()
    {
        $this->setEloquentMock('alertTypeReport', 'entity attributes');
        $this->get('/reports/alerts/tire/1/type/1');
        echo $this->response->getContent();
        $this->assertEquals($this->response->status(), 200);
    }

    public function testAlertsVehicles()
    {
        $this->setEloquentMock('results', 'entity attributes');
        $this->get('/reports/alerts/vehicles')->see('vehicasdasles');
    }
}

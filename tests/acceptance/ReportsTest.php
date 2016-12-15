<?php

namespace Tests;

use Tests\AcceptanceTestCase;

class ReportsTest extends AcceptanceTestCase
{

    private function setEloquentMock($method, $return)
    {
        $mockRepo = \Mockery::mock('Alientronics\FleetanyWebReports\Repositories\ReportsRepositoryEloquent');
        $mockRepo->shouldReceive($method)->andReturn($return);

        $this->app->instance('Alientronics\FleetanyWebReports\Repositories\ReportsRepositoryEloquent', $mockRepo);
    }
    
    public function testAlertsReportSuccess()
    {
        $this->setEloquentMock('getAlerts','');
        $this->get('/reports/alerts/tire/1');
        echo $this->response->getContent();
        $this->assertEquals($this->response->status(), 200);
    }
    
    public function testAlertTypeReportSuccess()
    {
        $this->setEloquentMock('getTypes','');
        $this->get('/reports/alerts/tire/1/type/1');
        echo $this->response->getContent();
        $this->assertEquals($this->response->status(), 200);
    }


}

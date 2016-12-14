<?php

namespace Tests;

use Tests\AcceptanceTestCase;

class ReportsTest extends AcceptanceTestCase
{

    private function setEloquentMock($method, $return)
    {
        $mockRepo = \Mockery::mock('Illuminate\Support\Facades\Auth');
        $mockRepo->shouldReceive('user')->andReturn(['company_id'=>1]);

        $this->app->instance('Illuminate\Support\Facades\Auth', $mockRepo);
    }
    
    public function testAlertsReportSuccess()
    {
        //$this->setEloquentMock('alertsReport', []);
        $this->get('/reports/alerts/tire/1');
        echo $this->response->getContent();
        $this->assertEquals($this->response->status(), 200);
    }
    
    public function testAlertTypeReportSuccess()
    {
        //$this->setEloquentMock('alertTypeReport', 'entity attributes');
        $this->get('/reports/alerts/tire/1/type/1');
        echo $this->response->getContent();
        $this->assertEquals($this->response->status(), 200);
    }


}

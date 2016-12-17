<?php

namespace Tests;

use Tests\AcceptanceTestCase;

class ReportsTest extends AcceptanceTestCase
{

    private function setEloquentMock($method)
    {
        $register = (object)[
            'status'=>1,
            'description'=>'{"description":78965,
                            "vehicle_fleet":2,
                            "vehicle_plate":3,
                            "tire_number":4}'
        ];
        $mockRepo = \Mockery::mock('Alientronics\FleetanyWebReports\Repositories\ReportsRepositoryEloquent');
        $mockRepo->shouldReceive($method)->andReturn([$register]);

        $this->app->instance('Alientronics\FleetanyWebReports\Repositories\ReportsRepositoryEloquent', $mockRepo);
    }
    
    public function testAlertsReportSuccess()
    {
        $this->setEloquentMock('getAlerts');
        $this->get('/reports/alerts/tire/1')->see('78965');
    }
    
    public function testAlertTypeReportSuccess()
    {
        $this->setEloquentMock('getTypes');
        $this->get('/reports/alerts/tire/1/type/1')->see('78965');
    }
}

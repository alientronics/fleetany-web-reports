<?php

namespace Tests;

use Tests\AcceptanceTestCase;

class ReportsTest extends AcceptanceTestCase
{

    private function setVehicleEloquentMock($method, $return)
    {
        $mockRepo = \Mockery::mock('App\Repositories\VehicleRepositoryEloquent');
        $mockRepo->shouldReceive($method)->andReturn($return);

        $this->app->instance('App\Repositories\VehicleRepositoryEloquent', $mockRepo);
    }

    public function testAlertsVehicles()
    {
        $this->setVehicleEloquentMock('results', 'entity attributes');
        $this->get('/reports/alerts/vehicles')->see('vehicasdasles');
    }
}

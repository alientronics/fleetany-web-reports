<?php

namespace Alientronics\FleetanyWebReports\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Repositories\HelperRepository;
use App\Repositories\FleetRepositoryEloquent;
use Alientronics\FleetanyWebReports\Repositories\ReportsRepositoryEloquent;

/**
 * Class ReportController
 * @package Alientronics\FleetanyWebReports\Controllers
 */
class ReportController extends Controller
{
    protected $fleetRepo;
    protected $reportsRepo;
    protected $companyId;
    
    public function __construct(FleetRepositoryEloquent $fleetRepo, ReportsRepositoryEloquent $reportsRepo)
    {
        parent::__construct();

        $this->middleware('auth');
        $this->fleetRepo = $fleetRepo;
        $this->reportsRepo = $reportsRepo;
    }
    
    public function alertsReport($entity_key, $entity_id)
    {
        $registers = $this->reportsRepo->getAlerts($entity_key, $entity_id);
    
        return view("fleetany-web-reports::reports.alerts.types", compact('registers', 'entity_key', 'entity_id'));
    }
    
    public function alertTypeReport($entity_key, $entity_id, $alert_type)
    {
        $registers = $this->reportsRepo->getTypes($entity_key, $entity_id, $alert_type);

        if (!empty($registers)) {
            foreach ($registers as $index => $register) {
                $registers[$index]->status = empty($register->status) ?
                                                Lang::get("webreports.failed") :
                                                Lang::get("webreports.success");
            
                $alert = json_decode($register->description);
                $registers[$index]->name = $alert->description;
                $registers[$index]->vehicle = $alert->vehicle_fleet." - ".$alert->vehicle_plate;
                $registers[$index]->position = $alert->tire_number;
            }
        }

        return view("fleetany-web-reports::reports.alerts.index", compact('registers', 'entity_key', 'entity_id'));
    }
}

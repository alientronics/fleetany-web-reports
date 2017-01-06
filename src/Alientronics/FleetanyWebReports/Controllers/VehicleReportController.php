<?php

namespace Alientronics\FleetanyWebReports\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Repositories\HelperRepository;
use App\Repositories\FleetRepositoryEloquent;
use Alientronics\FleetanyWebReports\Repositories\ReportsRepositoryEloquent;
use Alientronics\FleetanyWebReports\Repositories\VehicleReportsRepositoryEloquent;
use App\Repositories\PartRepositoryEloquent;

/**
 * Class VehicleReportController
 * @package Alientronics\FleetanyWebReports\Controllers
 */
class VehicleReportController extends Controller
{
    protected $vehicleReportsRepo;
    protected $partRepo;
    protected $fleetRepo;
    
    protected $fieldsIndex = [
        'id',
        'fleet-number',
        'plate',
        'vendor',
        'model',
        'year',
        'number-of-tires',
        'number-of-sensors',
        'number-of-alerts',
        'number-of-maintenances',
        'number-of-active-alerts',
    ];
    
    protected $fieldsMaintenance = [
        'id',
        'fleet-number',
        'number',
        'plate',
        'datetime',
        'cost',
        'maintenance-type',
    ];
    
    public function __construct(
        VehicleReportsRepositoryEloquent $vehicleReportsRepo,
        PartRepositoryEloquent $partRepo,
        FleetRepositoryEloquent $fleetRepo
    ) {
    
        parent::__construct();
        
        $this->middleware('auth');
        $this->vehicleReportsRepo = $vehicleReportsRepo;
        $this->partRepo = $partRepo;
        $this->fleetRepo = $fleetRepo;
    }
    
    public function index()
    {
        $filters = $this->helper->getFilters($this->request->all(), $this->fieldsIndex, $this->request);
        
        $registers = $this->vehicleReportsRepo->results($filters);
                
        return view("fleetany-web-reports::reports.vehicles.index", compact('registers', 'filters'));
    }
    
    public function maintenance()
    {
        $filters = $this->helper->getFilters($this->request->all(), $this->fieldsMaintenance, $this->request);
        
        $registers = $this->vehicleReportsRepo->results($filters);
                
        return view("fleetany-web-reports::reports.vehicles.maintenance", compact('registers', 'filters'));
    }
}

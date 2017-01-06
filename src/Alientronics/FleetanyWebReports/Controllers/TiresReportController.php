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
 * Class TiresReportController
 * @package Alientronics\FleetanyWebReports\Controllers
 */
class TiresReportController extends Controller
{
    protected $vehicleReportsRepo;
    protected $partRepo;
    protected $fleetRepo;
    
    protected $fieldsIndex = [
        'id',
        'number',
        'sensor-number',
        'fleet-number',
        'plate',
        'position',
        'lifecycle',
        'number-of-alerts',
        'number-of-maintenances',
        'cost',
    ];
                
    protected $fieldsMaintenance = [
        'id',
        'fleet-number',
        'number',
        'plate',
        'position',
        'datetime',
        'cost',
        'maintenance-type'
    ];
    
    protected $fieldsSensors = [
        'id',
        'sensor-number',
        'number',
        'fleet-number',
        'plate',
        'position',
        'activation-date',
        'last-update-datetime',
        'number-of-alerts',
        'cost'
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
                
        return view("fleetany-web-reports::reports.tires.index", compact('registers', 'filters'));
    }
    
    public function maintenance()
    {
        $filters = $this->helper->getFilters($this->request->all(), $this->fieldsMaintenance, $this->request);
        
        $registers = $this->vehicleReportsRepo->results($filters);
                
        return view("fleetany-web-reports::reports.tires.maintenance", compact('registers', 'filters'));
    }
    
    public function sensors()
    {
        $filters = $this->helper->getFilters($this->request->all(), $this->fieldsSensors, $this->request);
        
        $registers = $this->vehicleReportsRepo->results($filters);
                
        return view("fleetany-web-reports::reports.tires.sensors", compact('registers', 'filters'));
    }
}

<?php

namespace Alientronics\FleetanyWebReports\Controllers;

use App\Http\Controllers\Controller;
use App\Entities\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Entities\Part;
use Illuminate\Support\Facades\Lang;
use App\Repositories\HelperRepository;
use App\Repositories\FleetRepositoryEloquent;

/**
 * Class ReportController
 * @package Alientronics\FleetanyWebReports\Controllers
 */
class ReportController extends Controller
{
    protected $fleetRepo;
    
    public function __construct(FleetRepositoryEloquent $fleetRepo)
    {
        parent::__construct();

        $this->middleware('auth');
        $this->fleetRepo = $fleetRepo;
    }
    
    public function alertsReport($entity_key, $entity_id)
    {
        $client = new Client();
        $alertsTypes = $client->request('GET', config('app.alerts_api_url').'/api/v1/alerts/'.
            $entity_key.'/'.$entity_id.'/'.Auth::user()->company_id.'?api_token='.
            config('app.alerts_api_key'));
        $registers = json_decode((string)$alertsTypes->getBody());
    
        return view("fleetany-web-reports::alerts-types-report", compact('registers', 'entity_key', 'entity_id'));
    }
    
    public function alertTypeReport($entity_key, $entity_id, $alert_type)
    {
        $client = new Client();
        $alertsTypes = $client->request('GET', config('app.alerts_api_url').'/api/v1/alerts/'.
                                $entity_key.'/'.$entity_id.'/type/'.$alert_type.'/'.
                                Auth::user()->company_id.'?api_token='.config('app.alerts_api_key'));
        $registers = json_decode((string)$alertsTypes->getBody());

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

        return view("fleetany-web-reports::alerts-report", compact('registers', 'entity_key', 'entity_id'));
    }
    
    public function vehicleHistory($fleetData, $dateIni, $dateEnd)
    {
        $tireSensorData['positions'] = [];
        $partsIds = [];
        if (!empty($fleetData['tireData'])) {
            foreach ($fleetData['tireData'] as $vehicleData) {
                foreach ($vehicleData as $position => $tireData) {
                    if (!empty($tireData->part_id)) {
                        $tireSensorData['positions'][] = $position;
                        $partsIds[] = $tireData->part_id;
                    }
                }
            }
        }
        
        asort($tireSensorData['positions']);
        
        if (empty($dateIni)) {
            $dateIni = date("Y-m-d H:i:s");
            $dateEnd = date('Y-m-d 23:59:59');
        }
        
        $tireSensorData['data'] = $this->fleetRepo->getTireSensorHistoricalData($partsIds, $dateIni, $dateEnd);
        $tireSensorData['columns'] = [];
        
        if (!empty($tireSensorData['positions'])) {
            $tireSensorData = $this->fleetRepo->setColumnsChart($tireSensorData);
        }
        
        $arrayReturn['timeIni'] = substr($dateIni, 11);
        $arrayReturn['timeEnd'] = substr($dateEnd, 11);
        $arrayReturn['dateIni'] = substr(HelperRepository::date($dateIni, 'app_locale'), 0, 10);
        $arrayReturn['tireSensorData'] = $tireSensorData;
        
        return $arrayReturn;
    }
}

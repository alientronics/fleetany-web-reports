<?php

namespace Alientronics\FleetanyWebReports\Controllers;

use App\Http\Controllers\Controller;
use App\Entities\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Entities\Part;
use Illuminate\Support\Facades\Lang;

/**
 * Class ReportController
 * @package Alientronics\FleetanyWebReports\Controllers
 */
class ReportController extends Controller
{

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

        if(!empty($registers))
        {
            foreach($registers as $index => $register) {
                $registers[$index]->status = empty($register->status) ? Lang::get("webreports.failed") : Lang::get("webreports.success");
            
                $alert = json_decode($register->description);
                $registers[$index]->name = $alert->description;
                $registers[$index]->vehicle = $alert->vehicle_fleet." - ".$alert->vehicle_plate;
                $registers[$index]->position = $alert->tire_number;
            }
        }

        return view("fleetany-web-reports::alerts-report", compact('registers', 'entity_key', 'entity_id'));
    }
}

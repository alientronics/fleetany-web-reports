<?php

namespace Alientronics\FleetanyWebReports\Controllers;

use App\Http\Controllers\Controller;
use App\Entities\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Entities\Part;

/**
 * Class ReportController
 * @package Alientronics\FleetanyWebReports\Controllers
 */
class ReportController extends Controller
{

    public function vehicleAlertsReport($vehicle_id)
    {
        $client = new Client();
        $alertsTypes = $client->request('GET', config('app.alerts_api_url').'/api/v1/alerts/vehicle/'.
            $vehicle_id.'/'.Auth::user()->company_id.'?api_token='.config('app.alerts_api_token'));
        $registers = json_decode((string)$alertsTypes->getBody());
    
        return view("fleetany-web-pages::alerts-types-report", compact('registers', 'vehicle_id'));
    }
    
    public function vehicleAlertTypeReport($vehicle_id, $alert_type)
    {
        $client = new Client();
        $alertsTypes = $client->request('GET', config('app.alerts_api_url').'/api/v1/alerts/vehicle/'.
                                $vehicle_id.'/type/'.$alert_type.'/'.
                                Auth::user()->company_id.'?api_token='.config('app.alerts_api_token'));
        $registers = json_decode((string)$alertsTypes->getBody());

        return view("fleetany-web-pages::alerts-report", compact('registers', 'vehicle_id'));
    }
}

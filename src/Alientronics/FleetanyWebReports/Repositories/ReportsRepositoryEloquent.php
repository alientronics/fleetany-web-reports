<?php

namespace Alientronics\FleetanyWebReports\Repositories;

use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\json_decode;
use Illuminate\Support\Facades\Input;

class ReportsRepositoryEloquent
{

    private static $client;

    public static function setClient($client)
    {
        self::$client = $client;
    }

    public static function getClient()
    {
        if (empty(self::$client)) {
            self::$client = new Client();
        }
        return self::$client;
    }
    
    public function getAlerts($entity_key, $entity_id)
    {
        $client = self::getClient();
        $response = $client->request('GET', config('app.alerts_api_url').'/api/v1/alerts/'.
            $entity_key.'/'.$entity_id.'/'.Auth::user()['company_id'].'?api_token='.
            config('app.alerts_api_key'));
        
        return json_decode((string)$response->getBody());
    }

    public function getTypes($entity_key, $entity_id, $alert_type)
    {
        $client = self::getClient();
        $response = $client->request('GET', config('app.alerts_api_url').'/api/v1/alerts/'.
                                $entity_key.'/'.$entity_id.'/type/'.$alert_type.'/'.
                                Auth::user()['company_id'].'?api_token='.config('app.alerts_api_key'));
        
        return json_decode((string)$response->getBody());
    }
 
}

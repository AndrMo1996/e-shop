<?php

namespace App\Services;

use GuzzleHttp\Client;

class NovaPoshta
{
    public static function getAreas(){
        $client = new Client();

        $response = $client->request('GET', config('nova_poshta.api_url'),[
            'body' => json_encode([
                'apiKey' => config('nova_poshta.api_key'),
                'modelName' => 'Address',
                'calledMethod' => 'getAreas'
            ])
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        if ($result['success'] !== true){
            return [];
        }

        return $result['data'];
    }

    public static function getCities(string $areaRef){
        $client = new Client();

        $response = $client->request('GET', config('nova_poshta.api_url'),[
            'body' => json_encode([
                'apiKey' => config('nova_poshta.api_key'),
                'modelName' => 'Address',
                'calledMethod' => 'getCities',
                'methodProperties' => [
                    'AreaRef' => $areaRef
                ]
            ])
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        if ($result['success'] !== true){
            return [];
        }

        return $result['data'];
    }

    public static function getWarehouses(string $cityRef){
        $client = new Client();

        $response = $client->request('GET', config('nova_poshta.api_url'),[
            'body' => json_encode([
                'apiKey' => config('nova_poshta.api_key'),
                'modelName' => 'Address',
                'calledMethod' => 'getWarehouses',
                'methodProperties' => [
                    'CityRef' => $cityRef
                ]
            ])
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        if ($result['success'] !== true){
            return [];
        }

        return $result['data'];
    }
}

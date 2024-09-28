<?php

namespace App\Services\Apps\APILayer\Actions;

use App\Shared\Apps\Actions\BaseAction;

class APILayerNumberValidation extends BaseAction
{

    protected function setFields() : array
    {
        return [
            'inputRequiredFields' => ['number'],
            'configRequiredFields' => ['apikey']
        ];
    }

    protected function prepareRequest( array $inputData, array $configData ) : array
    {

        // api wants data like url / params 
        $url = 'https://api.apilayer.com/number_verification/validate' ;

        $headers = [
            'apikey' => $configData['apikey']
        ];

        $queryParams = [
            'number' => $inputData['number']
        ];

        return [
            'url' => $url,
            'method' => 'GET',
            'headers' => $headers,
            'queryParams' => $queryParams
        ];

    }

}
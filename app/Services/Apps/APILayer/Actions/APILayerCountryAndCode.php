<?php

namespace App\Services\Apps\APILayer\Actions;

use App\Shared\Apps\Actions\BaseAction;

class APILayerCountryAndCode extends BaseAction
{

    protected function setFields() : array
    {
        return [
            'configRequiredFields' => ['apikey']
        ];
    }

    protected function prepareRequest( array $inputData, array $configData ) : array
    {

        // api wants data like url / params 
        $url = 'https://api.apilayer.com/number_verification/countries';

        $headers = [
            'apikey' => $configData['apikey']
        ];

        return [
            'url' => $url,
            'method' => 'GET',
            'headers' => $headers
        ];

    }

}
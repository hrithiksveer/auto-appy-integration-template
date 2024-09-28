<?php

namespace App\Services\Apps\APILayer\Actions;

use App\Shared\Apps\Actions\BaseAction;

class APILayerEmailValidation extends BaseAction
{

    protected function setFields() : array
    {
        return [
            'inputRequiredFields' => ['email'],
            'configRequiredFields' => ['apikey']
        ];
    }

    protected function prepareRequest( array $inputData, array $configData ) : array
    {

        // api wants data like url / params 
        $url = 'https://api.apilayer.com/email_verification/' . $inputData['email'] ;

        $headers = [
            'Content-Type' => 'application/json',
            'apikey' => $configData['apikey']
        ];

        return [
            'url' => $url,
            'method' => 'GET',
            'headers' => $headers
        ];

    }

}
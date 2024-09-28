<?php

namespace App\Services\Apps\APILayer\Actions;

use App\Shared\Apps\Actions\BaseAction;

class APILayerEmailDeliveryValidation extends BaseAction
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
        $url = 'https://api.apilayer.com/email_verification/check' ;

        $headers = [
            'apikey' => $configData['apikey']
        ];

        $queryParams = [
            'email' => $inputData['email']
        ];

        return [
            'url' => $url,
            'method' => 'GET',
            'headers' => $headers,
            'queryParams' => $queryParams
        ];

    }

}
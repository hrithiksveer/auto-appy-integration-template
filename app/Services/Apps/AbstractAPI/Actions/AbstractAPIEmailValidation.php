<?php

namespace App\Services\Apps\AbstractAPI\Actions;

use App\Shared\Apps\Actions\BaseAction;

class AbstractAPIEmailValidation extends BaseAction
{
    // Override to set required fields
    protected function setFields(): array
    {
        return [
            'inputRequiredField' => ['email'],
            'configRequiredField' => ['apiKey']
        ];
    }

    // Override to prepare the API request
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://emailvalidation.abstractapi.com/v1/';

        $headers = [
            'Content-Type' => 'application/json'
        ];

        $queryParams = [
            'api_key' => $configData['apiKey'],
            
            'email' => $inputData['email']
        ];

        return [
            'url' => $url,
            'method' => 'GET',
            'headers' => $headers,
            'queryParams'=>$queryParams
        ];
    }
}

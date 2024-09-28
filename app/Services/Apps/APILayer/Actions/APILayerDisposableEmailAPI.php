<?php

namespace App\Services\Apps\APILayer\Actions;

use App\Shared\Apps\Actions\BaseAction;

class APILayerDisposableEmailAPI extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        
        $url = 'https://api.apilayer.com/disposable_email/' . $inputData['email'];
        
        $headers = [
            'apikey' => $configData['apikey'],
        ];

        return [
            'url' => $url,
            'method' => 'GET',
            'headers' => $headers,
        ];
    
    }

    protected function setFields(): array
    {
        return [
            'inputRequiredField' => ['email'],
            'configRequiredField' => ['apikey'],
        ];
    }
}

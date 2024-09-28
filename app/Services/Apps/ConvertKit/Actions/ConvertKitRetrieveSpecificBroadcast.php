<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitRetrieveSpecificBroadcast extends BaseAction
{

    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/broadcasts/' . $inputData['broadcast_id'];

        $headers = [
            'Content-Type' => 'application/json',
        ];

        return [
            'url' => $url,
            'method' => 'GET',
            'headers' => $headers,
            'queryParams' => [
                'api_secret' => $configData['api_secret']
            ]
        ];
    }

    protected function setFields(): array
    {
        return [
            'inputRequiredField' => ['broadcast_id'],
            'configRequiredField' => ['api_secret'],
        ];
    }
}

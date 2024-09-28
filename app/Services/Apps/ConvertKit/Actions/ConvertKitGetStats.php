<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitGetStats extends BaseAction
{

    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/broadcasts/' . $inputData['broadcast_id'] . '/stats';

        $headers = [
            'Content-Type' => 'application/json',
        ];

        $queryParams = [
            'api_secret' => $configData['api_secret']
        ];

        return [
            'url' => $url,
            'method' => 'GET',
            'headers' => $headers,
            'queryParams' => $queryParams
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

<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitListBroadcasts extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/broadcasts';

        $headers = [
            'Content-Type' => 'application/json',
        ];

        $queryParams = [
            'page' => $inputData['page'],
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
            'inputRequiredField' => ['page'],
            'configRequiredField' => ['api_secret'],
        ];
    }
}

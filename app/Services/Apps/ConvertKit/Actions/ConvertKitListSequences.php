<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitListSequences extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/sequences';

        $headers = [
            'Content-Type' => 'application/json',
        ];

        $queryParams = [
            'api_key' => $configData['api_key']
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
            'configRequiredField' => ['api_key'],
        ];
    }
}

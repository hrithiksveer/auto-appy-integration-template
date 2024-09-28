<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitViewSingleSubscriber extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/subscribers/' . $inputData['subscriber_id'];

        $headers = [
            'Content-Type' => 'application/json',
            'Cookie' => 'XSRF-TOKEN={{xsrf-token}}',
        ];

        $queryParams = [
            'api_secret' => $configData['api_secret'],
        ];

        return [
            'url' => $url,
            'method' => 'GET',
            'headers' => $headers,
            'queryParams' => $queryParams,
        ];
    }

    protected function setFields(): array
    {
        return [
            'inputRequiredField' => ['subscriber_id'],
            'configRequiredField' => ['api_secret']
        ];
    }

}

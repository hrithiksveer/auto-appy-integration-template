<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitUpdateSubscriber extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/subscribers/' . $inputData['subscriber_id'];

        $headers = [
            'Content-Type' => 'application/json',
            'Cookie' => 'XSRF-TOKEN={{xsrf-token}}',
        ];

        $body = [
            'api_secret' => $configData['api_secret'],
            'first_name' => $inputData['first_name'],
            'fields' => [
                'last_name' => $inputData['last_name']
            ]
        ];

        return [
            'url' => $url,
            'method' => 'PUT',
            'headers' => $headers,
            'bodyType' => 'json',
            'body' => $body,
        ];
    }

    protected function setFields(): array
    {
        return [
            'inputRequiredField' => ['subscriber_id', 'first_name'],
            'inputNonRequiredField' => ['last_name' => null],
            'configRequiredField' => ['api_secret']
        ];
    }
    
}

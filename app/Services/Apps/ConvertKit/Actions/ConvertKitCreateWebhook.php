<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitCreateWebhook extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/automations/hooks';
        
        $headers = [
            'Content-Type' => 'application/json',
        ];

        $body = [
            'api_secret' => $configData['api_secret'],
            'target_url' => $inputData['target_url'],
            'event' => [
                'name' => 'subscriber.subscriber_activate',
            ]
        ];

        return [
            'url' => $url,
            'method' => 'POST',
            'headers' => $headers,
            'bodyType' => 'json',
            'body' => $body,
        ];
    }

    protected function setFields(): array
    {
        return [
            'inputRequiredField' => ['target_url'],
            'configRequiredField' => ['api_secret'],
        ];
    }
}

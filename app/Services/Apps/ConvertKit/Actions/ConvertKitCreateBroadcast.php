<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitCreateBroadcast extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/broadcasts';

        $headers = [
            'Content-Type' => 'application/json',
        ];

        $body = [
            'api_secret' => $configData['api_secret'],
            'description' => $inputData['description'],
            'subject' => $inputData['subject'],
            'content' => $inputData['content']
        ];

        return [
            'url' => $url,
            'method' => 'POST',
            'headers' => $headers,
            'bodyType' => 'json',
            'body' => $body
        ];
    }

    protected function setFields(): array
    {
        return [
            'inputRequiredField' => ['description', 'subject', 'content'],
            'configRequiredField' => ['api_secret']
        ];
    }
}

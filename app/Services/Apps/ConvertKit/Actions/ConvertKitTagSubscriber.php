<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitTagSubscriber extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/tags/' . $inputData['tag_id'] . '/subscribe';

        $body = [
            'api_secret' => $configData['api_secret'],
            'email' => $inputData['email'],
        ];

        $headers = [
            'Content-Type' => 'application/json',
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
            'inputRequiredField' => ['tag_id', 'email'],
            'configRequiredField' => ['api_secret'],
        ];
    }
}

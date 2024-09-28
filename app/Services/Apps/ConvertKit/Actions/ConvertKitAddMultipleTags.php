<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitAddMultipleTags extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/tags';

        $headers = [
            'Content-Type' => 'application/json',
        ];

        $body = [
            'api_secret' => $configData['api_secret'],
            'tag' => $inputData['tags'],
        ];

        return [
            'url' => $url,
            'method' => 'POST',
            'headers' => $headers,
            'bodyType' => 'json',
            'body' => $body,
        ];
    }

    
    protected function getJsonKeys(): array
    {
        return ['tags'];
    }

    protected function setFields(): array
    {
        return [
            'inputRequiredField' => ['tags'],
            'configRequiredField' => ['api_secret'],
        ];
    }
}

<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitRemoveTagFromSubscriber extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/tags/' . $inputData['tag_id'] . '/unsubscribe' ;

        $queryParams = [
            "api_secret" => $configData['api_secret']
        ];

        $headers = [
            'Content-Type' => 'application/json',
        ];

        return [
            'url' => $url,
            'method' => 'POST',
            'headers' => $headers,
            'queryParams' => $queryParams
        ];
    }

    protected function setFields(): array
    {
        return [
            'inputRequiredField' => ['email'],
            'configRequiredField' => ['api_secret'],
        ];
    }
}

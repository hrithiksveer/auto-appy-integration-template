<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitUpdateBroadcast extends BaseAction
{

    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/broadcasts/' . $inputData['broadcast_id'];

        $headers = [
            'Content-Type' => 'application/json',
        ];

        $body = [
            'api_secret' => $configData['api_secret'],
            'content' => $inputData['content'],
            'email_address' => $inputData['email']
        ];

        return [
            'url' => $url,
            'method' => 'PUT',
            'headers' => $headers,
            'bodyType' => 'json',
            'body' => $body
        ];
    }

    protected function setFields(): array
    {
        return [
            'inputRequiredField' => ['content', 'email'],
            'configRequiredField' => ['api_secret']
        ];
    }
}

<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitDestroyBroadcast extends BaseAction
{

    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/broadcasts/' . $inputData['broadcast_id'];

        $headers = [
            'Content-Type' => 'application/json',
        ];

        $body = [
            'api_secret' => $configData['api_secret'],
        ];

        return [
            'url' => $url,
            'method' => 'DELETE',
            'headers' => $headers,
            'bodyType' => 'json',
            'body' => $body
        ];
    }

    protected function setFields(): array
    {
        return [
            'inputRequiredFields' => ['broadcast_id'],
            'configRequiredFields' => ['api_secret'],
        ];
    }
}

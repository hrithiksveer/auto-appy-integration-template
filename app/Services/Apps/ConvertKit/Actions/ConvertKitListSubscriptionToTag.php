<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitListSubscriptionToTag extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/tags/' . $inputData['tag_id'] . '/subscriptions';

        $headers = [
            'Content-Type' => 'application/json',
        ];

        $queryParams = [
            'api_secret' => $configData['api_secret']
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
            'inputRequiredField' => ['tag_id'],
            'configRequiredField' => ['api_secret'],
        ];
    }
}

<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitListTagsForSubscriber extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/subscribers/' . $inputData['subsriber_id'] . '/tags';

        $headers = [
            'Content-Type' => 'application/json',
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
            'configRequiredField' => ['api_secret']
        ];
    }
    
}

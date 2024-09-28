<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitCreatePurchase extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/purchases';
        
        $headers = [
            'Content-Type' => 'application/json',
        ];

        $body = [
            'api_secret' => $configData['api_secret'],
            'purchase' => $inputData['purchase'],
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
            'inputRequiredField' => ['purchase'],
            'configRequiredField' => ['api_secret'],
        ];
    }
}

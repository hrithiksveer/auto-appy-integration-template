<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitCreateSingleField extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/custom_fields';
        
        $headers = [
            'Content-Type' => 'application/json',
        ];

        $body = [
            'api_secret' => $configData['api_secret'],
            'label' => $inputData['label'],
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
            'inputRequiredField' => ['label'],
            'configRequiredField' => ['api_secret'],
        ];
    }
}

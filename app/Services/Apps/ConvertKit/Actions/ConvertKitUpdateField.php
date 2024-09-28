<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitUpdateField extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/custom_fields/' . $inputData['field_id'];
        
        $headers = [
            'Content-Type' => 'application/json',
        ];

        $body = [
            'api_secret' => $configData['api_secret'],
            'label' => $inputData['label'],
        ];

        return [
            'url' => $url,
            'method' => 'PUT',
            'headers' => $headers,
            'bodyType' => 'json',
            'body' => $body,
        ];
    }

    protected function setFields(): array
    {
        return [
            'inputRequiredField' => ['field_id', 'label'],
            'configRequiredField' => ['api_secret'],
        ];
    }
}

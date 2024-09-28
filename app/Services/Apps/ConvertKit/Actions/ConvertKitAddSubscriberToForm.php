<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitAddSubscriberToForm extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/forms/'. $inputData["form_id"] .'/subscribe';
        
        $headers = [
            'Content-Type' => 'application/json; charset=utf-8'
        ];
        
        $body = [
            'api_key' => $configData['api_key'],
            'email' => $inputData['email'],
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
            'inputRequiredField' => [ 'form_id', 'email'],
            'configRequiredField' => ['api_key']
        ];
    }
}
    
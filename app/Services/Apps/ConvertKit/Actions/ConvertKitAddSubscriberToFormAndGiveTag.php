<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitAddSubscriberToFormAndGiveTag extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/forms/' . $inputData['form_id'] . '/subscribe';

        $headers = [
            'Content-Type' => 'application/json',
        ];

        $body = [
            'api_key' => $configData['api_key'],
            'email' => $inputData['email'],
            'tags' => $inputData['tags'],
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
            'inputRequiredField' => ['form_id', 'email', 'tags'],
            'configRequiredField' => ['api_key'],
        ];
    }
}

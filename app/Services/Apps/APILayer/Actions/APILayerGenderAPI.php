<?php

namespace App\Services\Apps\APILayer\Actions;

use App\Shared\Apps\Actions\BaseAction;

class APILayerGenderAPI extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {

        $url = 'https://api.apilayer.com/gender/gender/by-first-name';

        $headers = [
            'Content-Type' => 'application/json',
            'apikey' => $configData['apikey'],
        ];

        $body = [
            'first_name' => $inputData['name'],
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
            'inputRequiredField' => ['name'],
            'configRequiredField' => ['apikey'],
        ];
    }
}

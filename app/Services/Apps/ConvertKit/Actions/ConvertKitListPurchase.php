<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitListPurchase extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/purchases';
        
        $queryParams = [
            'api_secret' => $configData['api_secret']
        ];

        return [
            'url' => $url,
            'method' => 'GET',
            'queryParams' => $queryParams,
        ];
    }

    protected function setFields(): array
    {
        return [
            'configRequiredField' => ['api_secret'],
        ];
    }
}

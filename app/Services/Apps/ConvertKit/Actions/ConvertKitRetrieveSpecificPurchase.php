<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitRetrieveSpecificPurchase extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/purchases/' . $inputData['purchase_id'];
        
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
            'inputRequiredField' => ['purchase_id'],
            'configRequiredField' => ['api_secret'],
        ];
    }
}

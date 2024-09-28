<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitListForm extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/forms';
     
        $queryParams = [
            'api_key' => $configData['api_key'],
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
            'configRequiredField' => ['api_key']
        ];
    }
}
    
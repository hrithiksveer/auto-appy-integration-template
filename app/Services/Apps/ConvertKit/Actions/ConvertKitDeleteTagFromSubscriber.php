<?php

namespace App\Services\Apps\ConvertKit\Actions;

use App\Shared\Apps\Actions\BaseAction;

class ConvertKitDeleteTagFromSubscriber extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.convertkit.com/v3/subscribers/' . $inputData['subscriber_id'] . '\/tags/' . $inputData['tag_id'] ;

        $queryParams = [
            'api_secret' => $configData['api_secret']
        ];

        $headers =[
            'Content-Type' => 'application/json',
        ];

        return [
            'url' => $url,
            'method' => 'DELETE',
            'headers' => $headers,
            'queryParams' => $queryParams,
        ];
    }

    protected function setFields(): array
    {
        return [
            'inputRequiredField' => ['subscriber_id', 'tag_id'],
            'configRequiredField' => ['api_secret'],
        ];
    }
}

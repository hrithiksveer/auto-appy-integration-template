<?php

namespace App\Services\Apps\AiSensy\Actions;

use App\Shared\Apps\Actions\BaseAction;

class SendTemplateMessage extends BaseAction
{

    // Override setFields validate the require fileds before using sending the api call
    protected function setFields(): array
    {
        return [
            'inputRequiredField' => ['campaignName', 'destination', 'userName'],
            'inputNonRequiredField' => [
                                        'source' => null, 
                                        'media' => null,
                                        'templateParams' => [],
                                        'tags' => [],
                                        'attributes' => []
                                    ],
            'configRequiredField' => ['apiKey']
        ];
    }

    // Override this method to specify the JSON keys for this action
    protected function getJsonKeys(): array
    {
        return ['tags', 'media', 'attributes', 'templateParams'];
    }

    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://backend.aisensy.com/campaign/t1/api/v2';
        
        $headers = [
            'Content-Type' => 'application/json'
                  ];

        $body = [
            'apiKey'=> $configData['apiKey'],
            'campaignName' => $inputData['campaignName'],
            'destination' => $inputData['destination'],
            'userName' => $inputData['userName'],
            'source' => $inputData['source'],
            'media' => $inputData['media'],
            'templateParams' => $inputData['templateParams'],
            'tags' => $inputData['tags'],
            'attributes' => $inputData['attributes'],
        ];
        
        return [
            'url' => $url,
            'method' => 'POST',
            'bodyType' => 'json',
            'body' => $body,
            'headers' => $headers
            ];
    }


}

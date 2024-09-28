<?php

namespace App\Services\Apps\Mailjet\Actions;

use App\Shared\Apps\Actions\BaseAction;

class MailjetRetrieveEmailFromSenderEmail extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.mailjet.com/v3/REST/message';

        $headers = [
            'Authorization' => 'Basic ' . base64_encode($configData['api_key'] . ':' . $configData['api_secret'])
        ];

        $queryParams = [
            'contactAlt' => 'kglivee19@gmail.com'
        ];

        return [
            'url' => $url,
            'method' => 'GET',
            'headers' => $headers,
            'queryParams' => $queryParams,
        ];
    }

    protected function setFields(): array
    {
        return [
            // 'inputRequiredField' => ['email'],
            'configRequiredField' => ['api_key','api_secret']
        ];
    }
}

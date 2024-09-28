<?php

namespace App\Services\Apps\Mailjet\Actions;

use App\Shared\Apps\Actions\BaseAction;

class MailjetGetAllNewsletters extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.mailjet.com/v3/REST/newsletter';

        $headers = [
            'Authorization' => 'Basic ' . base64_encode( $configData['api_key'] . ':' . $configData['api_secret'])
        ];

        return [
            'url' => $url,
            'method' => 'GET',
            'headers' => $headers,
        ];
    }

    protected function setFields(): array
    {
        return [
            'configRequiredField' => ['api_key','api_secret']
        ];
    }
}

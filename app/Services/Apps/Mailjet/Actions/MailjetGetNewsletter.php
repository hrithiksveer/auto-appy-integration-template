<?php

namespace App\Services\Apps\Mailjet\Actions;

use App\Shared\Apps\Actions\BaseAction;

class MailjetGetNewsletter extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.mailjet.com/v3/REST/newsletter/' . $inputData['newsletter_id'];

        $headers = [
            'Authorization' => 'Basic ' . base64_encode( $configData['api_key'] . ':' . $configData['api_secret'] )
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
            'inputRequiredField' => ['newsletter_id'],
            'configRequiredField' => ['api_key','api_secret']
        ];
    }
}

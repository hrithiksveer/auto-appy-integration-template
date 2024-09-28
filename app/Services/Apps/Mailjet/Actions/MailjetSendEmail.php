<?php

namespace App\Services\Apps\Mailjet\Actions;

use App\Shared\Apps\Actions\BaseAction;

class MailjetSendEmail extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.mailjet.com/v3.1/send';
        
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . base64_encode($configData['api_key'] . ':' . $configData['api_secret'])
        ];

        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => $inputData['sender'],
                        'Name' => $inputData['sender_name'] ?? 'Me'
                    ],
                    'To' => [
                        [
                            'Email' => $inputData['receiver'],
                            'Name' => $inputData['receiver_name'] ?? 'You'
                        ]
                    ],
                    'Subject' => $inputData['subject'],
                    'TextPart' => $inputData['text'],
                    'HTMLPart' => $inputData['HTML']
                ]
            ]
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
            'inputRequiredField' => ['sender', 'receiver', 'subject', 'text', 'HTML'],
            'configRequiredField' => ['api_key','api_secret']
        ];
    }
}

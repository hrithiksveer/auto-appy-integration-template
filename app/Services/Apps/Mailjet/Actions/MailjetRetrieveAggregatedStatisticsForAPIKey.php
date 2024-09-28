<?php

namespace App\Services\Apps\Mailjet\Actions;

use App\Shared\Apps\Actions\BaseAction;

class MailjetRetrieveAggregatedStatisticsForAPIKey extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.mailjet.com/v3/REST/statcounters';

        $headers = [
            'Authorization' => 'Basic ' . base64_encode($configData['api_key'] . ':' . $configData['api_secret'])
        ];

        $queryParams = [
            'CounterSource' => 'APIKey',
            'CounterTiming' => 'Message',
            'CounterResolution' => 'Lifetime'
        ];

        return [
            'url' => $url,
            'method' => 'GET',
            'headers' => $headers,
            'queryParams' => $queryParams
        ];
    }

    protected function setFields(): array
    {
        return [
            'configRequiredField' => ['api_key','api_secret']
        ];
    }
}

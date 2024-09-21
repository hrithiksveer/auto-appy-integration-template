<?php

namespace App\Services\Apps\AbstractAPI\Actions;

use App\Shared\Apps\Actions\BaseAction;

class AbstractAPIHolidayApi extends BaseAction
{
    // Override to set required fields
    protected function setFields(): array
    {
        return [
            'inputRequiredField' => ['country'],
            'inputNonRequiredField' => [
                'year' => date('Y'), // Optional: default to current year
                'month' => null,
                'day' => null
            ],
            'configRequiredField' => ['api_key']
        ];
    }

    // Override to prepare the API request
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://holidays.abstractapi.com/v1/';

        $headers = [
            'Content-Type' => 'application/json'
        ];

        // Build query parameters for the API request
        $queryParams = [
            'api_key' => $configData['api_key'],
            'country' => $inputData['country'],
            'year' => $inputData['year'] ?? date('Y'),
            'month' => $inputData['month'],
            'day' => $inputData['day']
        ];

        return [
            'url' => $url . '?' . http_build_query($queryParams),
            'method' => 'GET',
            'headers' => $headers
        ];
    }
}

<?php

namespace App\Services\Apps\APILayer\Actions;

use App\Shared\Apps\Actions\BaseAction;

class APILayerFinanceNewsAPI extends BaseAction
{
    protected function setFields(): array
    {
        return [
            'inputNonRequiredField' => [
                'date', 'fallback', 'keywords', 'limit', 'offset', 'sort', 'sources', 'tags', 'tickers'
            ],
            'configRequiredField' => ['apikey'],
        ];
    }

    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.apilayer.com/financelayer/news';
        $headers = [
            'apikey' => $configData['apikey'],
        ];

        $queryParams = array_filter([
            'date' => $inputData['date'] ?? null,
            'fallback' => $inputData['fallback'] ?? null,
            'keywords' => $inputData['keywords'] ?? null,
            'limit' => $inputData['limit'] ?? null,
            'offset' => $inputData['offset'] ?? null,
            'sort' => $inputData['sort'] ?? null,
            'sources' => $inputData['sources'] ?? null,
            'tags' => $inputData['tags'] ?? null,
            'tickers' => $inputData['tickers'] ?? null,
        ]);

        return [
            'url' => $url,
            'method' => 'GET',
            'headers' => $headers,
            'queryParams' => $queryParams,
        ];
    }

}

<?php

namespace App\Shared\Apps\Actions;

trait JsonDecoder
{
    /**
     * Decode JSON strings within inputData if they are in string format.
     *
     * @param array $inputData
     * @param array $jsonKeys
     * @return array
     */
    protected function decodeJsonStrings(array $inputData, array $jsonKeys): array
    {
        foreach ($jsonKeys as $key) {
            if (isset($inputData[$key]) && is_string($inputData[$key])) {
                $decodedValue = json_decode($inputData[$key], true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $inputData[$key] = $decodedValue;
                }
            }
        }
        return $inputData;
    }

     /**
     * Cast specified keys in inputData to integer.
     *
     * @param array $inputData
     * @param array $intKeys
     * @return array
     */
    protected function castToInt(array $inputData, array $intKeys): array
    {
        foreach ($intKeys as $key) {
            if (isset($inputData[$key]) && is_numeric($inputData[$key])) {
                $inputData[$key] = (int) $inputData[$key];
            }
        }
        return $inputData;
    }
}

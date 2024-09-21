<?php

namespace App\Http\Controllers\Apps;

use App\Services\Apps\AbstractAPI\Actions\AbstractAPIEmailValidation;
use App\Services\Apps\AbstractAPI\Actions\AbstractAPIHolidayApi;
use App\Shared\Apps\Controller\BaseController;
use Illuminate\Http\Request;

class AbstractAPIController extends BaseController
{
    // Config data method for fetching the API key
    protected function getConfigData(Request $request): array
    {
        return [
            'apiKey' => $request->header('apiKey')
        ];
    }

    // Email validation action method
    public function validateEmail(Request $request)
    {
        return $this->executeAction($request, new AbstractAPIEmailValidation());
    }

    // Holiday API action method
    public function getHolidays(Request $request)
    {
        return $this->executeAction($request, new AbstractAPIHolidayApi());
    }
}

<?php

namespace App\Http\Controllers\Apps;

use App\Services\Apps\APILayer\Actions\APILayerEmailValidation;
use App\Services\Apps\APILayer\Actions\APILayerEmailDeliveryValidation;
use App\Services\Apps\APILayer\Actions\APILayerNumberValidation;
use App\Services\Apps\APILayer\Actions\APILayerCountryAndCode;
use App\Services\Apps\APILayer\Actions\APILayerGenderAPI;
use App\Services\Apps\APILayer\Actions\APILayerDisposableEmailAPI;
use App\Services\Apps\APILayer\Actions\APILayerFinanceNewsAPI;
use App\Shared\Apps\Controller\BaseController;
use Illuminate\Http\Request;

class APILayerController extends BaseController{

    protected function getConfigData( Request $request ) : array
    {
        return [
            'apikey' => $request->header('apikey')
        ];
    }

    // email validation
    public function emailValidation( Request $request )
    {
        return $this->executeAction( $request, new APILayerEmailValidation() );
    }

    // email delivery validation
    public function emailDeliveryValidation( Request $request )
    {
        return $this->executeAction( $request, new APILayerEmailDeliveryValidation() );
    }

    // number validation
    public function numberValidation( Request $request )
    {
        return $this->executeAction( $request, new APILayerNumberValidation() );
    }

    // get country and code
    public function countryAndCode( Request $request )
    {
        return $this->executeAction( $request, new APILayerCountryAndCode() );
    }

    // get gender by name
    public function getGenderByName(Request $request)
    {
        return $this->executeAction($request, new APILayerGenderAPI());
    }

    // disposable email validation api
    public function checkDisposableEmail(Request $request)
    {
        return $this->executeAction($request, new APILayerDisposableEmailAPI());
    }

    // finance news api
    public function getFinanceNews(Request $request)
    {
        return $this->executeAction($request, new APILayerFinanceNewsAPI());
    }

}
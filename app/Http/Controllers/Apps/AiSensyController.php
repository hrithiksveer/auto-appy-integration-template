<?php

namespace App\Http\Controllers\Apps;

use App\Services\Apps\AiSensy\Actions\SendTemplateMessage;
use App\Shared\Apps\Controller\BaseController;
use Illuminate\Http\Request;

class AiSensyController extends BaseController
{
    protected function getConfigData(Request $request): array
    {
        return [
            'apiKey' => $request->header('apiKey')
        ];
    }

    public function sendTemplateMessage(Request $request)
    {
        return $this->executeAction($request , new SendTemplateMessage());
    }
}

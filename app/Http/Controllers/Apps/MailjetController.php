<?php

namespace App\Http\Controllers\Apps;

use App\Shared\Apps\Controller\BaseController;
use App\Services\Apps\Mailjet\Actions\MailjetSendEmail;
use App\Services\Apps\Mailjet\Actions\MailjetRetrieveSendedEmail;
use App\Services\Apps\Mailjet\Actions\MailjetRetrieveEmailFromSenderEmail;
use App\Services\Apps\Mailjet\Actions\MailjetViewMessageEvent;
use App\Services\Apps\Mailjet\Actions\MailjetRetrieveAggregatedStatisticsForAPIKey;


use App\Services\Apps\Mailjet\Actions\MailjetCreateNewsletter;
use App\Services\Apps\Mailjet\Actions\MailjetGetNewsletter;
use App\Services\Apps\Mailjet\Actions\MailjetGetAllNewsletters;
use App\Services\Apps\Mailjet\Actions\MailjetUpdateNewsletter;
use App\Services\Apps\Mailjet\Actions\MailjetDeleteNewsletter;

use Illuminate\Http\Request;

class MailjetController extends BaseController
{
    protected function getConfigData(Request $request): array
    {
        return [
            'api_key' => $request->header('api_key'),
            'api_secret' => $request->header('api_secret'),
        ];
    }

    public function sendEmail(Request $request)
    {
        return $this->executeAction($request, new MailjetSendEmail());
    }

    public function retrieveSendedEmail(Request $request)
    {
        return $this->executeAction($request, new MailjetRetrieveSendedEmail());
    }

    public function retrieveEmailFromSenderMail(Request $request)
    {
        return $this->executeAction($request, new MailjetRetrieveEmailFromSenderEmail());
    }

    public function viewMessageEvent(Request $request)
    {
        return $this->executeAction($request, new MailjetViewMessageEvent());
    }

    public function retrieveAggregatedStatistics(Request $request)
    {
        return $this->executeAction($request, new MailjetRetrieveAggregatedStatisticsForAPIKey());
    }


    public function createNewsletter(Request $request)
    {
        return $this->executeAction($request, new MailjetCreateNewsletter());
    }

    public function getNewsletter(Request $request)
    {
        return $this->executeAction($request, new MailjetGetNewsletter());
    }

    public function getAllNewsletters(Request $request)
    {
        return $this->executeAction($request, new MailjetGetAllNewsletters());
    }

    public function updateNewsletter(Request $request)
    {
        return $this->executeAction($request, new MailjetUpdateNewsletter());
    }

    public function deleteNewsletter(Request $request)
    {
        return [
            "message" => "Action Not Allowed "
        ];
        // return $this->executeAction($request, new MailjetDeleteNewsletter());
    }
}

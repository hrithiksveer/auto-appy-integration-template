<?php

namespace App\Http\Controllers\Apps;

use App\Shared\Apps\Controller\BaseController;

use App\Services\Apps\ConvertKit\Actions\ConvertKitAccountInfo;

use App\Services\Apps\ConvertKit\Actions\ConvertKitListForm;
use App\Services\Apps\ConvertKit\Actions\ConvertKitAddSubscriberToForm;
use App\Services\Apps\ConvertKit\Actions\ConvertKitAddSubscriberToFormAndGiveTag;

use App\Services\Apps\ConvertKit\Actions\ConvertKitListSequences;

use App\Services\Apps\ConvertKit\Actions\ConvertKitListTags;
use App\Services\Apps\ConvertKit\Actions\ConvertKitAddSingleTag;
use App\Services\Apps\ConvertKit\Actions\ConvertKitTagSubscriber;
use App\Services\Apps\ConvertKit\Actions\ConvertKitAddMultipleTags;
use App\Services\Apps\ConvertKit\Actions\ConvertKitDeleteTagFromSubscriber;
use App\Services\Apps\ConvertKit\Actions\ConvertKitRemoveTagFromSubscriber;
use App\Services\Apps\ConvertKit\Actions\ConvertKitListSubscriptionToTag;

use App\Services\Apps\ConvertKit\Actions\ConvertKitListSubscribers;
use App\Services\Apps\ConvertKit\Actions\ConvertKitViewSingleSubscriber;
use App\Services\Apps\ConvertKit\Actions\ConvertKitUpdateSubscriber;
use App\Services\Apps\ConvertKit\Actions\ConvertKitUnsubscribeSubscriber;
use App\Services\Apps\ConvertKit\Actions\ConvertKitListTagsForSubscriber;

use App\Services\Apps\ConvertKit\Actions\ConvertKitListBroadcasts;
use App\Services\Apps\ConvertKit\Actions\ConvertKitRetrieveSpecificBroadcast;
use App\Services\Apps\ConvertKit\Actions\ConvertKitGetStats;
use App\Services\Apps\ConvertKit\Actions\ConvertKitUpdateBroadcast;
use App\Services\Apps\ConvertKit\Actions\ConvertKitCreateBroadcast;
use App\Services\Apps\ConvertKit\Actions\ConvertKitDestroyBroadcast;

use App\Services\Apps\ConvertKit\Actions\ConvertKitCreateWebhook;
use App\Services\Apps\ConvertKit\Actions\ConvertKitDestroyWebhook;

use App\Services\Apps\ConvertKit\Actions\ConvertKitListFields;
use App\Services\Apps\ConvertKit\Actions\ConvertKitCreateMultipleFields;
use App\Services\Apps\ConvertKit\Actions\ConvertKitCreateSingleField;
use App\Services\Apps\ConvertKit\Actions\ConvertKitUpdateField;
use App\Services\Apps\ConvertKit\Actions\ConvertKitDestroyField;

use App\Services\Apps\ConvertKit\Actions\ConvertKitListPurchase;
use App\Services\Apps\ConvertKit\Actions\ConvertKitRetrieveSpecificPurchase;
use App\Services\Apps\ConvertKit\Actions\ConvertKitCreatePurchase;

use Illuminate\Http\Request;

class ConvertKitController extends BaseController
{
    protected function getConfigData(Request $request): array
    {
        return [
            'api_key' => $request->header('api_key'),
            'api_secret' => $request->header('api_secret')
        ];
    }

    public function accountInfo(Request $request)
    {
        return $this->executeAction($request, new ConvertKitAccountInfo());
    }

    public function listForms(Request $request)
    {
        return $this->executeAction($request, new ConvertKitListForm());
    }

    public function addSubscriberToForm(Request $request)
    {
        return $this->executeAction($request, new ConvertKitAddSubscriberToForm());
    }

    public function addSubscriberToFormAndGiveTag(Request $request)
    {
        return $this->executeAction($request, new ConvertKitAddSubscriberToFormAndGiveTag());
    }

    public function listSequences(Request $request)
    {
        return $this->executeAction($request, new ConvertKitListSequences());
    }

    public function listTags(Request $request)
    {
        return $this->executeAction($request, new ConvertKitListTags());
    }

    public function addSingleTag(Request $request)
    {
        return $this->executeAction($request, new ConvertKitAddSingleTag());
    }

    public function tagSubscriber(Request $request)
    {
        return $this->executeAction($request, new ConvertKitTagSubscriber());
    }

    public function addMultipleTags(Request $request)
    {
        return $this->executeAction($request, new ConvertKitAddMultipleTags());
    }

    public function deleteTagFromSubscriber(Request $request)
    {
        return $this->executeAction($request, new ConvertKitDeleteTagFromSubscriber());
    }

    public function removeTagFromSubscriber(Request $request)
    {
        return $this->executeAction($request, new ConvertKitRemoveTagFromSubscriber());
    }

    public function listSubscriptionToTag(Request $request)
    {
        return $this->executeAction($request, new ConvertKitListSubscriptionToTag());
    }

    public function listSubscribers(Request $request)
    {
        return $this->executeAction($request, new ConvertKitListSubscribers());
    }

    public function viewSingleSubscriber(Request $request)
    {
        return $this->executeAction($request, new ConvertKitViewSingleSubscriber());
    }

    public function updateSubscriber(Request $request)
    {
        return $this->executeAction($request, new ConvertKitUpdateSubscriber());
    }

    public function unsubscribeSubscriber(Request $request)
    {
        return $this->executeAction($request, new ConvertKitUnsubscribeSubscriber());
    }

    public function listTagsForSubscriber(Request $request)
    {
        return $this->executeAction($request, new ConvertKitListTagsForSubscriber());
    }

    public function listBroadcasts(Request $request)
    {
        return $this->executeAction($request, new ConvertKitListBroadcasts());
    }

    public function retrieveSpecificBroadcast(Request $request)
    {
        return $this->executeAction($request, new ConvertKitRetrieveSpecificBroadcast());
    }

    public function getStats(Request $request)
    {
        return $this->executeAction($request, new ConvertKitGetStats());
    }

    public function updateBroadcast(Request $request)
    {
        return $this->executeAction($request, new ConvertKitUpdateBroadcast());
    }

    public function createBroadcast(Request $request)
    {
        return $this->executeAction($request, new ConvertKitCreateBroadcast());
    }

    public function destroyBroadcast(Request $request)
    {
        return $this->executeAction($request, new ConvertKitDestroyBroadcast());
    }

    public function createWebhook(Request $request)
    {
        return $this->executeAction($request, new ConvertKitCreateWebhook());
    }

    public function destroyWebhook(Request $request)
    {
        return $this->executeAction($request, new ConvertKitDestroyWebhook());
    }

    public function listFields(Request $request)
    {
        return $this->executeAction($request, new ConvertKitListFields());
    }

    public function createMultipleFields(Request $request)
    {
        return $this->executeAction($request, new ConvertKitCreateMultipleFields());
    }

    public function createSingleField(Request $request)
    {
        return $this->executeAction($request, new ConvertKitCreateSingleField());
    }

    public function updateField(Request $request)
    {
        return $this->executeAction($request, new ConvertKitUpdateField());
    }

    public function destroyField(Request $request)
    {
        return $this->executeAction($request, new ConvertKitDestroyField());
    }

    public function listPurchases(Request $request)
    {
        return $this->executeAction($request, new ConvertKitListPurchase());
    }


    public function retrieveSpecificPurchase(Request $request)
    {
        return $this->executeAction($request, new ConvertKitRetrieveSpecificPurchase());
    }

    public function createPurchase(Request $request)
    {
        return $this->executeAction($request, new ConvertKitCreatePurchase());
    }

}
    
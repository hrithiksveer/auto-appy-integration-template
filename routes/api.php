<?php

use App\Http\Controllers\Apps\AbstractAPIController;
use App\Http\Controllers\Apps\AiSensyController;
use App\Http\Controllers\Apps\APILayerController;
use App\Http\Controllers\Apps\ConvertKitController;
use App\Http\Controllers\Apps\MailjetController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return "This is Test Api from api.php";
});

// Routes for AiSensy
Route::prefix('abstract-api')->controller(AbstractAPIController::class)->group(function () {
    Route::get('/email-validation', 'validateEmail');
    Route::get('/holidays', 'getHolidays');
});

// Routes for AiSensy
Route::prefix('ai-sensy')->controller(AiSensyController::class)->group(function () {
    Route::post('send-template-message', 'sendTemplateMessage');
});

Route::prefix('api-layer')->controller(APILayerController::class)->group(function () {
    Route::get('/email-validation', 'emailValidation');
    Route::get('/email-delivery-validation', 'emailDeliveryValidation');
    Route::get('/number-validation', 'numberValidation');
    Route::get('/country-and-code', 'countryAndCode');
    Route::post('/get-gender', 'getGenderByName');
    Route::post('/disposable-email', 'checkDisposableEmail');
    Route::get('/finance-news', 'getFinanceNews');
});


Route::prefix('convertkit')->controller(ConvertKitController::class)->group(function () {

    Route::get('/account-info', 'accountInfo');

    Route::get('/list-forms', 'listForms');
    Route::post('/add-subscriber-to-form', 'addSubscriberToForm');
    Route::post('/add-subscriber-to-form-tag', 'addSubscriberToFormAndGiveTag');

    Route::get('/list-sequences', 'listSequences');

    Route::get('/list-tags', 'listTags');
    Route::post('/add-single-tag', 'addSingleTag');
    Route::post('/tag-subscriber', 'tagSubscriber');
    Route::post('/add-multiple-tags', 'addMultipleTags');
    Route::delete('/delete-tag-from-subscriber', 'deleteTagFromSubscriber');
    Route::post('/remove-tag-from-subscriber', 'removeTagFromSubscriber');
    Route::get('/list-subscription-to-tag', 'listSubscriptionToTag');

    Route::get('/list-subscribers', 'listSubscribers');
    Route::get('/view-subscriber', 'viewSingleSubscriber');
    Route::put('/update-subscriber', 'updateSubscriber');
    Route::put('/unsubscribe-subscriber', 'unsubscribeSubscriber');
    Route::get('/list-tags-for-subscriber', 'listTagsForSubscriber');

    Route::get('/list-broadcasts', 'listBroadcasts');
    Route::get('/retrieve-specific-broadcast', 'retrieveSpecificBroadcast');
    Route::get('/get-stats', 'getStats');
    Route::put('/update-broadcast', 'updateBroadcast');
    Route::post('/create-broadcast', 'createBroadcast');
    Route::delete('/destroy-broadcast', 'destroyBroadcast');

    Route::post('/create-webhook', 'createWebhook');
    Route::delete('/destroy-webhook', 'destroyWebhook');

    Route::get('/list-fields', 'listFields');
    Route::post('/create-multiple-fields', 'createMultipleFields');
    Route::post('/create-single-field', 'createSingleField');
    Route::put('/update-field', 'updateField');
    Route::delete('/destroy-field', 'destroyField');
    
    Route::get('/list-purchases', 'listPurchases');
    Route::get('/retrieve-purchase', 'retrieveSpecificPurchase');
    Route::post('/create-purchase', 'createPurchase');

});

Route::prefix('mailjet')->controller(MailjetController::class)->group(function () {
    Route::post('/send-email', 'sendEmail');
    Route::get('/retrieve-sended-email', 'retrieveSendedEmail');
    Route::get('/retrieve-email-from-sender-mail', 'retrieveEmailFromSenderMail');
    Route::get('/view-message-event', 'viewMessageEvent');
    Route::get('/retrieve-aggregated-statistics', 'retrieveAggregatedStatistics');

    Route::post('/create-newsletter', 'createNewsletter');
    Route::get('/get-newsletter', 'getNewsletter');
    Route::get('/get-all-newsletters', 'getAllNewsletters');
    Route::put('/update-newsletter', 'updateNewsletter');
    Route::delete('/delete-newsletter', 'deleteNewsletter');
});

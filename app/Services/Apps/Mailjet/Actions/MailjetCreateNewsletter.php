<?php

namespace App\Services\Apps\Mailjet\Actions;

use App\Shared\Apps\Actions\BaseAction;

class MailjetCreateNewsletter extends BaseAction
{
    protected function prepareRequest(array $inputData, array $configData): array
    {
        $url = 'https://api.mailjet.com/v3/REST/newsletter';
        
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . base64_encode( $configData['api_key'] . ':' . $configData['api_secret'])
        ];

         $body = [
            'AXFraction' => $inputData['AXFraction'] ?? 0,
            'AXFractionName' => $inputData['AXFractionName'] ?? '',
            'AXTesting' => $inputData['AXTesting'] ?? [],
            'Callback' => $inputData['Callback'] ?? 'http://default-callback-url.com',
            'EditMode' => $inputData['EditMode'] ?? 'tool',
            'EditType' => $inputData['EditType'] ?? 'full',
            'Footer' => $inputData['Footer'] ?? 'default',
            'FooterAddress' => $inputData['FooterAddress'] ?? '',
            'FooterWYSIWYGType' => $inputData['FooterWYSIWYGType'] ?? 0,
            'HeaderFilename' => $inputData['HeaderFilename'] ?? '',
            'HeaderLink' => $inputData['HeaderLink'] ?? '',
            'HeaderText' => $inputData['HeaderText'] ?? '',
            'HeaderUrl' => $inputData['HeaderUrl'] ?? 'http://default-url.com',
            'IsStarred' => $inputData['IsStarred'] ?? false,
            'IsTextPartIncluded' => $inputData['IsTextPartIncluded'] ?? false,
            'Permalink' => $inputData['Permalink'] ?? 'default',
            'PermalinkHost' => $inputData['PermalinkHost'] ?? '',
            'PermalinkWYSIWYGType' => $inputData['PermalinkWYSIWYGType'] ?? 0,
            'ReplyEmail' => $inputData['ReplyEmail'] ?? '',
            'SenderName' => $inputData['SenderName'] ?? '',
            'TemplateID' => $inputData['TemplateID'] ?? 0,
            'TestAddress' => $inputData['TestAddress'] ?? '',
            'Title' => $inputData['Title'] ?? '',
            'ContactsListID' => $inputData['ContactsListID'] ?? 0,
            'Locale' => $inputData['Locale'] ?? 'en_US',
            'SegmentationID' => $inputData['SegmentationID'] ?? 0,
            'SenderEmail' => $inputData['SenderEmail'] ?? '',
            'Subject' => $inputData['Subject'] ?? ''
        ];

        return [
            'url' => $url,
            'method' => 'POST',
            'headers' => $headers,
            'bodyType' => 'json',
            'body' => $body,
        ];
    }

    protected function setFields(): array
    {
        return [
            'inputRequiredField' => ['Callback','ReplyEmail','Locale','TestAddress','SenderEmail','Subject'],
            'inputNonRequiredField' => ['AXFraction','AXFractionName','AXTesting','EditMode','EditType','Footer','FooterAddress',
            'FooterWYSIWYGType','HeaderFilename','HeaderLink','HeaderText','HeaderUrl','IsStarred','IsTextPartIncluded',
            'Permalink','PermalinkHost','ReplyEmail','SenderName','TemplateID','ContactsListID','SegmentationID'],
            'configRequiredField' => ['api_key','api_secret']
        ];
    }
}

<?php

namespace Raomingchao\AliyunDirectMail;

use Dm\Request\V20151123 as DM;

require_once __DIR__ . "/../sdk/aliyun-php-sdk-core/Config.php";

/**
 * @reference API: https://help.aliyun.com/document_detail/29444.html
 * @reference DEMO: https://help.aliyun.com/document_detail/29460.html
 */
class AliyunDirectMail
{
    protected $region;
    protected $appKey;
    protected $appSecret;
    protected $accountName;
    protected $accountAlias;

    public function __construct()
    {

        dd(config('aliyundm'));
//        $this->region = $region;
//        $this->appKey = $appKey;
//        $this->appSecret = $appSecret;
//        $this->accountName = $accountName;
//        $this->accountAlias = $accountAlias;
    }

    public function sendSingle($to, $subject, $htmlBody, $addressType = 1, $replyToAddress = true)
    {
        $request = new DM\SingleSendMailRequest();

        $request->setAccountName($this->accountName);
        $request->setFromAlias($this->accountAlias);
        $request->setAddressType($addressType);
        $request->setReplyToAddress($replyToAddress);

        $request->setToAddress($to);
        $request->setSubject($subject);
        $request->setHtmlBody($htmlBody);
        // dd($message->getBody());

        $this->createClient()->getAcsResponse($request);

        return 1;
    }

    protected function createClient()
    {
        $iClientProfile = \DefaultProfile::getProfile($this->region, $this->appKey, $this->appSecret);

        return new \DefaultAcsClient($iClientProfile);
    }

    // 多个地址使用逗号分隔
    protected function getToAddress(\Swift_Mime_SimpleMessage $message)
    {
        return join(',', array_keys($message->getTo()));
    }
}
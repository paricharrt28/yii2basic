<?php

namespace app\components;

use yii\httpclient\Client;
use Yii;

class ClineBot {

    public $urlApi = 'https://notify-api.line.me/api/notify';
    public $token = "";

    public function send($message) {
        $line = new ClineBot;
        $line->token = Yii::$app->params['lineToken'];
        $stickerPackageId = rand(1, 2);
        $stickerId = ($stickerPackageId == 1 ? rand(100, 139) : rand(18, 47));

        $client = new Client();
        $response = $client->createRequest()
                        ->setUrl($line->urlApi)
                        ->setMethod('post')
                        ->setData([
                            'message' => $message,
                                #'stickerId' => $stickerId,
                                #'stickerPackageId' => $stickerPackageId,
                        ])
                        ->addHeaders(['Authorization' => 'Bearer ' . $line->token])
                        ->setOptions([
                            CURLOPT_CONNECTTIMEOUT => 30, //5 connection timeout
                            CURLOPT_TIMEOUT => 3600, //10 data receiving timeout
                            CURLOPT_SSL_VERIFYHOST => 0,
                            CURLOPT_SSL_VERIFYPEER => false
                        ])->send();
        if ($response->isOk) {
            $resp = $response->content;
        } else {
            $resp = $response->content;
        }
        return $resp;
    }

}

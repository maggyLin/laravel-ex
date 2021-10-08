<?php 

namespace App\MyLib;

class CurlHelp
{
    /**
     * @param string $url 請求的網址
     * @param bool $params 傳送的參數
     * @param string $method 傳送的類型 預設get
     * @param bool $header 傳送的標頭
     * @param int $https https請求處理
     * @param int $timeOutSec 超時設定
     */

    public static function curl(
        $url,
        $params = false,
        $method = 'GET',
        $header = false,
        $timeOutSec = 15,
        $apiType = ""
    ){
        $httpInfo = [];
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $params,
            CURLOPT_HTTPHEADER => $header,
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
<?php
/**
 * Author: wangfeng211731
 * Date: 2018/11/1
 * Time: 11:13
 */

function sign($params,$signType,$private_key){
    $stringToBeSigned = "";
    $i = 0;
    foreach ($params as $k => $v) {
        if (false === checkEmpty($v) && "@" != substr($v, 0, 1)) {
            if ($i == 0) {
                $stringToBeSigned .= "$k" . "=" . "$v";
            } else {
                $stringToBeSigned .= "&" . "$k" . "=" . "$v";
            }
            $i++;
        }
    }
    unset ($k, $v);

    $res = "-----BEGIN RSA PRIVATE KEY-----".PHP_EOL.wordwrap($private_key, 64, PHP_EOL, true).PHP_EOL."-----END RSA PRIVATE KEY-----";
    ($res) or die('您使用的私钥格式错误，请检查RSA私钥配置');

    if ("RSA2" == $signType) {
        openssl_sign($stringToBeSigned, $sign, $res, OPENSSL_ALGO_SHA256);
    } else {
        openssl_sign($stringToBeSigned, $sign, $res);
    }
    return base64_encode($sign);
}

function checkEmpty($value) {
    if (!isset($value))
        return true;
    if ($value === null)
        return true;
    if (trim($value) === "")
        return true;
    return false;
}

function computeSign(array &$data){
    if(!$data){
        return false;
    }
    ksort($data);
    $priv_key = <<<KEY
MIIEogIBAAKCAQEA3kJ8oXhQJykTuPvzvgEnUg/opAiCZGMkU4GIhRr9eqP7E33QMTGCX/tI94QkSL9Nhgt5KBNun4uhhrM4xcnLxtpUA2wTb1hpv2PALT6Q5BSILNjFBj6XpaiBxiQRnjo+f+oNUHomQR4gnhdx7LICv80wDebB2TTRvUYmjAVNo5v45ZFoHoRm4fBRY2YCreI+8weXbxtXGk2uccGMcF8Cv0ZR4iwRzjBRwScpGWyw9NBLzoRE5ekeHtkjlfwUFHpSUUcSsltSdWc+v5EYA8svGwqi0ZBo79n4TGjr6zigaS7D/1Of6vwyfcDufPs2io+yuE2SMWvzfWNxnpOVVvtYAQIDAQABAoIBAGm+/mcgxBntrEmN7mkPSXL8yLYKqmcy2Fy2u4qAzesky9d5O628HYinGQ9SmqTWB/9nxAwyOqbEG2ToLnHEUiTZSbGbISAP07hQsGWWZ/9sWWHk/NC8xQ/3PU9VZ+B9W7EmXZFVnI/M0r4E75orE63H5T4n9UDvpX7FOp/SAh99udIC9k0fwboMElQZXMieJcu9/nujlxuU2K1SGmueIu118Dk0UFHNX+mEuj3fxeXlYPuGKtVNKOd4qyOBanrjPV0Fyh/Wxa9wBtr2jwbixX/D7AXIAwqZa5zwpyhSDPrdaLi+sTgSI35NrQBU2Q+4/6bA/FW56GS4LBvXp/bbukUCgYEA+fp9fvXMmHgsTl1moI4E2MChGTltStfc1TirdIGE9Ih85LX2vqxO4HKF34TvAsWmg9jEtSW7wjtjxySBa26KdLX0Id6I9PGSB3E/XbAjvUQGES2Nt7NumZuA89HYEudZacVNcbcEBLIsFX6WjCkJwNTvJgHnIIQdj4hrlcKJVesCgYEA450RIhh4PIugOp76vMGYwlcNVl5zZZWVzNlVWLBHH2J7cwJIcRtIPnRZrj9oxWWgfglpCk7BG1GiN1tQwSDYStUGBNJ3yW91K+snZ5soYa+pypBdB6Jm3nZZbJF3Ca+gVbfQ+qlpkpIojbTwPiJJz5JlNBR5Aj4T0bcmi/gFMsMCgYB65aelL3ryysIdlNXLwYaoeau6Fv2gehfbzAyfLr4K6r9cQgmZHGV6+1LN3TEUj8+Zqoyq8m4ow8H+OfhWtPXlAz+PFzUGF23PsuGQUfSALF0/PMIbul95rXXsaRJt2MegtJuqeGvFU0NRHfct2U8uOoGIkg7rcYiG9G7QJeAXGQKBgDbEPzAeBShETFxujlRGnNP+EDZ86XVC5dVxYcjCOYrCroOAxB96+goVAtMbbME6b8CD0SNqyaoiHU8GiMq/dWukEBuu7KWqTN4xabzTJ4dBtjAIRmok2G2kumWWJrdM695UKVN22fEre9iE9d1tcKciSXmbh3ZTq38le3/oQI/zAoGAU2sNXzTQ6vc1QjM3g1H+r4HgmJbRkw44i0PkeboCUvAeE+NIxFL3rOSZauxSOJuDwwjPa//9X4uMQItuoMNFqmbD9jY1/kF27YfBS6Hx56bcPVieJzEot7l++uss/5CETAjzU+MAqQrauu3ZgKWMwUdhap2amtZ84ALQuXGBtYM=
KEY;
    return sign($data, 'RSA2', $priv_key);
}

function postCurl($data){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://openapi.alipay.com/gateway.do",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30000,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $data
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

$data = [
    'app_id'=>'2018051860109889',
    'method'=>'alipay.system.oauth.token',
    'charset'=>'UTF-8',
    'sign_type'=>'RSA2',
    'timestamp'=>date('Y-m-d H:i:s'),
    'version'=>'1.0',
    'grant_type'=>'authorization_code',
    'code'=>'3b968f112d8a49b19e057edaf470VX55'
];
$data['sign'] = computeSign($data);

echo postCurl($data);

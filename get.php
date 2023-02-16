<?php

const ZAPPER_KEY = '96e0cc51-a62e-42ca-acee-910ea7d2a241';

function request($account) {
    $get = array(
        'addresses' => [ $account ],
        'api_key'   => ZAPPER_KEY
    );
    $url = 'https://api.zapper.xyz/v2/balances?'.http_build_query($get);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $html = curl_exec($ch);
    curl_close($ch);
    return $html;
}

$res = request($_REQUEST['account']);
echo $res;
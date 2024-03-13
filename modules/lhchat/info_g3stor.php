<?php

$tpl = erLhcoreClassTemplate::getInstance('lhchat/info_g3stor.tpl.php');
$chat = erLhcoreClassModelChat::fetch($Params['user_parameters']['chat_phone']);
$token = 'ZzNzdG9yOkBXZWJuZSAyMDIw'; 

$quoted = quoted_printable_encode($Params['user_parameters']['chat_phone']);

function makeCurlRequest($url, $token)
{
    $ch = curl_init();

    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 5,
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_HTTPHEADER => [
            'Authorization: Basic ' . $token
        ]
    ]);

    $res = curl_exec($ch);

    if ($res === false) {
        die("Erro na requisição cURL: " . curl_error($ch));
    }

    curl_close($ch);

    return $res;
}

$res = makeCurlRequest('http://192.168.0.68:8086/ConsultaCLiente?' . http_build_query([
    'pEmpresa' => '2760150',
    'pUsuario' => 'TONINHO',
    'pSenha' => '001',
    'pCodigo' => $quoted ,
]), $token);

$data = json_decode($res, true);


foreach ($data["RESULT"] as $result) {
    $customerInfo = reset($result["listaCDCLI"]);
}

$tpl->setArray([
    'infos' => $customerInfo, 
]);

echo $tpl->fetch();
exit;

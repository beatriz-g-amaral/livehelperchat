<?php

$tpl = erLhcoreClassTemplate::getInstance('lhchat/infosticketg3stor.tpl.php');
$chat = erLhcoreClassModelChat::fetch($Params['user_parameters']['chat_id']);

$token = 'dGVzdHNlcnZlcjp0ZXN0c2VydmVy';

$ch = curl_init();
$url = 'https://demo4705385.mockable.io/ticket' . urlencode($chat->id); // mudar para a api g3stor
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
        'Authorization: Bearer ' . $token
    )
);
@curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Some hostings produces warning...
$res = curl_exec($ch);

if ($res === false) {
    echo "Erro na requisição cURL: " . curl_error($ch);
    curl_close($ch);
    exit;
}

$res = json_decode($res, true);

if ($res === null) {
    echo "Erro ao decodificar a resposta JSON";
    curl_close($ch);
    exit;
}

$data = $res;

if (empty($data)) {
    $tpl = erLhcoreClassTemplate::getInstance('lhchat/ticketg3stor.tpl.php');
    echo $tpl->fetch();
    curl_close($ch);
    exit;
}


$urlObs = 'https://demo4705385.mockable.io/comments' . urlencode($chat->id); //trocar para a api do g3stor
curl_setopt($ch, CURLOPT_URL, $urlObs);
$resObs = curl_exec($ch);



if ($resObs === false) {
    echo "Erro na requisição cURL: " . curl_error($ch);
    curl_close($ch);
    exit;
}

$resObs = json_decode($resObs, true);

$dataObs = $resObs;

$tpl->setArray([
    'infos' => $data,
    'obs' => $dataObs
]);

echo $tpl->fetch();

curl_close($ch);
exit;

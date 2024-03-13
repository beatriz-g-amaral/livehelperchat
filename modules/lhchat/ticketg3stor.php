<?php
$tpl = erLhcoreClassTemplate::getInstance('lhchat/infosticketg3stor.tpl.php');
$chatId = $Params['user_parameters']['chat_id'];

$token = 'ZzNzdG9yOkBXZWJuZSAyMDIw';

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

$res = makeCurlRequest('http://192.168.0.68:8086/ConsultaMVSup?' . http_build_query([
    'pEmpresa' => '2760150',
    'pUsuario' => 'TONINHO',
    'pSenha' => '001',
    'pChatID' => $chatId
]), $token);

$data = json_decode($res, true);

if ($data === null || empty($data["listaMVSup"])) {
    $res = makeCurlRequest('http://192.168.0.68:8086/ConsultaGrupoTabelas?' . http_build_query([
        'pEmpresa' => '2760150',
        'pUsuario' => 'TONINHO',
        'pSenha' => '001',
        'pPrimeiroSQL' => "SELECT CLI_NOM AS NOME, CLI_COD AS CODIGO, 'CDCLI' AS TABELA FROM CDCLI",
        'pSegundoSQL' => "SELECT ARE_NOM AS NOME, ARE_COD AS CODIGO, 'CDARE' AS TABELA FROM CDARE",
        'pTerceiroSQL' => "SELECT CAT_NOM AS NOME, CAT_COD AS CODIGO, 'CDCAT' AS TABELA FROM CDCAT",
        'pQuartoSQL' => "SELECT USE_NOM AS NOME, USE_COD AS CODIGO, 'CDUSER' AS TABELA FROM CDUSER"
    ]), $token);

    $data = json_decode($res, true);
    foreach ($data["RESULT"] as $result) {
        if (empty($result["listaMvGrupoTab"])) {
            echo "A lista de grupos está vazia.";
            exit;
        }

        $infosCustomer = [];
        $infosArea = [];
        $infosCat = [];
        $infosUser = [];

        foreach ($result["listaMvGrupoTab"] as $item) {
            switch ($item["TABELA"]) {
                case 'CDCLI':
                    $infosCustomer[] = [
                        'id' => $item["CODIGO"],
                        'value' => $item["NOME"]
                    ];
                    break;
                case 'CDARE':
                    $infosArea[] = [
                        'id' => $item["CODIGO"],
                        'value' => $item["NOME"]
                    ];
                    break;
                case 'CDCAT':
                    $infosCat[] = [
                        'id' => $item["CODIGO"],
                        'value' => $item["NOME"]
                    ];
                    break;
                case 'CDUSER':
                    $infosUser[] = [
                        'id' => $item["CODIGO"],
                        'value' => $item["NOME"]
                    ];
                    break;
            }
        }
    }


    $tpl = erLhcoreClassTemplate::getInstance('lhchat/ticketg3stor.tpl.php');



    $tpl->set('chat', $chatId);
    $tpl->set('customer', json_encode($infosCustomer));
    $tpl->set('area', json_encode($infosArea));
    $tpl->set('category', json_encode($infosCat));
    $tpl->set('user', json_encode($infosUser));
    

    echo $tpl->fetch();
    exit;
}

$ticketInfo = null;

foreach ($data["listaMVSup"] as $ticket) {
    if (isset($ticket["SUP_SIT"]) && $ticket["SUP_SIT"] == 40) {
        echo $tpl->fetch();
        exit;
    }

    $ticketInfo = $ticket;
    break;
}

if ($ticketInfo === null) {
    echo $tpl->fetch();
    exit;
}

$sup2_data = [];

foreach ($ticketInfo as $key => $value) {
    if (strpos($key, 'SUP2_') === 0) {
        $sup2_data[$key] = $value;
    }
}

$tpl->setArray([
    'infos' => $ticketInfo,
    'obs' => $sup2_data
]);

echo $tpl->fetch();
exit;
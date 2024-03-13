<?php
$token = 'ZzNzdG9yOkBXZWJuZSAyMDIw';
$tpl = erLhcoreClassTemplate::getInstance('lhchat/infosticketg3stor.tpl.php');

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

$res = makeCurlRequest('http://192.168.0.68:8086/ConsultaTabela?' . http_build_query([
    'pEmpresa' => '2760150',
    'pUsuario' => 'TONINHO',
    'pSenha' => '001',
    'pSQL' => 'SELECT MAX(sup_cod) + 1 AS proximo_codigo FROM mvsup',
    'pTabela' => 'mvsup'
]), $token);

$data = json_decode($res, true);


$proximo_codigo = $data['listamvsup'][0]['PROXIMO_CODIGO'];


$url = 'http://192.168.0.68:8086/ConsultaMVSup?pEmpresa=2760150&pUsuario=TONINHO&pSenha=001';

$dataAtual = date('Y-m-d');

$assunto = $_POST['assunto'];
$cliente = $_POST['clienteCod'];
$area = $_POST['areaCod'];
$contato = $_POST['contatoCod'];
$categoria = $_POST['categoriaCod'];
$funcionario =  $_POST['funcionarioCod'];
$chatId = $_POST['chatID'];

$dados = array(
    'SUP_COD' => $proximo_codigo,
    'SUP_CLI' => $cliente,
    'SUP_CAT' => $categoria,
    'SUP_MOD' => $area,
    'SUP_CON' => $contato,
    'SUP_DAT' => $dataAtual,
    'SUP_HOR' => $dataAtual,
    'SUP_PRO' => null,
    'SUP_SOL' => null,
    'SUP_LIG' => 'C',
    'SUP_CCO' => 'C',
    'SUP_RES' => $funcionario,
    'SUP_CONP' => null,
    'SUP_DTC' => $dataAtual,
    'SUP_SIT' => 12,
    'CLI_FIL' => null,
    'SUP_PREVISAO' => null,
    'DAT_CAD' => $dataAtual,
    'DAT_ATU' => $dataAtual,
    'ATIVO' => 'A',
    'SUP_TEMPO' => null,
    'SUP_STA' => 'P',
    'SUP_GRT' => 1,
    'SUP_GRCOD' => 5,
    'SUP_FUNCAD' => $funcionario,
    'SUP_FUNATU' => $funcionario,
    'SUP_ASS' => $assunto,
    'SUP_PROJ2' => $chatId
);

$json = json_encode($dados);

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 5,
    CURLOPT_CONNECTTIMEOUT => 10,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_HTTPHEADER => [
        'Authorization: Basic ' . $token,
    ],
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $json,
]);

$response = curl_exec($curl);

if ($response === false) {
    echo 'Entre em contato com o suporte! Erro ao enviar a solicitação cURL: ' . curl_error($curl);
} else {
    echo $response;
}

curl_close($curl);
echo $tpl->fetch();

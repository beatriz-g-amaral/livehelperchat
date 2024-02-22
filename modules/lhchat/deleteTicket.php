<?php

    $chat = erLhcoreClassModelChat::fetch($Params['user_parameters']['chat_id']);   
    $token = 'dGVzdHNlcnZlcjp0ZXN0c2VydmVy';
    $ch = curl_init();
    $url = 'https://my-json-server.typicode.com/beatriz-g-amaral/MyJsonServer/db'; 

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer ' . $token, 
        'Content-Type: application/json' 
    ));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE'); 

    $response = curl_exec($ch);

    if ($response === false) {
        echo ( "Erro na requisição cURL: " . curl_error($ch));
    } else {
        echo ( "Chamado excluído com sucesso!");
        return false;    
    }

    curl_close($ch);

?>
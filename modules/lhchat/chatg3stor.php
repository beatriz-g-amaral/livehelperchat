<?php


$tpl = erLhcoreClassTemplate::getInstance('lhchat/chamadoabertog3stor.tpl.php');
$chat = erLhcoreClassModelChat::fetch($Params['user_parameters']['chat_id']);

$data['params']['Ficha'] = '5087';
$data['params']['Cadastrado'] = '12/01/2024';
$data['params']['Dono'] = 'FIN - Financeiro';
$data['params']['Assunto'] = 'G3STOR NÃO ABRE';
$data['params']['Cliente'] = 'TEXTURA';
$data['params']['Área'] = 'SUPORTE';
$data['params']['Contato'] = 'ADÃO';
$data['params']['Categoria'] = 'SUPORTE';
$data['params']['Funcionário'] = 'SUPORTE';
$data['params']['Situação'] = 'PENDENTE';

$obsData[] = [
    'Data' => '20/02/2024',
    'Funcionário' => 'Renault Sandero',
    'Observação' => 'Cliente relatou problema X'
];

$obsData[] = [
    'Data' => '19/02/2024',
    'Funcionário' => 'Regina George',
    'Observação' => 'Cliente confirmou recebimento da solução'
];

$tpl->setArray([
    'infos' => $data,
    'obs' => $obsData
]);

if ($data == null ) {
    $tpl = erLhcoreClassTemplate::getInstance('lhchat/chatg3stor.tpl.php');
    echo $tpl->fetch();
}
else
echo $tpl->fetch();

exit;


?>
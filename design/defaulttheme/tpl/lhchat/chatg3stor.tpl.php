<h2>Formulário de Atendimento</h2>

<form action="" onsubmit="return onCreateTicket()" method="post">
    <label for="nome_cliente">Nome do Cliente:</label><br>
    <input type="text" id="nome_cliente" name="nome_cliente" required><br><br>
    <input type="hidden" id="chat_id" name="chat_id" value="<?php echo $chat->id; ?>">

    <label for="atendente">Atendente:</label><br>
    <input type="text" id="atendente" name="atendente" required><br><br>
    
    <label for="descricao_problema">Descrição do Problema:</label><br>
    <textarea id="descricao_problema" name="descricao_problema" rows="4" required></textarea><br><br>
    
    <label for="setor">Setor:</label><br>
    <select id="setor" name="setor" required>
        <option value="">Selecione o setor</option>
        <option value="Vendas">Vendas</option>
        <option value="Suporte">Suporte</option>
        <option value="Financeiro">Financeiro</option>
        <option value="Outro">Outro</option>
    </select><br><br>

    <input type="submit" value="Enviar">
</form>

<script>
function onCreateTicket() {
    alert("ENVIADO");
    return false;
}
</script>

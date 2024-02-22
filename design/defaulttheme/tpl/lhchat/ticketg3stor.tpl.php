<style>

<?php include 'design/defaulttheme/css/g3stor.css'; ?>

</style>


<h2>Formulário de Atendimento</h2>

<form action="" onsubmit="return onCreateTicket()" method="post">
    <label for="nome_cliente">Nome do Cliente:</label>
    <input type="text" id="nome_cliente" name="nome_cliente" required><br><br>
    <input type="hidden" id="chat_id" name="chat_id" value="<?php echo $chat->id; ?>">

    <label for="atendente">Atendente:</label>
    <input type="text" id="atendente" name="atendente" required><br><br>
    
    <label for="descricao_problema">Descrição do Problema:</label>
    <textarea id="descricao_problema" name="descricao_problema" rows="4" required></textarea><br><br>
    
    <label for="setor">Setor:</label>
    <select id="setor" name="setor" required>
        <option value="">Selecione o setor</option>
        <option value="Vendas">Vendas</option>
        <option value="Suporte">Suporte</option>
        <option value="Financeiro">Financeiro</option>
        <option value="Outro">Outro</option>
    </select><br><br>

    <fieldset>
    <legend>Vincular conversa ao chamado?</legend>
    <div style="display: flex; padding: 5px;">
        <input type="checkbox" id="sim" name="sim" checked />
        <label for="sim">Sim</label>
        <input type="checkbox" id="nao" name="nao" />
        <label for="nao">Não</label>
    </div>
    </fieldset>

    <input type="submit" value="Enviar">
</form>

<script>
function onCreateTicket() {
    alert("ENVIADO");
    return false;
}
</script>

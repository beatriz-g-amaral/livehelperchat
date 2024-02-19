<div style="padding: 15px">
    <h1>Ficha nº <?php echo $infos['params']['Ficha']; ?></h1>
    <button style="padding-right: 20px;" onclick="adicionarLinha()">Adicionar Nova Observação</button>
    <button style="padding-right: 20px;" onclick="adicionarLinha()">Finalizar Chamado</button>
    <h2>Informações Gerais</h2>
    <div style="display: flex; flex-wrap: wrap;">
        <div style="flex: 1; padding-right: 20px;">
            <h3>Cadastrado em:</h3><?php echo $infos['params']['Cadastrado']; ?>
        </div>
        <div style="flex: 1; padding-right: 20px;">
            <h3>Por:</h3> <?php echo $infos['params']['Dono']; ?> 
        </div>
    </div>
    <!-- <div style="display: flex; flex-wrap: wrap;">
        <div style="flex: 1; padding-right: 20px;">
            <h3>Atualizado em:</h3>   
        </div>
        <div style="flex: 1;">
            <h3>Por:</h3>
        </div>
    </div> -->
</div>

<div style="padding: 15px">
<h4 style="margin-right: 20px;">Assunto: </br><input type="text" id="assunto" name="assunto" value="<?php echo $infos['params']['Assunto']; ?>"></h4>
<div style="display: flex;">
<h4 style="margin-right: 20px;">Cliente:</br> <input type="text" id="cliente" name="cliente" value="<?php echo $infos['params']['Cliente']; ?>"></h4>
    <h4 style="margin-right: 20px;">Área:</br> <input type="text" id="area" name="area" value="<?php echo $infos['params']['Área']; ?>"></h4>
    <h4 style="margin-right: 20px;">Contato:</br> <input type="text" id="contato" name="contato" value="<?php echo $infos['params']['Contato']; ?>"></h4>
</div>
<div style="display: flex;">
    <h4 style="margin-right: 20px;">Categoria: </br><input type="text" id="categoria" name="categoria" value="<?php echo $infos['params']['Categoria']; ?>"></h4>
    <h4 style="margin-right: 20px;">Funcionário:</br> <input type="text" id="funcionario" name="funcionario" value="<?php echo $infos['params']['Funcionário']; ?>"></h4>
    <h4 style="margin-right: 20px;">Situação: </br><input type="text" id="situacao" name="situacao" value="<?php echo $infos['params']['Situação']; ?>"></h4>
</div>
</div>


<div style="padding: 15px">
    <table id="observacoes" border="1">
        <thead>
            <tr>
                <th>Data</th>
                <th>Funcionário</th>
                <th>Observação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($obs as $observacao): ?>
                <tr>
                    <td><?php echo $observacao['Data']; ?></td>
                    <td><?php echo $observacao['Funcionário']; ?></td>
                    <td><?php echo $observacao['Observação']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
function adicionarLinha() {
    var tabela = document.getElementById("observacoes").getElementsByTagName('tbody')[0];
    var novaLinha = tabela.insertRow();

    var colunaData = novaLinha.insertCell(0);
    var colunaObservador = novaLinha.insertCell(1);
    var colunaObservacao = novaLinha.insertCell(2);

    colunaData.innerHTML = '19/02/2024';
    colunaObservador.innerHTML = 'Novo Funcionário';
    colunaObservacao.innerHTML = 'Nova Observação';
}
</script>
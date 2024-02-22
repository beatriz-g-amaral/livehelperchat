<style>

<?php include 'design/defaulttheme/css/g3stor.css'; ?>

</style>

<div class="col-12 pt-1" style="padding: 15px">
<button style="margin: 15px;" onclick=''>Encerrar o chamado</button>
    <!-- <button style="margin: 15px;" onclick='var_dump(rLhcoreClassDesign::designtpl('lhchat/deleteTicket.tpl.php'));?>'>Encerrar o chamado</button> -->
    <h1>Ficha nº <?php echo $infos['listaMVSUP']['SUP_COD']; ?></h1>
    
    

    <h2>Informações Gerais</h2>
    <div style="display: flex; flex-wrap: wrap;">
        <div style="flex: 1; padding-right: 20px;">
            <h3>Cadastrado em:</h3><?php echo $infos['listaMVSUP']['SUP_DAT']; ?>
        </div>
        <div style="flex: 1; padding-right: 20px;">
            <h3>Por:</h3> <?php echo $infos['listaMVSUP']['FUN_RED']; ?> 
        </div>
    </div>
</div>

<div class="col-12 pt-1" style="padding: 15px">
<h4 style="margin-right: 20px;">Assunto: </br><input type="text" id="assunto" name="assunto" value="<?php echo $infos['listaMVSUP']['SUP_ASS']; ?>"></h4>
<div style="display: flex;">
<h4 style="margin-right: 20px;">Cliente:</br> <input type="text" id="cliente" name="cliente" value="<?php echo $infos['listaMVSUP']['CLI_NOM']; ?>"></h4>
    <h4 style="margin-right: 20px;">Área:</br> <input type="text" id="area" name="area" value="<?php echo $infos['listaMVSUP']['ARE_NOM']; ?>"></h4>
    <h4 style="margin-right: 20px;">Contato:</br> <input type="text" id="contato" name="contato" value="<?php echo $infos['listaMVSUP']['SUP_CON']; ?>"></h4>
</div>
<div style="display: flex;">
    <h4 style="margin-right: 20px;">Categoria: </br><input type="text" id="categoria" name="categoria" value="<?php echo $infos['listaMVSUP']['CAT_NOM']; ?>"></h4>
    <h4 style="margin-right: 20px;">Funcionário:</br> <input type="text" id="funcionario" name="funcionario" value="<?php echo $infos['listaMVSUP']['FUN_RED']; ?>"></h4>
    <h4 style="margin-right: 20px;">Situação: </br><input type="text" id="situacao" name="situacao" value="<?php echo $infos['listaMVSUP']['SIT_NOM']; ?>"></h4>
</div>
</div>

<button style="margin: 15px;" onclick="adicionarLinha()">Adicionar Nova Observação</button>
<div style="padding: 15px">
    <table class="table table-hover table-sm" id="comments" border="1">
        <thead>
            <tr>
                <th>Data</th>
                <th>Funcionário</th>
                <th>Observação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($obs['listaMVSUP2'] as $comments): ?>
                <tr>
                    <td><?php echo $comments['DAT_CAD']; ?></td>
                    <td><?php echo $comments['USE_SIG']; ?></td>
                    <td><?php echo $comments['SUP2_OBS']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
function adicionarLinha() {
    var table = document.getElementById("comments").getElementsByTagName('tbody')[0];
    var newLine = table.insertRow();

    var columnData = newLine.insertCell(0);
    var columnEmployee = newLine.insertCell(1);
    var columnComments = newLine.insertCell(2);

    columnData.innerHTML = '19/02/2024';
    columnEmployee.innerHTML = 'Novo Funcionário';
    columnComments.innerHTML = 'Nova Observação';
}

</script>
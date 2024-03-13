<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha <?php echo $infos['SUP_GRCOD']; ?></title>
    <style>
    <?php include '/var/www/html/lhc_web/design/defaulttheme/css/g3stor.css'; ?>
    </style>
</head>

<body>

    <h2>Informações Gerais</h2>
    <div style="display: flex; flex-wrap: wrap;">
        <div style="flex: 1; padding-right: 20px;">
            <h3>Cadastrado em: <?php echo $infos['SUP_DAT']; ?></h3>
        </div>
        <div style="flex: 1; padding-right: 20px;">
            <h3>Por: <?php echo $infos['FUN_RED']; ?></h3>
        </div>
    </div>
</div>

<div class="col-12 pt-1" style="padding: 15px">
    <h4 style="margin-right: 20px;">Assunto: </br><input type="text" id="assunto" name="assunto"
            value="<?php echo $infos['SUP_ASS']; ?>"></h4>
    <div style="display: flex;">
        <h4 style="margin-right: 20px;">Cliente:</br> <input type="text" id="cliente" name="cliente"
                value="<?php echo $infos['CLI_NOM']; ?>"></h4>
        <h4 style="margin-right: 20px;">Área:</br> <input type="text" id="area" name="area"
                value="<?php echo $infos['ARE_NOM']; ?>"></h4>
        <h4 style="margin-right: 20px;">Contato:</br> <input type="text" id="contato" name="contato"
                value="<?php echo $infos['SUP_CON']; ?>"></h4>
    </div>
    <div style="display: flex;">
        <h4 style="margin-right: 20px;">Categoria: </br><input type="text" id="categoria" name="categoria"
                value="<?php echo $infos['CAT_NOM']; ?>"></h4>
        <h4 style="margin-right: 20px;">Funcionário:</br> <input type="text" id="funcionario" name="funcionario"
                value="<?php echo $infos['FUN_RED']; ?>"></h4>
        <h4 style="margin-right: 20px;">Situação: </br><input type="text" id="situacao" name="situacao"
                value="<?php echo $infos['SIT_NOM']; ?>"></h4>
    </div>

    
    <div class="comments-container">
        <h2 class="g3storDiv">Comentários</h2>
        <table class="table table-hover table-sm" id="comments">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Funcionário</th>
                    <th>Observação</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $infos['DAT_CAD_1']; ?></td>
                    <td><?php echo $infos['SUP2_NFUN']; ?></td>
                    <td><?php echo preg_replace('/{[^}]+}|\\\\[A-Za-z]+\s?|\d+/', '', $infos['SUP2_OBS']); ?></td>
                </tr>
            </tbody>
        </table>
        <div class="form-container">
            <textarea id="comentario" name="comentario" placeholder="Digite um comentário" rows="4"></textarea>
            <button class="comment-button">Adicionar Nova Observação</button>
        </div>
    </div>
</body>

</html>

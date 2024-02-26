<style>
    <?php include 'design/defaulttheme/css/g3stor.css'; ?>
</style>

<div class="col-12 pt-1" style="padding: 15px">
    <div style="display: flex; justify-content: space-between;">
        <h1>Ficha nº
            <?php echo $infos['listaMVSUP']['SUP_COD']; ?>
        </h1>
        <button style="margin: 15px;" onclick="closeTicket()">Encerrar o chamado</button>
    </div>



    <h2>Informações Gerais</h2>
    <div style="display: flex; flex-wrap: wrap;">
        <div style="flex: 1; padding-right: 20px;">
            <h3>Cadastrado em:</h3>
            <?php echo $infos['listaMVSUP']['SUP_DAT']; ?>
        </div>
        <div style="flex: 1; padding-right: 20px;">
            <h3>Por:</h3>
            <?php echo $infos['listaMVSUP']['FUN_RED']; ?>
        </div>
    </div>
</div>

<div class="col-12 pt-1" style="padding: 15px">
    <h4 style="margin-right: 20px;">Assunto: </br><input type="text" id="assunto" name="assunto"
            value="<?php echo $infos['listaMVSUP']['SUP_ASS']; ?>"></h4>
    <div style="display: flex;">
        <h4 style="margin-right: 20px;">Cliente:</br> <input type="text" id="cliente" name="cliente"
                value="<?php echo $infos['listaMVSUP']['CLI_NOM']; ?>"></h4>
        <h4 style="margin-right: 20px;">Área:</br> <input type="text" id="area" name="area"
                value="<?php echo $infos['listaMVSUP']['ARE_NOM']; ?>"></h4>
        <h4 style="margin-right: 20px;">Contato:</br> <input type="text" id="contato" name="contato"
                value="<?php echo $infos['listaMVSUP']['SUP_CON']; ?>"></h4>
    </div>
    <div style="display: flex;">
        <h4 style="margin-right: 20px;">Categoria: </br><input type="text" id="categoria" name="categoria"
                value="<?php echo $infos['listaMVSUP']['CAT_NOM']; ?>"></h4>
        <h4 style="margin-right: 20px;">Funcionário:</br> <input type="text" id="funcionario" name="funcionario"
                value="<?php echo $infos['listaMVSUP']['FUN_RED']; ?>"></h4>
        <h4 style="margin-right: 20px;">Situação: </br><input type="text" id="situacao" name="situacao"
                value="<?php echo $infos['listaMVSUP']['SIT_NOM']; ?>"></h4>
    </div>
</div>

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
                    <td>
                        <?php echo $comments['DAT_CAD']; ?>
                    </td>
                    <td>
                        <?php echo $comments['USE_SIG']; ?>
                    </td>
                    <td>
                        <?php echo $comments['SUP2_OBS']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div style="padding: 15px">
    <textarea id="comentario" name="comentario" placeholder="Digite um comentário" rows="4"></textarea></br>
    <button style="margin: 15px;" onclick="addComment()">Adicionar Nova Observação</button>
</div>

<script>
    function addComment() {
        var apiUrl = 'https://demo4705385.mockable.io/comments';
        var token = 'dGVzdHNlcnZlcjp0ZXN0c2VydmVy';

        var data = {
            ticketId: <?php echo $infos['listaMVSUP']['SUP_COD']; ?>,
            comment: comentario.input,
            author: "LHC Web"

        };

        var options = {
            method: 'POST', // trocar para Post ou delete quando a api ficar pronta 
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token
            },
            body: JSON.stringify(data)
        };

        fetch(apiUrl, options)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro ao enviar comentário');
                }
                alert('Comentário Enviado!');
                location.reload();
            })
            .catch(error => {
                console.error('Erro ao enviar comentário: ', error);
            });
    }

    function closeTicket() {
        var apiUrl = 'https://demo4705385.mockable.io/ticket';
        var token = 'dGVzdHNlcnZlcjp0ZXN0c2VydmVy';

        var data = {
            ticketId: <?php echo $infos['listaMVSUP']['SUP_COD']; ?>
        };

        var options = {
            method: 'DELETE', 
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token
            },
            // body: JSON.stringify(data) 
        };

        fetch(apiUrl, options)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro ao fechar o ticket');
                }
                alert('Ticket fechado com sucesso');
                location.reload();
            })
            .catch(error => {
                console.error('Erro ao fechar o ticket:', error);
            });
    }

</script>
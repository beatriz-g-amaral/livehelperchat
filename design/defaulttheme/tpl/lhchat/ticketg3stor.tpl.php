<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Atendimento</title>
    <style>
        <?php include 'design/defaulttheme/css/g3stor.css';
        ?>
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
</head>

<body>

    <h2 class="g3storDiv">Formulário de Atendimento</h2>

    <form action="<?php echo erLhcoreClassDesign::baseurl() ?>chat/createticket" method="post" onsubmit="return validateForm()">
        <div class="g3storDiv">
            <input type="hidden" name="chatID" value="<?php echo $chat; ?>">
            <h4 class="g3storH4">Assunto:</br> <input type="text" id="assunto" name="assunto"> </h4>
            <div class="g3storInfosSmall">
                <h4 class="g3storH4">Cliente:</br>
                    <input type="text" id="cliente" name="cliente" autocomplete="off">
                    <input type="hidden" id="clienteCod" name="clienteCod">
                </h4>

                <h4 class="g3storH4">Área:</br>
                    <input type="text" id="area" name="area" autocomplete="off">
                    <input type="hidden" id="areaCod" name="areaCod">
                </h4>
                <h4 class="g3storH4">Contato:</br>
                    <input type="text" id="contato" name="contato" autocomplete="off">
                    <input type="hidden" id="contatoCod" name="contatoCod">
                </h4>
            </div>
            <div class="g3storInfosSmall">
                <h4 class="g3storH4">Categoria:</br>
                    <input type="text" id="categoria" name="categoria" autocomplete="off">
                    <input type="hidden" id="categoriaCod" name="categoriaCod">

                </h4>
                <h4 class="g3storH4">Funcionário:</br>
                    <input type="text" id="funcionario" name="funcionario" autocomplete="off">
                    <input type="hidden" id="funcionarioCod" name="funcionarioCod">
                </h4>
            </div>

            <fieldset>
                <legend>Vincular conversa ao chamado?</legend>
                <div class="g3storInfos">
                    <input type="checkbox" id="sim" name="sim" checked />
                    <label for="sim">Sim</label>
                    <input type="checkbox" id="nao" name="nao" />
                    <label for="nao">Não</label>
                </div>
            </fieldset>
        </div>
        <div class="g3storDiv">
            <input type="submit" value="Enviar">
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        var customerData = <?php echo $customer; ?>;
        var areaData = <?php echo $area; ?>;
        var categoryData = <?php echo $category; ?>;
        var userData = <?php echo $user; ?>;


        function validateForm() {
            var assunto = document.getElementById("assunto").value;
            var cliente = document.getElementById("cliente").value;
            var area = document.getElementById("area").value;
            var contato = document.getElementById("contato").value;
            var categoria = document.getElementById("categoria").value;
            var funcionario = document.getElementById("funcionario").value;

            if (assunto.trim() === "") {
                alert("Por favor, preencha o campo Assunto.");
                return false;
            }

            if (cliente.trim() === "") {
                alert("Por favor, preencha o campo Cliente.");
                return false;
            }
            if (area.trim() === "") {
                alert("Por favor, preencha o campo Área.");
                return false;
            }
            if (contato.trim() === "") {
                alert("Por favor, preencha o campo Contato.");
                return false;
            }
            if (categoria.trim() === "") {
                alert("Por favor, preencha o campo Categoria.");
                return false;
            }
            if (funcionario.trim() === "") {
                alert("Por favor, preencha o campo Funcionário.");
                return false;
            }

            return true;
        }

        $(function() {
            $("#cliente").autocomplete({
                source: customerData,
                select: function(event, ui) {
                    $('#cliente').val(ui.item.value);
                    $('#clienteCod').val(ui.item.id);
                    return false;
                }
            });

            $("#funcionario").autocomplete({
                source: userData,
                select: function(event, ui) {
                    $('#funcionario').val(ui.item.value);
                    $('#funcionarioCod').val(ui.item.id);
                    return false;
                }
            });

            $("#contato").autocomplete({
                source: userData,
                select: function(event, ui) {
                    $('#contato').val(ui.item.value);
                    $('#contatoCod').val(ui.item.id);
                    return false;
                }
            });

            $("#area").autocomplete({
                source: areaData,
                select: function(event, ui) {
                    $('#area').val(ui.item.value);
                    $('#areaCod').val(ui.item.id);
                    return false;
                }
            });

            $("#categoria").autocomplete({
                source: categoryData,
                select: function(event, ui) {
                    $('#categoria').val(ui.item.value);
                    $('#categoriaCod').val(ui.item.id);
                    return false;
                }
            });
        });
    </script>


</body>

</html>
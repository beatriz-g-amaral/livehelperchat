<tr>
    <td colspan="2">
        <h6 class="fw-bold"><i class="material-icons">account_box</i>
            <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/adminchat', 'G3stor') ?>
        </h6>
        <div class="row">
            <div class="col-6 pb-1">
                <div class="text-muted" id="create-ticket-<?php echo $chat->id ?>"
                    title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/adminchat', 'Criar chamado') ?>">
                    <span class="material-icons action-image"
                        onclick='lhc.revealModal({"iframe" : true, "title" : <?php echo json_encode(htmlspecialchars_decode(erTranslationClassLhTranslation::getInstance()->getTranslation('chat/adminchat', 'Criar Chamado')), JSON_HEX_QUOT) ?>, height: "600", "url":WWW_DIR_JAVASCRIPT+"chat/ticketg3stor/<?php echo $chat->id?>"})'
                        title="Criar Chamado">chamado</span>Criar Chamado
                </div>
            </div>
            <div class="col-6 pb-1">
                <div class="text-muted" id="link-ticket-<?php echo $chat->phone ?>"
                    title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/adminchat', 'Informações do Cliente') ?>">
                    <span class="material-icons action-image"
                        onclick='lhc.revealModal({"iframe" : true, "title" : <?php echo json_encode(htmlspecialchars_decode(erTranslationClassLhTranslation::getInstance()->getTranslation('chat/adminchat', 'Informações do Cliente')), JSON_HEX_QUOT) ?>, height: "600", "url":WWW_DIR_JAVASCRIPT+"chat/info_g3stor/<?php echo $chat->phone?>"})'
                        title="Informações do Cliente">Informações</span>Informações do Cliente
                </div>
            </div>
        </div>
    </td>
</tr>
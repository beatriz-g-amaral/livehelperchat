<tr>
    <td colspan="2">
        <h6 class="fw-bold"><i class="material-icons">account_box</i><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/adminchat','G3stor')?></h6>
        <div class="row">
            <div class="col-6 pb-1">
                <div class="text-muted" id="create-ticket-<?php echo $chat->id?>" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/adminchat','Criar chamado')?>">
                <?php?>
                <span class="material-icons action-image" onclick='lhc.revealModal({"iframe" : true, "title" : <?php echo json_encode(htmlspecialchars_decode(erTranslationClassLhTranslation::getInstance()->getTranslation('chat/adminchat','Criar Chamado')), JSON_HEX_QUOT)?>, height: "600", "url":WWW_DIR_JAVASCRIPT+"chat/chatg3stor"})'
                 title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/adminchat','Criar chamado')?>">chamado</span>
                Criar Chamado
                    <?php?>    
                </div>
            </div>
        </div>
    </td>
</tr>

<div class="modal fade" id="modal-delete-diet" tabindex="-1" role="dialog" aria-labelledby="modal-delete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Deletar Dieta</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Ao deletar a dieta todas as refeições e itens de refeição relacionados
                    a ela também serão deletados do sistema. Tem certeza de que deseja deletar?
                </p>
            </div>
            <div class="modal-footer">
                <form role="form" class="js-form-deleteDiet" action="<?php echo HOME_URI; ?>API/dieta/<?= $dieta->getId(); ?>">
                    <button type="submit" class="btn btn-primary" style="background-color: #9d2f4c;">Deletar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
        <div class="response">
            <p class='response-message js-message'></p>
            <img src="<?php echo HOME_URI; ?>app/public/images/ajax-loader.gif" class="response-load js-load" title="Carregando..." alt="Carregando...">
        </div>
    </div>
</div>
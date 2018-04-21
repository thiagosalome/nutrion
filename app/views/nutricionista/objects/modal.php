<div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="modal-update" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Editar Conta</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-left form-group has-feedback">
                    <input type="text" class="form-control input-default" name="nome" placeholder="Nome">
                    <i class="glyphicon glyphicon-user form-control-feedback glyphiconalign"></i> 
                </div>
                <div class="text-left form-group has-feedback">
                    <input type="email" class="form-control input-default" name="email" placeholder="Email">
                    <i class="glyphicon glyphicon-envelope form-control-feedback"></i> 
                </div>
                <div class="text-left form-group has-feedback">
                    <input type="text" class="form-control input-default" name="senha" placeholder="Senha">
                </div>
                <div class="form-group text-center" style="margin-bottom: 0px;">
                    <button class="btn btn-default col-md-3" style="float:inherit" type="submit">Editar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-delete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Deletar Conta</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Ao deletar sua conta todos os pacientes, alimentos e dietas relacionados
                    a ela também serão deletados. Tem certeza de que deseja deletar?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" style="background-color: #9d2f4c;" data-dismiss="modal">Deletar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
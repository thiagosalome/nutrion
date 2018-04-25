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
                <form role="form" class="js-form-updateNutritionist" action="">
                    <input type="hidden" name="id_nutricionista" value="<?php echo $_SESSION['id_nutricionista']; ?>">
                    <div class="text-left form-group has-feedback">
                        <input type="text" class="form-control input-default" name="nome" placeholder="Nome" value="<?php echo $_SESSION['nome_nutricionista']; ?>">
                        <i class="glyphicon glyphicon-user form-control-feedback glyphiconalign"></i> 
                    </div>
                    <div class="text-left form-group has-feedback">
                        <input type="email" class="form-control input-default" name="email" placeholder="Email" value="<?php echo $_SESSION['email_nutricionista']; ?>">
                        <i class="glyphicon glyphicon-envelope form-control-feedback"></i> 
                    </div>
                    <div class="text-left form-group has-feedback">
                        <input type="password" class="form-control input-default" name="senha" placeholder="Senha" value="<?php echo $_SESSION['senha_nutricionista']; ?>">
                    </div>
                    <div class="form-group text-center" style="margin-bottom: 0px;">
                        <button class="btn btn-default col-md-3" style="float:inherit" type="submit">Editar</button>
                    </div>
                </form>
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
                <form role="form" class="js-form-deleteNutritionist" action="">
                    <input type="hidden" name="id_nutricionista" value="<?php echo $_SESSION['id_nutricionista']; ?>">
                    <button type="submit" class="btn btn-primary" style="background-color: #9d2f4c;">Deletar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
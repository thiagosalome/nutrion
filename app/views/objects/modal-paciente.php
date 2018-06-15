<div class="modal fade" id="modal-update-patient" tabindex="-1" role="dialog" aria-labelledby="modal-update" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Editar Paciente</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" class="js-form-updatePatient" action="<?php echo HOME_URI; ?>API/paciente/<?= $paciente->getId(); ?>">
                    <input type="hidden" name="id_nutricionista" value="<?php echo $_SESSION['id_nutricionista']; ?>">
                    <div class="row">
                        <div class="text-left col-sm-6 form-group has-feedback">
                            <input type="text" class="form-control input-default" name="nome" placeholder="Nome" value="<?php echo $paciente->getNome(); ?>">
                            <i class="glyphicon glyphicon-user form-control-feedback glyphiconalign"></i> 
                        </div>
                        <div class="text-left col-sm-6 form-group has-feedback">
                            <input type="tel" class="form-control input-default" name="telefone" placeholder="Telefone" value="<?php echo $paciente->getTelefone(); ?>">
                            <i class="glyphicon glyphicon-earphone form-control-feedback glyphiconalign"></i> 
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control input-default" name="email" placeholder="Email" value="<?php echo $paciente->getEmail(); ?>">
                        <i class="glyphicon glyphicon-envelope form-control-feedback"></i> 
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <select name="sexo" class="form-control input-default">
                                <option value="">Sexo</option>
                                <?php
                                    if($paciente->getSexo() == "M"){
                                        ?>
                                            <option value="M" selected>Masculino</option>
                                            <option value="F">Feminino</option>
                                        <?php
                                    }
                                    else{
                                        ?>
                                            <option value="M">Masculino</option>
                                            <option value="F" selected>Feminino</option>
                                        <?php
                                    }
                                ?>
                                
                            </select>
                            <i class="glyphicon glyphicon-chevron-down"></i> 
                        </div>
                        <div class="col-sm-6 form-group">
                            <input type="date" class="form-control input-default" name="nascimento" placeholder="Data de nascimento : DD/MM/YY" value="<?= date_format($paciente->getDataNasc(), "Y-m-d") ?>">
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control input-default" name="cpf" placeholder="CPF" value="<?php echo $paciente->getCPF(); ?>">
                    </div>
                    <div class="form-group text-center" style="margin-bottom: 0px;">
                        <button class="btn btn-default col-md-3" style="float:inherit" type="submit">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="response">
            <p class='response-message js-message'></p>
            <img src="<?php echo HOME_URI; ?>app/public/images/ajax-loader.gif" class="response-load js-load" title="Carregando..." alt="Carregando...">
        </div>
    </div>
</div>
<div class="modal fade" id="modal-delete-patient" tabindex="-1" role="dialog" aria-labelledby="modal-delete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Deletar Paciente</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Ao deletar o paciente todas as informações físicas e históricos relacionados
                    a ele também serão deletados do sistema. Tem certeza de que deseja deletar?
                </p>
            </div>
            <div class="modal-footer">
                <form role="form" class="js-form-deletePatient" action="<?php echo HOME_URI; ?>API/paciente/<?= $paciente->getId(); ?>">
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
<div class="modal fade" id="modal-update-aliment" tabindex="-1" role="dialog" aria-labelledby="modal-update" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Editar alimento</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" class="js-form-updateAliment" action="<?php echo HOME_URI; ?>API/alimento/">
                    <div class="row">
                        <div class="text-left col-sm-12 form-group has-feedback">
                            <input type="email" class="form-control input-default" name="email" placeholder="Email" value="<?php echo $paciente->getEmail(); ?>">
                            <i class="glyphicon glyphicon-envelope form-control-feedback"></i> 
                        </div>
                    </div>
                    <div class="form-group text-center" style="margin-bottom: 0px;">
                        <button class="btn btn-default col-md-3" style="float:inherit" type="submit">Verificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
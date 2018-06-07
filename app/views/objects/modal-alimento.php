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
                        <div class="text-left col-sm-6 form-group has-feedback">
                            <input type="text" class="form-control input-default" name="nome" placeholder="Nome">
                        </div>
                        <div class="text-left col-sm-6 form-group has-feedback">
                            <input type="text" class="form-control input-default" name="medida" placeholder="Medida">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <select name="tipo_proteina" class="form-control input-default">
                                <option value="">Tipo de Proteína</option>
                                <option value="Vegetal">Vegetal</option>
                                <option value="Animal">Animal</option>
                            </select>
                            <i class="glyphicon glyphicon-chevron-down "></i>
                        </div>
                        <div class="text-left col-sm-6 form-group has-feedback">
                            <input type="number" step="0.001" class="form-control input-default" name="proteina" placeholder="Proteína">
                        </div>
                    </div>
                    <div class="row">
                    <div class="text-left col-sm-4 form-group has-feedback">
                            <input type="number" step="0.001" class="form-control input-default" name="carboidrato" placeholder="Carboidratos">
                        </div>
                        <div class="text-left col-sm-4 form-group has-feedback">
                            <input type="number" step="0.001" class="form-control input-default" name="gordura" placeholder="Gorduras">
                        </div>
                        <div class="text-left col-sm-4 form-group has-feedback">
                            <input type="number" step="0.001" class="form-control input-default" name="caloria" placeholder="Calorias">
                        </div>
                    </div>
                    <div class="form-group text-center" style="margin-bottom: 0px;">
                        <button class="btn btn-default col-md-3" style="float:inherit" type="submit">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-delete-aliment" tabindex="-1" role="dialog" aria-labelledby="modal-delete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Deletar alimento</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Ao deletar o alimento ele não estará mais presente nas dietas cadastradas. 
                    Tem certeza de que deseja deletar?
                </p>
            </div>
            <div class="modal-footer">
                <form role="form" class="js-form-deleteAliment" action="<?php echo HOME_URI; ?>API/alimento/">
                    <button type="submit" class="btn btn-primary" style="background-color: #9d2f4c;">Deletar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
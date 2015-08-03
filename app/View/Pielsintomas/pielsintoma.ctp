<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Formulario de Sintomas en la Piel</h4>
</div>
<div class="modal-body">
    <?php echo $this->Form->create('Pielsintoma') ?>
    <?php echo $this->Form->hidden('id'); ?>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo $this->Form->text('nombre', ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']); ?>
                </div>
            </div>

        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo $this->Form->textarea('descripcion', ['class' => 'form-control', 'placeholder' => 'Descripcion']); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo $this->Form->text('imagen', ['class' => 'form-control', 'placeholder' => 'Elegir una imagen']); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <button type="submit" class="btn btn-outline col-md-12">Registrar</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->Form->end() ?>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
</div>
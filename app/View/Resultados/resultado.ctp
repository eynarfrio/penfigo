<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Formulario de Resultados</h4>
</div>
<?php echo $this->Form->create('Resultado', array('enctype' => 'multipart/form-data')) ?>
<?php echo $this->Form->hidden('id'); ?>
<div class="modal-body">

    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo $this->Form->select('Resultado.penfigo_id', $penfigo, array('class' => 'form-control','empty' => 'Seleccione el penfigo', 'required')); ?> 
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo $this->Form->select('Resultado.examene_id', $examen, array('class'=>'form-control','empty'=>'Seleccione el examen','required'));?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo $this->Form->textarea('descripcion', ['class' => 'form-control', 'placeholder' => 'Ingrese la descripcion']); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline pull-right">Registrar</button>
</div>
<?php echo $this->Form->end() ?>

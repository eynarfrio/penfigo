
<?= $this->Form->create('Tratamiento', ['action' => 'regis_trat_pac/' . $idPaciente . '/' . $numero]); ?>
<?php echo $this->Form->hidden('id');?>
<?php echo $this->Form->hidden('paciente_id',array('value' => $idPaciente));?>
<?php echo $this->Form->hidden('numero',array('value' => $numero));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Tratamiento</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
              <?php echo $this->Form->textarea('descripcion',array('class' => 'form-control','placeholder' => 'Descripcion'))?>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline">Registrar</button>
</div>
<?= $this->Form->end() ?>

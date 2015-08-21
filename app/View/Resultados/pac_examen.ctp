
<?= $this->Form->create('Resultado', ['action' => 'regis_res_pac/' . $idPaciente . '/' . $numero]); ?>
<?php echo $this->Form->hidden('PacientesResultado.id');?>
<?php echo $this->Form->hidden('PacientesResultado.paciente_id',array('value' => $idPaciente));?>
<?php echo $this->Form->hidden('PacientesResultado.numero',array('value' => $numero));?>
<?php echo $this->Form->hidden('PacientesResultado.examene_id',array('value' => $idExamen));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><?php echo $examen['Examene']['nombre']; ?></h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
              <?php echo $this->Form->select('PacientesResultado.resultado_id',$resultados,array('class' => 'form-control','empty' => 'Seleccione el resultado','required'))?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
              <?php echo $this->Form->textarea('PacientesResultado.observacion',array('class' => 'form-control','placeholder' => 'Observacion'))?>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline">Registrar</button>
</div>
<?= $this->Form->end() ?>

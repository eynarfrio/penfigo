<link href="<?= $this->webroot; ?>plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
<?= $this->Form->create('Laboratorio', ['action' => 'regis_lab_pac/' . $idPaciente . '/' . $numero]); ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Laboratorios</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Laboratorio</th>
                        <th>Hacer</th>
                        <th>Hecho</th>
                    </tr>
                    <?php foreach ($laboratorios as $key => $lab): ?>
                      <tr>
                          <td><?= $lab['Laboratorio']['nombre'] ?></td>
                          <td class="text-center">
                              <?= $this->Form->hidden("PacientesLaboratorio.$key.id") ?>
                              <?= $this->Form->hidden("PacientesLaboratorio.$key.paciente_id", ['value' => $idPaciente]) ?>
                              <?= $this->Form->hidden("PacientesLaboratorio.$key.laboratorio_id", ['value' => $lab['Laboratorio']['id']]) ?>
                              <?= $this->Form->checkbox("PacientesLaboratorio.$key.hacer", ['class' => 'flat-red']) ?>
                          </td>
                          <td class="text-center">
                              <?= $this->Form->checkbox("PacientesLaboratorio.$key.hecho", ['class' => 'flat-red']) ?>
                          </td>
                      </tr>
                    <?php endforeach; ?>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline">Registrar</button>
</div>
<?= $this->Form->end() ?>

<?php
echo $this->Html->script([
  '../plugins/iCheck/icheck.min',
  'inicheckbox'
]);
?>
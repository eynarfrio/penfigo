<link href="<?= $this->webroot; ?>plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
<?= $this->Form->create('Sintoma', ['action' => 'regis_sin_pac/' . $idPaciente . '/' . $numero]); ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Sintomas Sistemicos</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sintoma</th>
                        <th>Estado</th>
                    </tr>
                    <?php foreach ($sintomas as $key => $sin): ?>
                      <?php if ($sin['Sintoma']['nombre'] == 'Ampollas'): ?>
                        <tr>
                            <td colspan="2" class="text-center">
                                <span style="font-size: 18px; font-weight: bold;">Signo Cardinal y/o Prefecto</span>
                            </td>
                        </tr>
                      <?php endif; ?>
                      <tr>
                          <td><?= $sin['Sintoma']['nombre'] ?></td>
                          <td class="text-center">
                              <?= $this->Form->hidden("PacientesSintoma.$key.id") ?>
                              <?= $this->Form->hidden("PacientesSintoma.$key.paciente_id", ['value' => $idPaciente]) ?>
                              <?= $this->Form->hidden("PacientesSintoma.$key.sintoma_id", ['value' => $sin['Sintoma']['id']]) ?>
                              <?= $this->Form->checkbox("PacientesSintoma.$key.estado", ['class' => 'flat-red']) ?>
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
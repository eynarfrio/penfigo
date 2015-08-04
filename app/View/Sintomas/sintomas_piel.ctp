<link href="<?= $this->webroot; ?>plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
<section class="content">

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Sintomas en la Piel</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <?php echo $this->Form->create('Sintoma', ['action' => "regis_sin_piel/$idPaciente"]) ?>
        <?php echo $this->Form->hidden('id'); ?>
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="hidden-xs">Nro</th>
                        <th>Sintoma</th>
                        <th>Descripcion</th>
                        <th class="hidden-xs">Imagen</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sintomas as $key => $si): ?>
                      <tr>
                          <td class="hidden-xs"><?php echo ($key + 1) ?></td>
                          <td><?php echo $si['Pielsintoma']['nombre'] ?></td>
                          <td class="hidden-xs"><?php echo $si['Pielsintoma']['descripcion'] ?></td>
                          <td class="hidden-xs"><?php
                              if (!empty($si['Pielsintoma']['imagen'])) {
                                echo $si['Pielsintoma']['imagen'];
                              }
                              ?></td>
                          <td class="visible-xs hidden-md">
                              Lupa
                          </td>
                          <td class="text-center">
                              <?php if (!empty($si['PacientesPielsintoma'])): ?>
                                <?php $this->request->data['PacientesPielsintoma'][$key] = $si['PacientesPielsintoma']; ?>
                              <?php endif; ?>
                              <?= $this->Form->hidden("PacientesPielsintoma.$key.id") ?>
                              <?= $this->Form->hidden("PacientesPielsintoma.$key.paciente_id", ['value' => $idPaciente]) ?>
                              <?= $this->Form->hidden("PacientesPielsintoma.$key.medico_id", ['value' => $idMedico]) ?>
                              <?= $this->Form->hidden("PacientesPielsintoma.$key.numero", ['value' => $numero]) ?>
                              <?= $this->Form->hidden("PacientesPielsintoma.$key.pielsintoma_id", ['value' => $si['Pielsintoma']['id']]) ?>
                              <?= $this->Form->checkbox("PacientesPielsintoma.$key.estado", ['class' => 'flat-red']) ?>
                          </td>
                      </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div><!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
        <?php echo $this->Form->end(); ?>
    </div><!-- /.box -->

</section><!-- /.content -->

<?php
echo $this->Html->script([
  '../plugins/iCheck/icheck.min',
  'inicheckbox'
]);
?>
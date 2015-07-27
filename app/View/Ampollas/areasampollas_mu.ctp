<link href="<?= $this->webroot; ?>plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
<section class="content">

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Ampollas en la mucosa</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <?php echo $this->Form->create('Ampolla', ['action' => "regis_are_amp_m/$idPaciente/$numero/$tipo"]) ?>
        <?php echo $this->Form->hidden('id'); ?>
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="hidden-xs">Nro</th>
                        <th>Area</th>
                        <th>Descripcion</th>
                        <th class="hidden-xs">Imagen</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($areas_mu as $key => $ar): ?>
                      <tr>
                          <td class="hidden-xs"><?php echo ($key + 1) ?></td>
                          <td><?php echo $ar['Area']['nombre'] ?></td>
                          <td class="hidden-xs"><?php echo $ar['Area']['descripcion'] ?></td>
                          <td class="hidden-xs"><?php
                              if (!empty($ar['Area']['imagen'])) {
                                echo $ar['Area']['imagen'];
                              }
                              ?></td>
                          <td class="visible-xs hidden-md">
                              Lupa
                          </td>
                          <td class="text-center">
                              <?php if (!empty($ar['Areaampolla'])): ?>
                                <?php $this->request->data['Areaampolla'][$key] = $ar['Areaampolla']; ?>
                              <?php endif; ?>
                              <?= $this->Form->hidden("Areaampolla.$key.id") ?>
                              <?= $this->Form->hidden("Areaampolla.$key.paciente_id", ['value' => $idPaciente]) ?>
                              <?= $this->Form->hidden("Areaampolla.$key.medico_id", ['value' => $idMedico]) ?>
                              <?= $this->Form->hidden("Areaampolla.$key.numero", ['value' => $numero]) ?>
                              <?= $this->Form->hidden("Areaampolla.$key.tipo", ['value' => $tipo]) ?>
                              <?= $this->Form->hidden("Areaampolla.$key.area_id", ['value' => $ar['Area']['id']]) ?>
                              <?= $this->Form->checkbox("Areaampolla.$key.estado", ['class' => 'flat-red']) ?>
                          </td>
                      </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div><!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Siguiente</button> 
            <button type="button" class="btn btn-danger" onclick="window.location.href = '<?php echo $this->Html->url(array('controller' => 'Pacientes','action' => 'datos',$idPaciente))?>';">Cancelar</button>
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
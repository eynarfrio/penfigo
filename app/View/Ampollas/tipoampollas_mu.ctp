<link href="<?= $this->webroot; ?>plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
<section class="content">

    <?php echo $this->Form->create('Ampolla', ['action' => "regis_tipo_amp_m/$idPaciente/$numero/$tipo"]) ?>
    <?php $i = 0; ?>
    <?php foreach ($areasamp as $am): ?>
      <div class="box box-primary">

          <div class="box-header">
              <h3 class="box-title">Ampollas en <?php echo $am['Area']['nombre'] ?></h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <div class="box-body">
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>Nro</th>
                          <th>Tipo ampolla</th>
                          <th>Descripcion</th>
                          <th class="hidden-xs">Imagen</th>
                          <th>Accion</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      $tiposamp = $this->requestAction(['action' => 'get_tipoamp', $am['Areaampolla']['id'], $tipo]);
                      //debug($tiposamp);exit;
                      ?>
                      <?php foreach ($tiposamp as $key => $ta): ?>
                        <tr>
                            <td><?php echo ($key + 1) ?></td>
                            <td><?php echo $ta['Tipoampolla']['nombre'] ?></td>
                            <td class="hidden-xs"><?php echo $ta['Tipoampolla']['descripcion'] ?></td>
                            <td class="hidden-xs"><?php
                                if (!empty($ar['Tipoampolla']['imagen'])) {
                                  echo $ar['Tipoampolla']['imagen'];
                                }
                                ?></td>
                            <td class="visible-xs hidden-md">
                                Lupa
                            </td>
                            <td class="text-center">
                                <?php if (!empty($ta['PacientesTipoampolla'])): ?>
                                  <?php $this->request->data['PacientesTipoampolla'][$i] = $ta['PacientesTipoampolla']; ?>
                                <?php endif; ?>
                                <?= $this->Form->hidden("PacientesTipoampolla.$i.id") ?>
                                <?= $this->Form->hidden("PacientesTipoampolla.$i.areaampolla_id", ['value' => $am['Areaampolla']['id']]) ?>
                                <?= $this->Form->hidden("PacientesTipoampolla.$i.tipoampolla_id", ['value' => $ta['Tipoampolla']['id']]) ?>
                                <?= $this->Form->checkbox("PacientesTipoampolla.$i.estado", ['class' => 'flat-red']) ?>
                            </td>
                        </tr>
                        <?php $i++; ?>
                      <?php endforeach; ?>
                  </tbody>
              </table>
          </div><!-- /.box-body -->


      </div><!-- /.box -->
    <?php endforeach; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Siguiente</button> 
                <button type="button" class="btn btn-danger" onclick="window.location.href = '<?php echo $this->Html->url(array('controller' => 'Pacientes', 'action' => 'datos', $idPaciente)) ?>';">Cancelar</button>
            </div>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</section><!-- /.content -->

<?php
echo $this->Html->script([
  '../plugins/iCheck/icheck.min',
  'inicheckbox'
]);
?>
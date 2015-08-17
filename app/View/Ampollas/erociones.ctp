<link href="<?= $this->webroot; ?>plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
<section class="content">

    <?php echo $this->Form->create('Ampolla', ['action' => "regis_tipo_ero/$idPaciente/$numero/$tipo"]) ?>
    <?php $i = 0; ?>
    <?php foreach ($pasTipAmps as $am): ?>
      <div class="box box-primary">

          <div class="box-header">
              <h3 class="box-title">Erociones en <?php echo $am['PacientesTipoampolla']['area'] ?></h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <div class="box-body">
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>Nro</th>
                          <th>Tipo Erocion</th>
                          <th>Descripcion</th>
                          <th class="hidden-xs">Imagen</th>
                          <th>Accion</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      $tiposero = $this->requestAction(['action' => 'get_tipoero', $am['PacientesTipoampolla']['areaampolla_id'], $tipo]);
                      //debug($tiposamp);exit;
                      ?>
                      <?php foreach ($tiposero as $key => $ta): ?>
                        <tr>
                            <td><?php echo ($key + 1) ?></td>
                            <td><?php echo $ta['Tipoerocione']['nombre'] ?></td>
                            <td class="hidden-xs"><?php echo $ta['Tipoerocione']['descripcion'] ?></td>
                            <td class="hidden-xs text-center">
                                <?php if (!empty($ta['Tipoerocione']['imagen'])): ?>
                                  <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'ajax_img_tipero', $ta['Tipoerocione']['id'])); ?>');">
                                      <img src="<?php echo $this->webroot; ?>imagenes/<?php echo $ta['Tipoerocione']['imagen']; ?>" height="75px" width="75px">
                                  </a>
                                <?php else: ?>
                                  <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'ajax_img_tipero', $ta['Tipoerocione']['id'])); ?>');">
                                      <img src="<?php echo $this->webroot; ?>imagenes/instagram-Beta.png" height="75px" width="75px">
                                  </a>
                                <?php endif; ?> 
                            </td>
                            <td class="visible-xs hidden-md">
                                <a class="btn btn-social-icon btn-bitbucket" href="javascript:" title="Informacion" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'ajax_inf_tipero', $ta['Tipoerocione']['id'])); ?>');"><i class="fa fa-eye"></i></a>
                            </td>
                            <td class="text-center">
                                <?php if (!empty($ta['PacientesTipoerocione'])): ?>
                                  <?php $this->request->data['PacientesTipoerocione'][$i] = $ta['PacientesTipoerocione']; ?>
                                <?php endif; ?>
                                <?= $this->Form->hidden("PacientesTipoerocione.$i.id") ?>
                                <?= $this->Form->hidden("PacientesTipoerocione.$i.areaampolla_id", ['value' => $am['PacientesTipoampolla']['areaampolla_id']]) ?>
                                <?= $this->Form->hidden("PacientesTipoerocione.$i.tipoerocione_id", ['value' => $ta['Tipoerocione']['id']]) ?>
                                <?= $this->Form->checkbox("PacientesTipoerocione.$i.estado", ['class' => 'flat-red']) ?>
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
                <button type="button" class="btn btn-danger" onclick="window.location.href = '<?php echo $this->Html->url(array('controller' => 'Pacientes', 'action' => 'datos', $idPaciente)) ?>';">Cancelar</button> 
                <button type="submit" class="btn btn-primary">Siguiente</button> 

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
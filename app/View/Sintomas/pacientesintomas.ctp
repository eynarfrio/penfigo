<link href="<?= $this->webroot; ?>plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
<section class="content">

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Sintomas</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <?php echo $this->Form->create('Sintoma') ?>
        <div class="box-body">
            <?php foreach ($sintomas as $key => $sin): ?>
              <div class="form-group">
                  <label>
                      <?= $this->Form->hidden("PacientesSintoma.$key.paciente_id",['value' => $sin['Sintoma']['id']]) ?>
                      <?= $this->Form->hidden("PacientesSintoma.$key.sintoma_id",['value' => $sin['Sintoma']['id']]) ?>
                      <?= $this->Form->checkbox("PacientesSintoma.$key.estado",['class' => 'minimal']) ?>
                      <?= $sin['Sintoma']['nombre']?>
                  </label>
              </div>
            <?php endforeach; ?>
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
  ], ['block' => 'addscript']);
?>
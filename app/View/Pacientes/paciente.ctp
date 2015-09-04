<link href="<?= $this->webroot; ?>plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
<section class="content">

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Registro de Nuevo Paciente</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <?php echo $this->Form->create('Paciente') ?>
        <div class="box-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo $this->Form->text('nombres', ['class' => 'form-control', 'placeholder' => 'Nombres','required']); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo $this->Form->text('ap_paterno', ['class' => 'form-control', 'placeholder' => 'Apellido Paterno']); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo $this->Form->text('ap_materno', ['class' => 'form-control', 'placeholder' => 'Apellido Materno']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->select('sexo', ['Masculino' => 'Masculino', 'Femenino' => 'Femenino'], ['class' => 'form-control', 'empty' => 'Seleccione el Sexo','required']); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->text('fecha_nacimiento', ['class' => 'form-control fecha-mask', 'placeholder' => 'Fecha de nacimiento','required']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo $this->Form->text('ci', ['class' => 'form-control', 'placeholder' => 'C.I.','required']); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo $this->Form->select('lugar', $lugares, ['class' => 'form-control', 'empty' => 'Seleccione el Lugar','required']); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo $this->Form->text('telefonos', ['class' => 'form-control', 'placeholder' => 'Telefonos']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Antecedentes Personales</label>
                            <?php echo $this->Form->textarea('antecedentes_personales', ['class' => 'form-control', 'placeholder' => 'Enfermedades previas, Cirugias y Alergias']); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Medicaciones</label>
                            <?php echo $this->Form->textarea('medicacion', ['class' => 'form-control', 'placeholder' => 'Medicacion en el ultimo mes.']); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Antecedentes Familiares</label>
                            <?php echo $this->Form->textarea('antecedentes_familiares', ['class' => 'form-control', 'placeholder' => 'Ingresar si algun familiar tiene o ha tenido la enfermedad']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.box-body -->

        <div class="box-footer">
            <button type="button" class="btn btn-danger" onclick="window.location.href = '<?php echo $this->Html->url($this->request->referer()) ?>';">Cancelar</button>
            <button type="submit" class="btn btn-primary">Siguiente</button> 
        </div>
        <?php echo $this->Form->end(); ?>
    </div><!-- /.box -->

</section><!-- /.content -->


<?php
echo $this->Html->script([
  '../plugins/input-mask/jquery.inputmask',
  '../plugins/input-mask/jquery.inputmask.date.extensions',
  '../plugins/input-mask/jquery.inputmask.extensions',
  'inimask'
  ], ['block' => 'addscript']);
?>
<?php
echo $this->Html->script([
  '../plugins/iCheck/icheck.min',
  'inicheckbox'
]);
?>


<script>
  $(document).ready(function () {
      $("#check").click(function () {
          if ($(this).attr("checked"))
              $("#mostrarantper").show();
          else
              $("#mostrarantper").hide();
      });
  });
</script>

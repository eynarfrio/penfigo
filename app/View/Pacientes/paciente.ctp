
<section class="content">

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Formulario de Paciente</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <?php echo $this->Form->create('Paciente')?>
        <?php echo $this->Form->hidden('id');?>
            <div class="box-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $this->Form->text('nombres', ['class' => 'form-control', 'placeholder' => 'Nombres']); ?>
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
                                <?php echo $this->Form->select('sexo', ['Masculino' => 'Masculino', 'Femenino' => 'Femenino'], ['class' => 'form-control', 'empty' => 'Seleccione el Sexo']); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->text('fecha_nacimiento', ['class' => 'form-control fecha-mask', 'placeholder' => 'Fecha de nacimiento']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->text('ci', ['class' => 'form-control','placeholder' => 'C.I.']); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->select('lugar',$lugares, ['class' => 'form-control', 'empty' => 'Seleccione el Lugar']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        <?php echo $this->Form->end();?>
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
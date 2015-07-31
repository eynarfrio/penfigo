
<section class="content">

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Formulario de sintomas en la Piel</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <?php echo $this->Form->create('Pielsintoma')?>
        <?php echo $this->Form->hidden('id');?>
            <div class="box-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo $this->Form->text('nombre', ['class' => 'form-control', 'placeholder' => 'Nombre']); ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo $this->Form->textarea('descripcion', ['class'=>'form-control', 'placeholder'=>'Descripcion']);?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo $this->Form->text('imagen',['class'=>'form-control','placeholder'=>'Elegir una imagen']);?>
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



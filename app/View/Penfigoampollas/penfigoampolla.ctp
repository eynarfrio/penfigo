
<section class="content">

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Formulario Tipo de Ampolla</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <?php echo $this->Form->create('penfigoampolla')?>
        <?php echo $this->Form->hidden('id');?>
            <div class="box-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo $this->Form->select('Penfigoampolla.penfigo_id', $penfigo, array('class' => 'form-control', 'required')); ?> 
                                 
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo $this->Form->select('Penfigoampolla.area_id', $areas, array('class' => 'form-control', 'required')); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                               <?php echo $this->Form->select('Penfigoampolla.tipoampolla_id', $ampolla, array('class' => 'form-control', 'required')); ?> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                 <?php echo $this->Form->text('importancia', array('class' => 'form-control', 'required')); ?>
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



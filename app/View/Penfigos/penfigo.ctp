<link href="<?= $this->webroot; ?>plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
<?php echo $this->Form->create('Penfigo') ?>
<?php echo $this->Form->hidden('id'); ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Registro de Penfigo</h4>
</div>
<div class="modal-body">
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo $this->Form->text('nombre', ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo $this->Form->textarea('descripcion', ['class' => 'form-control', 'placeholder' => 'Ingrese una descripcion']); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    No es penfigo 
                    <?php echo $this->Form->checkbox('no_penfigo'); ?>
                </div>
            </div>
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

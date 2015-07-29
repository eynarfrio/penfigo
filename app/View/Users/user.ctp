
<?= $this->Form->create('User', ['action' => 'registra_usuario']); ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Datos de Usuario</h4>
</div>
<div class="modal-body">
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo $this->Form->text('username', ['class' => 'form-control', 'placeholder' => 'Usuario', 'required']); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?php
                    if (!empty($this->request->data['User']['id'])) {
                      $requerido = '';
                      echo $this->Form->hidden('id');
                    } else {
                      $requerido = 'required';
                    }
                    ?>
                    <?php echo $this->Form->password('password_2', ['class' => 'form-control', 'placeholder' => 'Contrasena',$requerido]); ?>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->Form->hidden('role', array('value' => 'Administrador')); ?>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline">Registrar</button>
</div>
<?= $this->Form->end() ?>

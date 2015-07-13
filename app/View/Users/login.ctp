<div class="login-logo">
    <a href="../../index2.html"><b>Penfigo</b>SE</a>
</div><!-- /.login-logo -->
<div class="login-box-body">
    <p class="login-box-msg">Ingresar para iniciar sesion</p>
    <?php echo $this->Form->create('User');?>
        <div class="form-group has-feedback">
            <?php echo $this->Form->text('username',['class' => 'form-control','placeholder' => 'C.I.']);?>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?php echo $this->Form->password('password',['class' => 'form-control','placeholder' => 'Contrasena']);?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
            </div><!-- /.col -->
        </div>
    <?php echo $this->Form->end();?>
    <div class="social-auth-links text-center">
        <a href="<?php echo $this->Html->url(['action' => 'registro_medico']);?>" class="btn btn-danger btn-block btn-flat">Registrarme</a>
    </div><!-- /.social-auth-links -->

</div><!-- /.login-box-body -->
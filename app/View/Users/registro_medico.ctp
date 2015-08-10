<div class="register-logo">
    <a href="javascript:"><b>Penfigo</b>SE</a>
</div>

<div class="register-box-body">
    <p class="login-box-msg">Formulario de registro de medico</p>
    <?php echo $this->Form->create('User'); ?>
    <div class="form-group has-feedback">
        <?php echo $this->Form->text('Medico.nombres', ['class' => 'form-control', 'placeholder' => 'Nombres', 'required']); ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <?php echo $this->Form->text('Medico.ap_paterno', ['class' => 'form-control', 'placeholder' => 'Apellido Paterno']); ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <?php echo $this->Form->text('Medico.ap_materno', ['class' => 'form-control', 'placeholder' => 'Apellido Materno']); ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <?php echo $this->Form->text('Medico.ci', ['class' => 'form-control', 'placeholder' => 'C.I.', 'required']); ?>
        <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <?php echo $this->Form->text('Medico.fecha_nacimiento', ['class' => 'form-control fecha-mask', 'placeholder' => 'Fecha de Nacimiento AAAA-mm-dd', 'required']); ?>
        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <?php echo $this->Form->select('Medico.lugar', $lugares, ['class' => 'form-control', 'empty' => 'Seleccione el lugar', 'required']); ?>
        <span class="glyphicon glyphicon-th-large form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <?php echo $this->Form->select('Medico.sexo', ['Masculino' => 'Masculino', 'Femenino' => 'Femenino'], ['class' => 'form-control', 'empty' => 'Seleccione el Sexo', 'required']); ?>
        <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <?php echo $this->Form->select('Medico.tipo_medico', ['Medico General' => 'Medico General', 'Dermatologo' => 'Dermatologo'], ['class' => 'form-control', 'empty' => 'Seleccione Tipo Medico', 'required']); ?>
        <span class="glyphicon glyphicon-star form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <?php echo $this->Form->text();?>
    </div>
    <div class="form-group has-feedback">
        <?php echo $this->Form->text('Medico.telefonos', ['class' => 'form-control', 'placeholder' => 'Telefonos']); ?>
        <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback ">
        <?php echo $this->Form->textarea("Medico.centro_medico", ['class' => 'form-control', 'placeholder' => 'Centros medicos de trabajo (Nobres, direcciones, telefonos y horarios)', 'required']) ?>
    </div>
    <div class="form-group has-feedback">
        <?php echo $this->Form->password('User.password2', ['class' => 'form-control', 'placeholder' => 'Contrasena', 'required']); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarme</button>
        </div><!-- /.col -->
    </div>
    <?php echo $this->Form->end(); ?>
    <div class="social-auth-links text-center">
        <a href="<?php echo $this->Html->url(['action' => 'login']); ?>" class="btn btn-danger btn-block btn-flat">Iniciar Sesion</a>
    </div><!-- /.social-auth-links -->
</div><!-- /.form-box -->

<script>

</script>
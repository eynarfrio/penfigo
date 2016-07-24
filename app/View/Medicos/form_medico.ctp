<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <?php echo $this->Form->create('Medico', array('action' => 'registra_medico','enctype' => 'multipart/form-data')); ?>
                <?php echo $this->Form->hidden('id'); ?>
                <div class="box-header text-center">
                    <h3 class="box-title">Registro de Medico</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $this->Form->text('nombres', array('class' => 'form-control', 'placeholder' => 'Nombre', 'required')); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $this->Form->text('ap_paterno', array('class' => 'form-control', 'placeholder' => 'Ap. Paterno')); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo $this->Form->text('ap_materno', array('class' => 'form-control', 'placeholder' => 'Ap. Materno')); ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div align="center">
                                <?php if (!empty($this->request->data['User']['imagen'])): ?>
                                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $this->request->data['User']['imagen'] ).'"   width="50%"/>';?>
                                        <?php elseif ($this->request->data['Medico']['sexo'] == 'Masculino'): ?>
                                    
                                    <img src="<?php echo $this->webroot; ?>imagenes/doctor-icono.jpg" height="112px" width="40%">
                                <?php else: ?>
                                    
                                    <img src="<?php echo $this->webroot; ?>imagenes/doctora-icono.jpg" height="112px" width="40%">
                                <?php endif; ?>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?= $this->Form->file('upimg',array('class' => 'form-control'));?>
                                    <br>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->select('sexo', array('Masculino' => 'Masculino', 'Femenino' => 'Femenino'), array('class' => 'form-control', 'empty' => 'Seleccione el sexo', 'required')); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->text('ci', array('class' => 'form-control', 'placeholder' => 'C.I.', 'required')); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->text('Medico.fecha_nacimiento', ['class' => 'form-control fecha-mask', 'placeholder' => 'Fecha de Nacimiento AAAA-mm-dd', 'required']); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->select('Medico.lugar', $lugares, ['class' => 'form-control', 'empty' => 'Seleccione el lugar', 'required']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->text('Medico.mat_colegio', ['class' => 'form-control', 'placeholder' => 'Matricula Colegio de medicos', 'required', 'data-inputmask' => '"mask": "#-9999"', 'data-mask']); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->text('Medico.mat_ministerio', ['class' => 'form-control', 'placeholder' => 'Matricula del ministerio de salud', 'required', 'data-inputmask' => '"mask": "#-9999"', 'data-mask']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->select('Medico.tipo_medico', ['Medico General' => 'Medico General', 'Dermatologo' => 'Dermatologo'], ['class' => 'form-control', 'empty' => 'Seleccione Tipo Medico', 'required']); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->text('Medico.telefonos', ['class' => 'form-control', 'placeholder' => 'Telefonos']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->textarea("Medico.centro_medico", ['class' => 'form-control', 'placeholder' => 'Centros medicos de trabajo (Nobres, direcciones, telefonos y horarios)', 'required']) ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->password('User.password2', ['class' => 'form-control', 'placeholder' => 'Contrasena']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="box-footer">
                    <button type="button" class="btn btn-danger" onclick="window.location.href = '<?php echo $this->Html->url($this->request->referer()) ?>';">Cancelar</button>
                    <!--<button type="button" class="btn btn-danger" onclick="window.location.href = '<?php //echo $this->Html->url(array('controller' => 'Medicos', 'action' => 'ver', $this->request->data['Medico']['user_id']))  ?>';">Cancelar</button>-->
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</section>

<?php
echo $this->Html->script(array(
    '../plugins/iCheck/icheck.min',
    '../plugins/input-mask/jquery.inputmask',
    '../plugins/input-mask/jquery.inputmask.date.extensions',
    '../plugins/input-mask/jquery.inputmask.extensions',
    'inimask'
        ), array('block' => 'addscript'))
?>
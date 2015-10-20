<link href="<?= $this->webroot; ?>plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
<section class="content">

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Registro de Nuevo Paciente</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <?php echo $this->Form->create('Paciente') ?>
        <?php echo $this->Form->hidden('id'); ?>
        <div class="box-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo $this->Form->text('nombres', ['class' => 'form-control', 'placeholder' => 'Nombres', 'required']); ?>
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
                            <?php echo $this->Form->select('sexo', ['Masculino' => 'Masculino', 'Femenino' => 'Femenino'], ['class' => 'form-control', 'empty' => 'Seleccione el Sexo', 'required']); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->text('fecha_nacimiento', ['class' => 'form-control fecha-mask', 'placeholder' => 'Fecha de nacimiento', 'required']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo $this->Form->text('ci', ['class' => 'form-control', 'placeholder' => 'C.I.', 'required']); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo $this->Form->select('lugar', $lugares, ['class' => 'form-control', 'empty' => 'Seleccione el Lugar de procedencia', 'required']); ?>
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
                             <?php echo $this->Form->select('est_civil', ['Soltero(a)' => 'Soltero(a)', 'Casado' => 'Casado', 'Divorciado'=>'Divorciado', 'Viudo'=>'Viudo', 'Conyuge'=>'Conyuge'], ['class' => 'form-control', 'empty' => 'Seleccione el estado civil', 'required']); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo $this->Form->text('ocupacion', ['class' => 'form-control', 'placeholder' => 'Ocupacion y/o labor que desempeña', 'required']); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo $this->Form->text('residencia', ['class' => 'form-control', 'placeholder' => 'Direccion de recidencia', 'required']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo $this->Form->text('fecha_internacion', ['class' => 'form-control fecha-mask', 'placeholder' => 'Fecha de internacion']); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo $this->Form->text('Fecha_clinica', ['class' => 'form-control fecha-mask', 'placeholder' => 'Fecha de historia clinica', 'required']); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo $this->Form->text('hospital', ['class' => 'form-control', 'placeholder' => 'Nombre del hospital', 'required']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->text('servicio', ['class' => 'form-control', 'placeholder' => 'Ej. Dermatologia', 'required']); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->text('cama', ['class' => 'form-control', 'placeholder' => 'Nro. de cama del paciente', 'type'=>'number']); ?>
                        </div>
                    </div>
                  </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->text('fuente_info', ['class' => 'form-control', 'placeholder' => 'Fuente de informacion', 'required']); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->text('grado_confianza', ['class' => 'form-control', 'placeholder' => 'Grado de confianza', 'required']); ?>
                        </div>
                    </div>
                  </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->text('motivo', ['class' => 'form-control', 'placeholder' => 'motivos por los cuales se interna al paciente']); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->text('historia', ['class' => 'form-control', 'placeholder' => 'Historia de la enfermedad actual', 'required']); ?>
                        </div>
                    </div>
                  </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Antecedentes Personales Patologicos y No Patologicos</label>
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
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Antecedentes ginecoobstettricos</label>
                            <?php echo $this->Form->textarea('antecedentes_ginecoobstetricos', ['class' => 'form-control', 'placeholder' => 'Menarcas y o FUM.']); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Examen Fisico General</label>
                            <?php echo $this->Form->textarea('examen_fisicos', ['class' => 'form-control', 'placeholder' => 'Biotipo, estado mental, lenguaje y memoria..']); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Examen Fisico Segmentario</label>
                            <?php echo $this->Form->textarea('examen_segmentario', ['class' => 'form-control', 'placeholder' => 'Examen segmentario por regiones paciente.']); ?>
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
    $(document).ready(function() {
        $("#check").click(function() {
            if ($(this).attr("checked"))
                $("#mostrarantper").show();
            else
                $("#mostrarantper").hide();
        });
    });
</script>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header text-center">
                    <h3 class="box-title">Infomacion de Medico</h3>
                    <div class="box-tools pull-right">
                        <?php if ($this->Session->read('Auth.User.id') == $medico['Medico']['user_id']): ?>
                            <button class="btn btn-box-tool" title="Editar" onclick="window.location.href = '<?= $this->Html->url(['controller' => 'Medicos', 'action' => 'form_medico']) ?>'"><i class="fa fa-edit"></i></button>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4" align="center">
                            <?php if ($medico['Medico']['sexo'] == 'Masculino'): ?>
                                <img src="<?php echo $this->webroot; ?>imagenes/doctor-icono.jpg" height="112px" width="40%">
                            <?php else: ?>
                                <img src="<?php echo $this->webroot; ?>imagenes/doctora-icono.jpg" height="112px" width="40%">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-8">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="text-light-blue hidden-xs" style="font-weight: bold;">Nombres</td>
                                        <td><?= $medico['Medico']['nombres'] ?></td>
                                        <td class="text-light-blue hidden-xs" style="font-weight: bold;">Ap. Paterno</td>
                                        <td><?= $medico['Medico']['ap_paterno'] ?></td>
                                        <td class="text-light-blue hidden-xs" style="font-weight: bold;">Ap. Materno</td>
                                        <td><?= $medico['Medico']['ap_materno'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-light-blue hidden-xs" style="font-weight: bold;">Sexo</td>
                                        <td><?= $medico['Medico']['sexo'] ?></td>
                                        <td class="text-light-blue hidden-xs" style="font-weight: bold;">Edad</td>
                                        <td><?= $this->requestAction(['controller' => 'Pacientes', 'action' => 'calculaedad', $medico['Medico']['fecha_nacimiento']]) ?> A&ntilde;os</td>
                                        <td class="text-light-blue hidden-xs" style="font-weight: bold;">Telefonos</td>
                                        <td><?= $medico['Medico']['telefonos'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-light-blue hidden-xs" style="font-weight: bold;">C.I.</td>
                                        <td><?= $medico['Medico']['ci'] ?></td>
                                        <td class="text-light-blue hidden-xs" style="font-weight: bold;">Lugar</td>
                                        <td><?= $medico['Medico']['lugar'] ?></td>
                                        <td class="text-light-blue hidden-xs" style="font-weight: bold;">Fecha Nacimiento</td>
                                        <td><?= $medico['Medico']['fecha_nacimiento'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-light-blue hidden-xs" style="font-weight: bold;">Matricula Colegio de Medicos</td>
                                        <td><?= $medico['Medico']['mat_colegio'] ?></td>
                                        <td class="text-light-blue hidden-xs" style="font-weight: bold;">Matricula Ministerio de Salud</td>
                                        <td><?= $medico['Medico']['mat_ministerio'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="text-light-blue hidden-xs" style="font-weight: bold;">Especialidad</td>
                                        <td><?= $medico['Medico']['tipo_medico'] ?></td>
                                        <td class="text-light-blue hidden-xs" style="font-weight: bold;">Centro Medico</td>
                                        <td style=""><?= $medico['Medico']['centro_medico'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
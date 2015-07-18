<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header text-center">
                    <h3 class="box-title">Informacion del Paciente</h3>
                </div>
                <div class="box-body">

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header text-center">
                    <h3 class="box-title">Informacion del Paciente</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="text-light-blue hidden-xs" style="font-weight: bold;">Nombres</td>
                                <td><?= $paciente['Paciente']['nombres'] ?></td>
                                <td class="text-light-blue hidden-xs" style="font-weight: bold;">Ap. Paterno</td>
                                <td><?= $paciente['Paciente']['ap_paterno'] ?></td>
                                <td class="text-light-blue hidden-xs" style="font-weight: bold;">Ap. Materno</td>
                                <td><?= $paciente['Paciente']['ap_materno'] ?></td>
                            </tr>
                            <tr>
                                <td class="text-light-blue hidden-xs" style="font-weight: bold;">Sexo</td>
                                <td><?= $paciente['Paciente']['sexo'] ?></td>
                                <td class="text-light-blue hidden-xs" style="font-weight: bold;">Edad</td>
                                <td><?= $this->requestAction(['action' => 'calculaedad', $paciente['Paciente']['fecha_nacimiento']]) ?> A&ntilde;os</td>
                                <td class="text-light-blue hidden-xs" style="font-weight: bold;">Telefonos</td>
                                <td><?= $paciente['Paciente']['telefonos'] ?></td>
                            </tr>
                            <tr>
                                <td class="text-light-blue hidden-xs" style="font-weight: bold;">C.I.</td>
                                <td><?= $paciente['Paciente']['ci'] ?></td>
                                <td class="text-light-blue hidden-xs" style="font-weight: bold;">Lugar</td>
                                <td><?= $paciente['Paciente']['lugar'] ?></td>
                                <td class="text-light-blue hidden-xs" style="font-weight: bold;">Fecha Nacimiento</td>
                                <td><?= $paciente['Paciente']['fecha_nacimiento'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header text-center">
                    <h3 class="box-title">Sintomas Sistemicos</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" title="Registrar Sintomas" onclick="cargarmodal('<?= $this->Html->url(['controller' => 'Sintomas', 'action' => 'ajax_sintomas', $idPaciente]) ?>');"><i class="fa fa-plus-square"></i></button>
                        <?php $num_sin = $this->requestAction(['controller' => 'Sintomas', 'action' => 'get_ult_num', $idPaciente]); ?>
                        <?php if (!empty($num_sin)): ?>
                          <button class="btn btn-box-tool" title="Editar" onclick="cargarmodal('<?= $this->Html->url(['controller' => 'Sintomas', 'action' => 'ajax_sintomas', $idPaciente, $num_sin]) ?>');"><i class="fa fa-edit"></i></button> 
                          <button class="btn btn-box-tool" title="Editar" onclick="if(confirm('Esta seguro de eliminar los sintomas??')){window.location.href = '<?= $this->Html->url(['controller' => 'Sintomas', 'action' => 'elimina_sin', $idPaciente, $num_sin]) ?>';}"><i class="fa fa-remove"></i></button> 
                        <?php endif; ?>

                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="hidden-xs">Nro</th>
                                <th>Sintoma</th>
                                <th>Presenta</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sintomas as $key => $sin): ?>
                              <tr>
                                  <td class="hidden-xs"><?= ($key + 1) ?></td>
                                  <td><?= $sin['Sintoma']['nombre'] ?></td>
                                  <td><?php
                                      if ($sin['PacientesSintoma']['estado']) {
                                        echo '<span class="label label-primary">Si</span>';
                                      } else {
                                        echo 'No';
                                      }
                                      ?></td>
                                  <td><?= $sin['PacientesSintoma']['modified'] ?></td>
                              </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>
<?php $examenes = $this->requestAction(array('controller' => 'Examenes', 'action' => 'get_examenes')); ?>
<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header text-center">
                    <h3 class="box-title">Paciente</h3>
                </div>
                <div class="box-body" align="center">
                    <img src="<?php echo $this->webroot; ?>imagenes/instagram-Beta.png" height="112px" width="40%">
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
    <?php if (!empty($paciente['Paciente']['antecedentes_personales']) || !empty($paciente['Paciente']['medicacion']) || !empty($paciente['Paciente']['antecedentes_familiares'])): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <?php if (!empty($paciente['Paciente']['antecedentes_personales'])): ?>
                      <table class="table table-bordered">
                          <tbody>
                              <tr>
                                  <td class="text-light-blue hidden-xs text-center" style="font-weight: bold;">Antecentes personales</td>
                              </tr>
                              <tr>
                                  <td><?= $paciente['Paciente']['antecedentes_personales'] ?></td>
                              </tr>
                          </tbody>
                      </table>
                    <?php endif; ?>
                    <?php if (!empty($paciente['Paciente']['medicacion'])): ?>
                      <table class="table table-bordered">
                          <tbody>
                              <tr>
                                  <td class="text-light-blue hidden-xs text-center" style="font-weight: bold;">Medicacion</td>
                              </tr>
                              <tr>
                                  <td><?= $paciente['Paciente']['medicacion'] ?></td>
                              </tr>
                          </tbody>
                      </table>
                    <?php endif; ?>
                    <?php if (!empty($paciente['Paciente']['antecedentes_familiares'])): ?>
                      <table class="table table-bordered">
                          <tbody>
                              <tr>
                                  <td class="text-light-blue hidden-xs text-center" style="font-weight: bold;">Antecedentes Familiares</td>
                              </tr>
                              <tr>
                                  <td><?= $paciente['Paciente']['antecedentes_familiares'] ?></td>
                              </tr>
                          </tbody>
                      </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif;?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header text-center">
                    <h3 class="box-title">Datos y Signos Vitales</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" title="Registrar Sintomas" onclick="cargarmodal('<?= $this->Html->url(['controller' => 'Signos', 'action' => 'ajax_signos', $idPaciente]) ?>');"><i class="fa fa-plus-square"></i></button>
                        <?php $num_signo = $this->requestAction(['controller' => 'Signos', 'action' => 'get_ult_num', $idPaciente]); ?>
                        <?php if (!empty($num_signo)): ?>
                          <button class="btn btn-box-tool" title="Editar" onclick="cargarmodal('<?= $this->Html->url(['controller' => 'Signos', 'action' => 'ajax_signos', $idPaciente, $num_signo]) ?>');"><i class="fa fa-edit"></i></button> 
                        <?php endif; ?>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="hidden-xs">Nro</th>
                                <th>Signo</th>
                                <th>Valor</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($p_signos as $key => $sin): ?>
                              <tr>
                                  <td class="hidden-xs"><?= ($key + 1) ?></td>
                                  <td><?= $sin['Signo']['nombre'] ?></td>
                                  <td><?= $sin['PacientesSigno']['valor'] ?></td>
                                  <td><?= $sin['PacientesSigno']['modified'] ?></td>
                              </tr>
                            <?php endforeach; ?>
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
                          <button class="btn btn-box-tool" title="Eliminar" onclick="if (confirm('Esta seguro de eliminar los sintomas??')) {
                                      window.location.href = '<?= $this->Html->url(['controller' => 'Sintomas', 'action' => 'elimina_sin', $idPaciente, $num_sin]) ?>';
                                  }"><i class="fa fa-remove"></i></button> 
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
    <?php foreach ($array_samp as $key1 => $amp): ?>
      <?php if ($amp['estado']): ?>

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header text-center">
                        <h3 class="box-title">Sintomas en la Piel</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" title="Registrar Ampollas en la mucosa" onclick="window.location.href = '<?= $this->Html->url(['controller' => 'Sintomas', 'action' => 'sintomas_piel', $idPaciente, $amp['numero']]) ?>'"><i class="fa fa-edit"></i></button>
                        </div>
                    </div>
                    <?php $sintomaspiel = $this->requestAction(['controller' => 'Pacientes', 'action' => 'get_sintomaspiel', $idPaciente, $amp['numero']]) ?>
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
                                <?php foreach ($sintomaspiel as $key => $sin): ?>
                                  <tr>
                                      <td><?= $key + 1 ?></td>
                                      <td><?= $sin['Pielsintoma']['nombre'] ?></td>
                                      <td>
                                          <?php
                                          if ($sin['PacientesPielsintoma']['estado']) {
                                            echo '<span class="label label-primary">Si</span>';
                                          } else {
                                            echo 'No';
                                          }
                                          ?>
                                      </td>
                                      <td><?= $sin['PacientesPielsintoma']['modified'] ?></td>
                                  </tr>
                                <?php endforeach; ?>
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
                        <h3 class="box-title">Ampollas en la Mucosa</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" title="Registrar Ampollas en la mucosa" onclick="window.location.href = '<?= $this->Html->url(['controller' => 'Ampollas', 'action' => 'areasampollas_mu', $idPaciente, $amp['numero'], 'Mucosas']) ?>'"><i class="fa fa-edit"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="hidden-xs">Nro</th>
                                    <th>Area</th>
                                    <th>Tipos</th>
                                    <th class="hidden-xs">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($amp['areas_mu'] as $key2 => $amp2): ?>
                                  <tr>
                                      <td class="hidden-xs"><?php echo ($key2 + 1); ?></td>
                                      <td><?php echo $amp2['Area']['nombre'] ?></td>
                                      <td><?php echo $amp2['Areaampolla']['tipos'] ?></td>
                                      <td class="hidden-xs"><?php echo $amp2['Areaampolla']['modified'] ?></td>
                                  </tr>
                                <?php endforeach; ?>
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
                        <h3 class="box-title">Ampollas en la Piel</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" title="Registrar Ampollas en la mucosa" onclick="window.location.href = '<?= $this->Html->url(['controller' => 'Ampollas', 'action' => 'areasampollas_mu', $idPaciente, $amp['numero'], 'Piel']) ?>'"><i class="fa fa-edit"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="hidden-xs">Nro</th>
                                    <th>Area</th>
                                    <th>Tipos</th>
                                    <th class="hidden-xs">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($amp['areas_pi'] as $key2 => $amp2): ?>
                                  <tr>
                                      <td class="hidden-xs"><?php echo ($key2 + 1); ?></td>
                                      <td><?php echo $amp2['Area']['nombre'] ?></td>
                                      <td><?php echo $amp2['Areaampolla']['tipos'] ?></td>
                                      <td class="hidden-xs"><?php echo $amp2['Areaampolla']['modified'] ?></td>
                                  </tr>
                                <?php endforeach; ?>
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
                        <h3 class="box-title">Laboratorios</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" title="Registrar Ampollas en la mucosa" onclick="cargarmodal('<?= $this->Html->url(['controller' => 'Laboratorios', 'action' => 'paclaboratorio', $idPaciente, $amp['numero']]) ?>')"><i class="fa fa-edit"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="hidden-xs">Nro</th>
                                    <th>Laboratorio</th>
                                    <th>Hacer</th>
                                    <th>Hecho</th>
                                    <th class="hidden-xs">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $laboratorios = $this->requestAction(array('controller' => 'Laboratorios', 'action' => 'get_laboratorios', $idPaciente, $amp['numero'])) ?>
                                <?php //debug($laboratorios);exit;?>
                                <?php foreach ($laboratorios as $key => $lab): ?>
                                  <tr>
                                      <td class="hidden-xs"><?= ($key + 1) ?></td>
                                      <td><?= $lab['Laboratorio']['nombre'] ?></td>
                                      <td>
                                          <?php
                                          if ($lab['PacientesLaboratorio']['hacer']) {
                                            echo '<span class="label label-primary">Si</span>';
                                          } else {
                                            echo 'No';
                                          }
                                          ?>
                                      </td>
                                      <td>
                                          <?php
                                          if ($lab['PacientesLaboratorio']['hecho']) {
                                            echo '<span class="label label-primary">Si</span>';
                                          } else {
                                            echo 'No';
                                          }
                                          ?>
                                      </td>
                                      <td class="hidden-xs"><?= $lab['PacientesLaboratorio']['modified'] ?></td>
                                  </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <?php if (!$this->requestAction(array('controller' => 'Penfigos', 'action' => 'get_nikolsky', $idPaciente, $amp['numero']))): ?>
          <div class="row">
              <div class="col-md-12">
                  <div class="box box-primary">
                      <div class="box-header text-center">
                          <h3 class="box-title">Diagnostico del paciente</h3>
                      </div>
                      <div class="box-body" id="diagnostico<?= $key1 ?>">

                      </div>
                  </div>
              </div>
          </div>
          <script>
            $('#diagnostico<?= $key1 ?>').load('<?php echo $this->Html->url(array('controller' => 'Penfigos', 'action' => 'pre_diagnostico', $idPaciente, $amp['numero'])); ?>');
          </script>
        <?php else: ?>
          <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-info"></i> Diagnostico</h4>
              NO SE PUEDE DEFINIR UN DIAGNOSTICO DEBIDO A QUE EL PACIENTE NO PRESENTA EL SIGNO DE NIKOLSKY SE RECOMIENDA TRANSFERIR AL PACIENTE A UN ESPECIALISTA!!
          </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header text-center">
                        <h3 class="box-title">Examenes</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="hidden-xs">Nro</th>
                                    <th>Examen</th>
                                    <th class="hidden-xs">Resultado</th>
                                    <td>Penfigo</td>
                                    <th class="hidden-xs">Observacion</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($examenes as $key => $ex): ?>
                                  <?php $resultado = $this->requestAction(array('controller' => 'Resultados', 'action' => 'get_res_pac', $idPaciente, $amp['numero'], $ex['Examene']['id'])) ?>
                                  <tr>
                                      <td class="hidden-xs"><?php echo $key + 1; ?></td>
                                      <td><?php echo $ex['Examene']['nombre'] ?></td>
                                      <?php if (!empty($resultado)): ?>
                                        <td class="hidden-xs">
                                            <?php echo $resultado['Resultado']['descripcion']; ?>
                                        </td>
                                        <td class="success">
                                            <h3><?= $r_pen = $this->requestAction(array('controller' => 'Resultados', 'action' => 'get_res_pen', $resultado['Resultado']['id'])) ?></h3>

                                        </td>
                                        <td class="hidden-xs"><?php echo $resultado['PacientesResultado']['observacion']; ?></td>

                                        <td>
                                            <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Resultados', 'action' => 'pac_examen', $idPaciente, $amp['numero'], $ex['Examene']['id'], $resultado['PacientesResultado']['id'])) ?>')" class="btn btn-info btn-flat"><i class="fa fa-edit"></i></a>
                                        </td>
                                      <?php else: ?>
                                        <td></td>
                                        <td class="hidden-xs"></td>
                                        <td>
                                            <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Resultados', 'action' => 'pac_examen', $idPaciente, $amp['numero'], $ex['Examene']['id'])) ?>')" class="btn btn-success btn-flat"><i class="fa fa-plus"></i></a>
                                        </td>
                                      <?php endif; ?>
                                  </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php $tratamiento = $this->requestAction(array('controller' => 'Tratamientos', 'action' => 'get_trat_pac', $idPaciente, $amp['numero'])) ?>
        <?php if (!empty($tratamiento)): ?>
          <div class="row">
              <div class="col-md-12">
                  <div class="box box-danger">
                      <div class="box-header text-center">
                          <h3 class="box-title">TRATAMIENTO</h3>
                          <div class="box-tools pull-right">
                              <button class="btn btn-box-tool" title="Registrar Ampollas en la mucosa" onclick="cargarmodal('<?= $this->Html->url(['controller' => 'Tratamientos', 'action' => 'pac_tratamiento', $idPaciente, $amp['numero'], $tratamiento['Tratamiento']['id']]) ?>')"><i class="fa fa-edit"></i></button>
                          </div>
                      </div>
                      <div class="box-body">
                          <p>
                              <?php echo $tratamiento['Tratamiento']['descripcion']; ?>
                          </p>
                      </div>
                  </div>
              </div>
          </div>
        <?php else: ?>
          <div class="row">
              <div class="col-md-12">
                  <a class="btn btn-block btn-info btn-lg col-md-12" href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Tratamientos', 'action' => 'pac_tratamiento', $idPaciente, $amp['numero'])) ?>');">REGISTRAR TRATAMIENTO</a>
              </div>
          </div>
        <?php endif; ?>
        <br>
        <div class="row">
            <div class="col-md-12">
                <?php echo $this->Html->link('TRANSFERIR PASIENTE', array('controller' => 'Medicos', 'action' => 'dermatologos', $paciente['Paciente']['id']), array('class' => 'btn btn-block btn-primary btn-lg col-md-12')); ?>
            </div>
        </div>
      <?php else: ?>
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info"></i> Diagnostico</h4>
            SE DIAGNOSTICO QUE EL PACIENTE NO PRESENTA PENFIGO, ESTO DEBIDO A QUE EL PACIENTE NO PRESENTA AMPOLLAS.
        </div>

      <?php endif; ?>
    <?php endforeach; ?>
</section>
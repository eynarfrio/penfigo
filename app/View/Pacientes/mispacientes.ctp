
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Mis Pacientes</h3>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-bordered table-striped tabla-date">
                <thead>
                    <tr>
                        <th class="hidden-xs">Id</th>
                        <th>Nombre Completo</th>
                        <th class="hidden-xs">C.I.</th>
                        <th class="hidden-xs">Sexo</th>
                        <th class="hidden-xs">Telefonos</th>
                        <th class="hidden-xs">Lugar</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pacientes as $pa): ?>
                      <tr>
                          <td class="hidden-xs"><?php echo $pa['Paciente']['id']; ?></td>
                          <td><?php echo $pa['Paciente']['nombres'] . ' ' . $pa['Paciente']['ap_paterno'] . ' ' . $pa['Paciente']['ap_materno'] ?></td>
                          <td class="hidden-xs"><?php echo $pa['Paciente']['ci']; ?></td>
                          <td class="hidden-xs"><?php echo $pa['Paciente']['sexo']; ?></td>
                          <td class="hidden-xs"><?php echo $pa['Paciente']['telefonos']; ?></td>
                          <td class="hidden-xs"><?php echo $pa['Paciente']['lugar']; ?></td>
                          <td>
                              <?php echo $this->Html->link('Editar', ['action' => 'paciente', $pa['Paciente']['id']]); ?>
                 <?= $this->Html->link("Ver paciente", ['action' => 'datos', $pa['Paciente']['id']]) ?>
                              <?= $this->Html->link('Sintomas', ['controller' => 'Sintomas', 'action' => 'pacientesintomas']) ?>
                              <!--amor-->
                          </td>
                      </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</section><!-- /.content -->


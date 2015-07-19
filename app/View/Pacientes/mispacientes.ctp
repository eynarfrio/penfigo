
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Mis Pacientes</h3>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-bordered table-striped tabla-date">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre Completo</th>
                        <th>C.I.</th>
                        <th>Sexo</th>
                        <th>Telefonos</th>
                        <th>Lugar</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pacientes as $pa): ?>
                      <tr>
                          <td><?php echo $pa['Paciente']['id']; ?></td>
                          <td><?php echo $pa['Paciente']['nombres'] . ' ' . $pa['Paciente']['ap_paterno'] . ' ' . $pa['Paciente']['ap_materno'] ?></td>
                          <td><?php echo $pa['Paciente']['ci']; ?></td>
                          <td><?php echo $pa['Paciente']['sexo']; ?></td>
                          <td><?php echo $pa['Paciente']['telefonos']; ?></td>
                          <td><?php echo $pa['Paciente']['lugar']; ?></td>
                          <td>
                              <?php echo $this->Html->link('Editar', ['action' => 'paciente', $pa['Paciente']['id']]); ?>
                              <?= $this->Html->link('Sintomas',['controller' => 'Sintomas','action' => 'pacientesintomas']) ?>
                          </td>
                      </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</section><!-- /.content -->


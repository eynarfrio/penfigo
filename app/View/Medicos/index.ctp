
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Medicos</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered table-striped tabla-date">
                <thead>
                    <tr>
                        <th class="hidden-xs">Id</th>
                        <th>Nombre Completo</th>
                        <th class="hidden-xs">C.I.</th>
                        <th class="hidden-xs">Sexo</th>
                        <th class="hidden-xs">Telefonos</th>
                        <th class="hidden-xs">Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($medicos as $me): ?>
                      <tr>
                          <td class="hidden-xs" align="center" style="background: #3c8dbc;">
                              <?php if ($me['Medico']['sexo'] == 'Masculino'): ?>
                                <img src="<?php echo $this->webroot; ?>imagenes/doctor-icono.jpg" height="40px" width="40px" class="img-circle" alt="User Image">
                              <?php else: ?>
                                <img src="<?php echo $this->webroot; ?>imagenes/doctora-icono.jpg" height="40px" width="40px" class="img-circle" alt="User Image">
                              <?php endif; ?>
                          </td>
                          <td><?php echo $me['Medico']['nombres'] . ' ' . $me['Medico']['ap_paterno'] . ' ' . $me['Medico']['ap_materno'] ?></td>
                          <td class="hidden-xs"><?php echo $me['Medico']['ci']; ?></td>
                          <td class="hidden-xs"><?php echo $me['Medico']['sexo']; ?></td>
                          <td class="hidden-xs"><?php echo $me['Medico']['telefonos']; ?></td>
                          <td class="hidden-xs"><?php echo $me['Medico']['tipo_medico']; ?></td>
                          <td>
                              <?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'ver', $me['Medico']['id']], array('class' => 'btn btn-primary btn-flat', 'escape' => false, 'title' => 'Datos del Medico')) ?>
                          </td>
                      </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</section><!-- /.content -->


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Lista de Usuarios</h1>
</section>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Usuarios</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped tabla-date">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Role</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $us): ?>
                      <tr>
                          <td><?php echo $us['User']['id'] ?></td>
                          <td><?php echo $us['User']['username'] ?></td>
                          <td><?php echo $us['User']['role'] ?></td>
                          <td>
                              <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'user',$us['User']['id'])) ?>');">Editar</a>
                              <?php echo $this->Html->link('Eliminar',array('action' => 'delete',$us['User']['id']),array('confirm' => 'Esta seguro de eliminar al usuario '.$us['User']['username']))?>
                          </td>
                      </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div><!-- /.box-body -->

    </div><!-- /.box -->

</section><!-- /.content -->
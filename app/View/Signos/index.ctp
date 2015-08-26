
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de signos</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped tabla-date">
                        <thead>
                            <tr>
                                <th class="hidden-xs">Id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($signos as $sig): ?>
                                <tr>
                                    <td class="hidden-xs"><?php echo $sig['Signo']['id']; ?></td>
                                    <td><?php echo $sig['Signo']['nombre']; ?></td>
                                    <td><?php echo $sig['Signo']['descripcion']; ?></td>      
                                    <td>
                                        <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'signo', $sig['Signo']['id'])); ?>');" class="btn btn-info" ><i class="glyphicon glyphicon-edit icon-white"></i>Editar</a>
                                        <a href="javascript:" class="btn btn-danger" onclick="if (confirm('Esta seguro de eliminar <?php echo $sig['Signo']['nombre'] ?>??')) {
                                                    window.location = '<?php echo $this->Html->url(array('action' => 'delete', $sig['Signo']['id'])); ?>';
                                                }"><i class="glyphicon glyphicon-trash icon-white"></i>Eliminar</a>
                                    </td>
                                </tr>
<?php endforeach; ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

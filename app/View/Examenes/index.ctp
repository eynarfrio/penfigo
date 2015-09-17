<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de Examenes</h3>
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
                            <?php foreach ($examenes as $ex): ?>
                                <tr>
                                    <td class="hidden-xs"><?php echo $ex['Examene']['id']; ?></td>
                                    <td><?php echo $ex['Examene']['nombre']; ?></td>
                                    <td><?php echo $ex['Examene']['descripcion']; ?></td>      
                                    <td>
                                        <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'examen', $ex['Examene']['id'])); ?>');" class="btn btn-info" ><i class="glyphicon glyphicon-edit icon-white"></i>Editar</a>
                                        <a href="javascript:" class="btn btn-danger" onclick="if (confirm('Esta seguro de eliminar <?php echo $ex['Examene']['id'] ?>??')) {
                                                    window.location = '<?php echo $this->Html->url(array('action' => 'delete', $ex['Examene']['id'])); ?>';
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

<section class="content">
    <div class="row">
        <div class="col-xs-12">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de Laboratorios</h3>
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
                            <?php foreach ($laboratorios as $lab): ?>
                                <tr>
                                    <td class="hidden-xs"><?php echo $lab['Laboratorio']['id']; ?></td>
                                    <td><?php echo $lab['Laboratorio']['nombre']; ?></td>
                                    <td><?php echo $lab['Laboratorio']['descripcion']; ?></td>      
                                    <td>
                                        <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'laboratorio', $lab['Laboratorio']['id'])); ?>');" class="btn btn-info" ><i class="glyphicon glyphicon-edit icon-white"></i>Editar</a>
                                        <a href="javascript:" class="btn btn-danger" onclick="if (confirm('Esta seguro de eliminar <?php echo $lab['Laboratorio']['nombre'] ?>??')) {
                                                    window.location = '<?php echo $this->Html->url(array('action' => 'delete', $lab['Laboratorio']['id'])); ?>';
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
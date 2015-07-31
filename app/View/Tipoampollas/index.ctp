
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de tipo de ampollas</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped tabla-date">
                        <thead>
                            <tr>
                                <th class="hidden-xs">Id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Imagen</th>
                                <th>Tipo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tampollas as $tam): ?>
                                <tr>
                                    <td class="hidden-xs"><?php echo $tam['Tipoampolla']['id']; ?></td>
                                    <td><?php echo $tam['Tipoampolla']['nombre']; ?></td>
                                    <td><?php echo $tam['Tipoampolla']['descripcion'];?></td>
                                    <td><?php echo $tam['Tipoampolla']['imagen'];?></td>
                                    <td><?php echo $tam['Tipoampolla']['tipo']?></td>
                                    <td>
                                        <a href="<?php echo $this->Html->url(array('action' => 'tipoampolla', $tam['Tipoampolla']['id'])); ?> " class="btn btn-info" ><i class="glyphicon glyphicon-edit icon-white"></i>Editar</a>
                                        <a href="javascript:" class="btn btn-danger" onclick="if (confirm('Esta seguro de eliminar <?php echo $tam['Tipoampolla']['nombre'] ?>??')) {
                                                    window.location = '<?php echo $this->Html->url(array('action' => 'delete', $tam['Tipoampolla']['id'])); ?>';}"><i class="glyphicon glyphicon-trash icon-white"></i>Eliminar</a>
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

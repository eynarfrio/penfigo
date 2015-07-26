
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de sintomas en la Piel</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped tabla-date">
                        <thead>
                            <tr>
                                <th class="hidden-xs">Id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($psintomas as $psin): ?>
                                <tr>
                                    <td class="hidden-xs"><?php echo $psin['Pielsintoma']['id']; ?></td>
                                    <td><?php echo $psin['Pielsintoma']['nombre']; ?></td>
                                    <td><?php echo $psin['Pielsintoma']['descripcion'];?></td>
                                    <td><?php echo $psin['Pielsintoma']['imagen'];?></td>
                                    <td>
                                        <a href="<?php echo $this->Html->url(array('action' => 'pielsintoma', $psin['Pielsintoma']['id'])); ?> " class="btn btn-info" ><i class="glyphicon glyphicon-edit icon-white"></i>Editar</a>
                                        <a href="javascript:" class="btn btn-danger" onclick="if (confirm('Esta seguro de eliminar <?php echo $psin['Pielsintoma']['nombre'] ?>??')) {
                                                    window.location = '<?php echo $this->Html->url(array('action' => 'delete', $psin['Pielsintoma']['id'])); ?>';}"><i class="glyphicon glyphicon-trash icon-white"></i>Eliminar</a>
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

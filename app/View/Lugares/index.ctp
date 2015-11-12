
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de Lugares</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped tabla-date">
                        <thead>
                            <tr>
                                <th class="hidden-xs">Id</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ciudades as $lug): ?>
                                <tr>
                                    <td class="hidden-xs"><?php echo $lug['Lugare']['id']; ?></td>
                                    <td><?php echo $lug['Lugare']['nombre']; ?></td>
                                    <td>
                                        <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'lugar', $lug['Lugare']['id'])); ?>');" class="btn btn-info" ><i class="glyphicon glyphicon-edit icon-white"></i>Editar</a>
                                       <!-- <a href="<?php //echo $this->Html->url(array('action' => 'lugar', $lug['Lugare']['id'])); ?> " class="btn btn-info" ><i class="glyphicon glyphicon-edit icon-white"></i>Editar</a>-->
                                        <a href="javascript:" class="btn btn-danger" onclick="if (confirm('Esta seguro de eliminar <?php echo $lug['Lugare']['nombre'] ?>??')) {
                                                    window.location = '<?php echo $this->Html->url(array('action' => 'delete', $lug['Lugare']['id'])); ?>';}"><i class="glyphicon glyphicon-edit icon-white"></i>Eliminar</a>
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

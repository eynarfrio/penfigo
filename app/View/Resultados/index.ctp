
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de resultados</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped tabla-date">
                        <thead>
                            <tr>
                                <th class="hidden-xs">Id</th>
                                <th>Penfigo</th>
                                <th>Examen</th>
                                <th>Descripcion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultados as $res): ?>
                                <tr>
                                    <td class="hidden-xs"><?php echo $res['Resultado']['id']; ?></td>
                                    <td><?php echo $res['Penfigo']['nombre']; ?></td>
                                    <td><?php echo $res['Examene']['nombre']; ?></td>
                                    <td><?php echo $res['Resultado']['descripcion']; ?></td>      
                                    <td>
                                        <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'resultado', $res['Resultado']['id'])); ?>');" class="btn btn-info" ><i class="glyphicon glyphicon-edit icon-white"></i>Editar</a>
                                        <a href="javascript:" class="btn btn-danger" onclick="if (confirm('Esta seguro de eliminar <?php echo $res['Resultado']['id'] ?>??')) {
                                                    window.location = '<?php echo $this->Html->url(array('action' => 'delete', $res['Resultado']['id'])); ?>';
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
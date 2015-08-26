
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de Areas</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped tabla-date">
                        <thead>
                            <tr>
                                <th class="hidden-xs">Id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Tipo</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($areas as $ar): ?>
                                <tr>
                                    <td class="hidden-xs"><?php echo $ar['Area']['id']; ?></td>
                                    <td><?php echo $ar['Area']['nombre']; ?></td>
                                    <td><?php echo $ar['Area']['descripcion'];?></td>
                                    <td><?php echo $ar['Area']['tipo']?></td>
                                    <td class=" text-center">
                                        <?php if (!empty($ar['Area']['imagen'])): ?>
                                            <img src="<?php echo $this->webroot; ?>imagenes/<?php echo $ar['Area']['imagen']; ?>" height="75px" width="75px">
                                        <?php else: ?>
                                            <img src="<?php echo $this->webroot; ?>imagenes/instagram-Beta.png" height="75px" width="75px">
                                        <?php endif; ?> 
                                    </td>  
                                    <td>
                                         <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'area', $ar['Area']['id'])); ?>');" class="btn btn-info" ><i class="glyphicon glyphicon-edit icon-white"></i>Editar</a>
                                        <a href="javascript:" class="btn btn-danger" onclick="if (confirm('Esta seguro de eliminar <?php echo $ar['Area']['nombre'] ?>??')) {
                                                    window.location = '<?php echo $this->Html->url(array('action' => 'delete', $ar['Area']['id'])); ?>';
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

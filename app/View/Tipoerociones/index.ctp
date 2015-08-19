
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de tipo de erosiones</h3>
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
                            <?php foreach ($terociones as $ter): ?>
                                <tr>
                                    <td class="hidden-xs"><?php echo $ter['Tipoerocione']['id']; ?></td>
                                    <td><?php echo $ter['Tipoerocione']['nombre']; ?></td>
                                    <td><?php echo $ter['Tipoerocione']['descripcion']; ?></td>
                                    <td class=" text-center">
                                        <?php if (!empty($ter['Tipoerocione']['imagen'])): ?>
                                            <img src="<?php echo $this->webroot; ?>imagenes/<?php echo $ter['Tipoerocione']['imagen']; ?>" height="75px" width="75px">
                                        <?php else: ?>
                                            <img src="<?php echo $this->webroot; ?>imagenes/instagram-Beta.png" height="75px" width="75px">
                                        <?php endif; ?> 
                                    </td>       
                                    <td>
                                        <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'tipoerocion', $ter['Tipoerocione']['id'])); ?>');" class="btn btn-info" ><i class="glyphicon glyphicon-edit icon-white"></i>Editar</a>
                                        <a href="javascript:" class="btn btn-danger" onclick="if (confirm('Esta seguro de eliminar <?php echo $ter['Tipoerocione']['nombre'] ?>??')) {
                                                    window.location = '<?php echo $this->Html->url(array('action' => 'delete', $ter['Tipoerocione']['id'])); ?>';
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

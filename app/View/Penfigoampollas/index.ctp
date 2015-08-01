
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado Ampollas por penfigos</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped tabla-date">
                        <thead>
                            <tr>
                                <th class="hidden-xs">Id</th>
                                <th>Penfigo</th>
                                <th>Area</th>
                                <th>Tipo de Ampolla</th>
                                <th>Importancia</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pampollas as $pam): ?>
                                <tr>
                                    <td class="hidden-xs"><?php echo $pam['Penfigoampolla']['id']; ?></td>
                                    <td><?php echo $pam['Penfigoampolla']['penfigo_id']; ?></td>
                                    <td><?php echo $pam['Penfigoampolla']['area_id'];?></td>
                                    <td><?php echo $pam['Penfigoampolla']['tipoampolla_id'];?></td>
                                    <td><?php echo $pam['Penfigoampolla']['importancia']?></td>
                                    <td>
                                        <a href="<?php echo $this->Html->url(array('action' => 'penfigoampolla', $pam['Penfigoampolla']['id'])); ?> " class="btn btn-info" ><i class="glyphicon glyphicon-edit icon-white"></i>Editar</a>
                                        <a href="javascript:" class="btn btn-danger" onclick="if (confirm('Esta seguro de eliminar <?php echo $pam['Penfigoampolla']['id'] ?>??')) {
                                                    window.location = '<?php echo $this->Html->url(array('action' => 'delete', $pam['Penfigoampolla']['id'])); ?>';}"><i class="glyphicon glyphicon-trash icon-white"></i>Eliminar</a>
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

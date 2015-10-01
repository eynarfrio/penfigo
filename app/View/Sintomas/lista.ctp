
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Sintomas</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered table-striped tabla-date">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Sintoma</th>
                        <th>Descripcion</th>
                       <!-- <th>Accion</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sintomas as $sin):?>
                    <tr>
                        <td><?php echo $sin['Sintoma']['id']?></td>
                        <td><?php echo $sin['Sintoma']['nombre']?></td>
                        <td><?php echo $sin['Sintoma']['descripcion']?></td>
                       <!-- <td>
                            <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Sintomas','action' => 'sintoma',$sin['Sintoma']['id'])) ?>');" class="btn btn-warning btn-flat"><i class="fa fa-edit"></i></a>
                          <?= $this->Html->link('<i class="fa fa-trash"></i>', ['action' => 'eliminar', $sin['Sintoma']['id']], array('class' => 'btn btn-danger btn-flat', 'escape' => false, 'title' => 'Eliminar Sintoma','confirm' => 'Esta seguro de eliminar al sintoma??')) ?>
                        </td>-->
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>

</section><!-- /.content -->


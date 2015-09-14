<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Listado de Penfigos</h1>
</section>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Penfigos</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped tabla-date">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($penfigos as $pe): ?>
                      <tr>
                          <td><?php echo $pe['Penfigo']['id'] ?></td>
                          <td><?php echo $pe['Penfigo']['nombre'] ?></td>
                          <td><?php echo $pe['Penfigo']['descripcion'] ?></td>
                          <td>
                              <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'penfigo',$pe['Penfigo']['id'])) ?>');">Editar</a>
                              <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Penfigosintomas','action' => 'penfigosintoma',$pe['Penfigo']['id'])) ?>');">Sintomas</a>
                              <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Penfigoampollas','action'=>'penfigoampolla',$pe['Penfigo']['id']))?>');">Ampollas</a>
                              <!--<a href="javascript:" onclick="cargarmodal('<?php //echo $this->Html->url(array('controller' => 'Penfigoerociones','action' => 'penfigoerocion',$pe['Penfigo']['id'])) ?>');">Erosiones</a>-->
                              <?php echo $this->Html->link('Eliminar',array('action' => 'delete',$pe['Penfigo']['id']),array('confirm' => 'Esta seguro de eliminar al usuario '.$pe['Penfigo']['nombre']))?>
                          </td>
                      </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div><!-- /.box-body -->

    </div><!-- /.box -->

</section><!-- /.content -->
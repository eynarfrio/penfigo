
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Ampollas de <?php echo $penfigo['Penfigo']['nombre']; ?></h4>
</div>
<div class="modal-body">
    <?php echo $this->Form->create('Penfigoampolla', ['action' => "registra/$idPenfigo", 'id' => 'ajaxform']) ?>
    <?php echo $this->Form->hidden('penfigo_id', array('value' => $idPenfigo)); ?>
    <div class="form-group">
       <!-- <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <?php echo $this->Form->select('area_id', $arampollas, array('class' => 'form-control', 'empty' => 'Seleccione area', 'required')); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?php echo $this->Form->select('tipoampolla_id', $tampolla, array('class' => 'form-control', 'empty' => 'Seleccione tipo', 'required')); ?>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="form-group">
                    <?php echo $this->Form->select('importancia', array(1 => 'Importante'), array('class' => 'form-control')); ?>
                </div>
            </div>
        </div>-->
        <div class="row">
            <div class="col-md-4 text-right">
            </div>
            <div class="col-md-4 text-right">
            </div>
            <!--<div class="col-md-4 text-right">
                <div class="form-group">
                    <button type="submit" class="btn btn-outline col-md-12">Registrar</button>
                </div>
            </div>-->
        </div>
    </div>
    <?php echo $this->Form->end() ?>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tbody>
                    <?php foreach ($pampolla as $pam): ?>
                        <tr>
                            <th><?php echo $pam['Area']['nombre'] ?></th>
                            <th><?php echo $pam['Tipoampolla']['nombre'].' ('.$pam['Tipoampolla']['tipo'].')'?></th>
                          <!--  <th>
                                <?php
                                if ($pam['Penfigoampolla']['importancia']) {
                                    echo 'Importante';
                                }
                                ?>
                            </th>
                            <th>
                                <a href="javascript:" class="label label-danger" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'elimina', $idPenfigo,$pam['Penfigoampolla']['id'])); ?>');">Eliminar</a>
                            </th>-->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
</div>
<script>
    $("#ajaxform").submit(function(e)
    {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax(
                {
                    url: formURL,
                    type: "POST",
                    data: postData,
                    /*beforeSend:function (XMLHttpRequest) {
                     alert("antes de enviar");
                     },
                     complete:function (XMLHttpRequest, textStatus) {
                     alert('despues de enviar');
                     },*/
                    success: function(data, textStatus, jqXHR)
                    {
                        //data: return data from server
                        //$("#parte").html(data);
                        cargarmodal('<?php echo $this->Html->url(array('action' => 'penfigoampolla', $idPenfigo)); ?>');
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        //if fails   
                        alert("error");
                    }
                });
        e.preventDefault(); //STOP default action
    });
</script>

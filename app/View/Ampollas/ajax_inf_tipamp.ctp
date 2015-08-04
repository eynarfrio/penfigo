<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><?php echo $tipoa['Tipoampolla']['nombre'] ?></h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12" align="center">
            <?php if (!empty($tipoa['Tipoampolla']['imagen'])): ?>
              <img src="<?php echo $this->webroot; ?>imagenes/<?php echo $tipoa['Tipoampolla']['imagen']; ?>" height="200px" width="200px">
            <?php else: ?>
              <img src="<?php echo $this->webroot; ?>imagenes/instagram-Beta.png" height="200px" width="200px">
            <?php endif; ?> 
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12" >
            <p>
                <?php echo $tipoa['Tipoampolla']['descripcion'] ?>
            </p>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
</div>


<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><?php echo $area['Area']['nombre']?></h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12" align="center">
            <?php if (!empty($area['Area']['imagen'])): ?>
              <img src="<?php echo $this->webroot; ?>imagenes/<?php echo $area['Area']['imagen']; ?>" height="280px" width="280px">
            <?php else: ?>
              <img src="<?php echo $this->webroot; ?>imagenes/instagram-Beta.png" height="280px" width="280px">
            <?php endif; ?> 
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
</div>

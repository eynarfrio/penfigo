<?php if (!empty($idPenfigo)): ?>
  <div class="row">
      <div class="col-md-12">
          <div class="box box-primary">
              <div class="box-header text-center">
                  <h3 class="box-title">Diagnostico Final</h3>
              </div>
              <div class="box-body">
                  <p style="font-style: italic;font-size: 16px;">
                      <?php if ($penfigos['diagnostico'] >= 51): ?>
                        <?php
                        echo "$diagnostico <br> El pre-diagnostico con un resultado  de " . $penfigos['diagnostico'] . "% y junto con el examen de Biopsia han confirmado que el paciente tiene: ";
                        ?>
                        <span class="text-aqua" style="font-size: 19px;font-weight: bold;"><?php echo $penfigo['Penfigo']['nombre']; ?></span>
                      <?php else: ?>
                        <?php
                        echo "$diagnostico <br>Pese a que el pre-diagnostico no ha apoyado al resultado gracias al examen de biopsia se ha determinado que el paciente tiene: ";
                        ?>
                        <span class="text-aqua" style="font-size: 19px;font-weight: bold;"><?php echo $penfigo['Penfigo']['nombre']; ?></span>
                      <?php endif; ?>
                  </p>
                  <?php if ($penfigo['Penfigo']['nombre'] == 'Penfigoide'): ?>
                    <div class="row hidden-xs">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-8" align="center">
                            <img src="<?php echo $this->webroot; ?>imagenes/instagram-Beta.png" height="530px;" width="100%">
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                  <?php endif; ?>
                  <h3 class="text-center text-success">TRATAMIENTO</h3>
                  <p style="font-style: italic;font-size: 16px;">
                      <?php
                      $tratamiento = $this->requestAction(array('controller' => 'Tratamientos', 'action' => 'get_trat_pac',$idPaciente,$numero));
                      if (!empty($tratamiento)) {
                        echo $tratamiento['Tratamiento']['descripcion'];
                      } else {
                        echo $penfigo['Penfigo']['tratamiento'];
                      }
                      ?>
                  </p>
              </div>
          </div>
      </div>
  </div>
  <script>
    $('#b-edit-trat').show(400);
  </script>
<?php endif; ?>
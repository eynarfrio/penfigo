<?php if ($verifica):?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nro</th>
            <th>Penfigo</th>
            <th>Grado</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($penfigos as $key => $pe): ?>
          <?php
          $stilo = 'style="background-color: #FF9891;"';
          if ($pe['diagnostico'] >= 51) {
            $stilo = 'style="background-color: #A5FF8B;"';
          }
          ?>
          <tr <?php echo $stilo; ?>>
              <td ><?php echo ($key + 1); ?></td>
              <td><?php echo $pe['Penfigo']['nombre']; ?></td>
              <td><?php echo $pe['diagnostico'].'%'; ?></td>
          </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php endif;?>
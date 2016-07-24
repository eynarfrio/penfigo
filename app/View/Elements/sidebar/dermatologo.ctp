<?php $medico = $this->requestAction(['controller' => 'Medicos', 'action' => 'get_medico']); ?>
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <?php if (!empty($medico['User']['imagen'])): ?>
                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($medico['User']['imagen']) . '" class="img-circle" alt="User Image"/>'; ?>
            <?php elseif ($medico['Medico']['sexo'] == 'Masculino'): ?>
                <img src="<?php echo $this->webroot; ?>imagenes/doctor-icono.jpg" class="img-circle" alt="User Image" />
            <?php else: ?>
                <img src="<?php echo $this->webroot; ?>imagenes/doctora-icono.jpg" class="img-circle" alt="User Image" />
            <?php endif; ?>
        </div>
        <div class="pull-left info">
            <p><?php echo $medico['Medico']['nombres']; ?></p>
            <?php if ($medico['Medico']['estado'] == 'En espera'): ?>
              <?php $disables = 'disabled'; ?>
              <a href="javascript:"><i class="fa fa-circle text-warning"></i> <?php echo $medico['Medico']['estado'] ?></a>
            <?php else: ?>
              <a href="javascript:"><i class="fa fa-circle text-success"></i> <?php echo $medico['Medico']['estado'] ?></a>
            <?php endif; ?>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">MENU NAVEGACION</li>
        <li><a href="<?php echo $this->Html->url(['controller' => 'Medicos', 'action' => 'ver', $this->Session->read('Auth.User.id')]); ?>"><i class="fa fa-user"></i> <span>Perfil</span></a></li>
        <?php if ($medico['Medico']['estado'] == 'Activo'): ?>
          <li class="treeview">
              <a href="javascript:">
                  <i class="fa fa-wheelchair"></i> <span>Pacientes</span>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li><a href="<?php echo $this->Html->url(['controller' => 'Pacientes', 'action' => 'mispacientes']); ?>"><i class="fa fa-circle-o"></i> Mis Pacientes</a></li>
                  <li><a href="<?php echo $this->Html->url(['controller' => 'Pacientes', 'action' => 'pacientes']); ?>"><i class="fa fa-circle-o"></i> Todos los pacientes</a></li>
                  <li><a href="<?php echo $this->Html->url(['controller' => 'Pacientes', 'action' => 'paciente']); ?>"><i class="fa fa-circle-o"></i> Nuevo Paciente</a></li>
              </ul>
          </li>
        <?php endif; ?>
        <li><a href="<?php echo $this->Html->url(['controller' => 'Medicos', 'action' => 'index']); ?>"><i class="fa fa-stethoscope"></i> <span>Medicos</span></a></li>
        <li><a href="<?php echo $this->Html->url(['controller' => 'Medicos', 'action' => 'informacion']); ?>"><i class="fa fa-book"></i> <span>Informacion</span></a></li>

    </ul>
</section>
<!-- /.sidebar -->


<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo $this->webroot; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
            <?php $medico = $this->requestAction(['controller' => 'Medicos', 'action' => 'get_medico']); ?>
            <p><?php echo $medico['Medico']['nombres']; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">MENU NAVEGACION</li>
        <li><a href="<?php echo $this->Html->url(['controller' => 'Medicos', 'action' => 'form_medico']); ?>"><i class="fa fa-user"></i> <span>Perfil</span></a></li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-wheelchair"></i> <span>Pacientes</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Html->url(['controller' => 'Pacientes', 'action' => 'mispacientes']); ?>"><i class="fa fa-circle-o"></i> Mis Pacientes</a></li>
                <li><a href="<?php echo $this->Html->url(['controller' => 'Pacientes', 'action' => 'pacientes']); ?>"><i class="fa fa-circle-o"></i> Todos los pacientes</a></li>
                <li><a href="<?php echo $this->Html->url(['controller' => 'Pacientes', 'action' => 'paciente']); ?>"><i class="fa fa-circle-o"></i> Nuevo Paciente</a></li>
            </ul>
        </li>
        <li><a href="<?php echo $this->Html->url(['controller' => 'Medicos', 'action' => 'index']); ?>"><i class="fa fa-stethoscope"></i> <span>Medicos</span></a></li>
        <li><a href="<?php echo $this->Html->url(['controller' => 'Medicos', 'action' => 'form_medico']); ?>"><i class="fa fa-bar-chart"></i> <span>Reportes</span></a></li>
        <li><a href="<?php echo $this->Html->url(['controller' => 'Medicos', 'action' => 'form_medico']); ?>"><i class="fa fa-book"></i> <span>Informacion</span></a></li>
        <li class="treeview">
            <a href="#">
                <i class="glyphicon glyphicon-globe"></i> <span>Lugares</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Html->url(['controller' => 'Lugares', 'action' => 'index']); ?>"><i class="fa fa-circle-o"></i> Listado</a></li>
                <li><a href="<?php echo $this->Html->url(['controller' => 'Lugares', 'action' => 'lugar']); ?>"><i class="fa fa-circle-o"></i> Nuevo Lugar</a></li>          
            </ul>
        </li>
    </ul>
</section>
<!-- /.sidebar -->
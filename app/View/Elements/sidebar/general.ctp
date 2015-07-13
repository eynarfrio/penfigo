<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo $this->webroot; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
            <?php $medico = $this->requestAction(['controller' => 'Medicos','action' => 'get_medico']);?>
            <p><?php echo $medico['Medico']['nombres'];?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">MENU NAVEGACION</li>
        <li><a href="<?php echo $this->Html->url(['controller' => 'Medicos','action' => 'form_medico']);?>"><i class="fa fa-user"></i> <span>Perfil</span></a></li>
        <li><a href="<?php echo $this->Html->url(['controller' => 'Medicos','action' => 'form_medico']);?>"><i class="fa fa-wheelchair"></i> <span>Mis Pacientes</span></a></li>
        <li><a href="<?php echo $this->Html->url(['controller' => 'Medicos','action' => 'form_medico']);?>"><i class="fa fa-users"></i> <span>Todos Pacientes</span></a></li>
        <li><a href="<?php echo $this->Html->url(['controller' => 'Medicos','action' => 'form_medico']);?>"><i class="fa fa-stethoscope"></i> <span>Medicos</span></a></li>
        <li><a href="<?php echo $this->Html->url(['controller' => 'Medicos','action' => 'form_medico']);?>"><i class="fa fa-bar-chart"></i> <span>Reportes</span></a></li>
        <li><a href="<?php echo $this->Html->url(['controller' => 'Medicos','action' => 'form_medico']);?>"><i class="fa fa-book"></i> <span>Informacion</span></a></li>
    </ul>
</section>
<!-- /.sidebar -->
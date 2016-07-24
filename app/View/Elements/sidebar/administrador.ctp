<?php
$usuario = $this->requestAction(array('controller' => 'Medicos', 'action' => 'get_medico'));
?>
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <?php if (!empty($usuario['User']['imagen'])): ?>
                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($usuario['User']['imagen']) . '" class="img-circle" alt="User Image"/>'; ?>
            <?php elseif ($usuario['Medico']['sexo'] == 'Masculino'): ?>
                <img src="<?php echo $this->webroot; ?>imagenes/doctor-icono.jpg" class="img-circle" alt="User Image" />
            <?php else: ?>
                <img src="<?php echo $this->webroot; ?>imagenes/doctora-icono.jpg" class="img-circle" alt="User Image" />
            <?php endif; ?>

        </div>
        <div class="pull-left info">
            <p><?php echo $usuario['User']['username']; //$this->Session->read('Auth.User.username');   ?></p>
            <a href="javascript:"> <?php echo $usuario['User']['role']; //$this->Session->read('Auth.User.role');   ?></a>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">MENU NAVEGACION</li>
        <li class="treeview">
            <a href="#">
                <i class="glyphicon glyphicon-user"></i> <span>Usuarios</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Html->url(['controller' => 'Users', 'action' => 'index']); ?>"><i class="fa fa-circle-o"></i> Listado</a></li>
                <li><a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(['controller' => 'Users', 'action' => 'user']); ?>')"><i class="fa fa-circle-o"></i>Nuevo Usuario</a></li>         
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="glyphicon glyphicon-user"></i> <span>Medicos</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Html->url(['controller' => 'Medicos', 'action' => 'lista']); ?>"><i class="fa fa-circle-o"></i>Listado de Medicos</a></li>
                <li><a href="<?php echo $this->Html->url(['controller' => 'Medicos', 'action' => 'medico']); ?>" ><i class="fa fa-circle-o"></i>Nuevo Medico</a></li>         
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="glyphicon glyphicon-globe"></i> <span>Lugares</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Html->url(['controller' => 'Lugares', 'action' => 'index']); ?>"><i class="fa fa-circle-o"></i> Listado</a></li>
                <li><a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Lugares', 'action' => 'lugar')) ?>');"><i class="fa fa-circle-o"></i>Nuevo Lugar</a></li>         
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="glyphicon glyphicon-eye-open"></i> <span>Sintomas</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Html->url(['controller' => 'Sintomas', 'action' => 'lista']); ?>"><i class="fa fa-circle-o"></i> Listado</a></li>
                <!--<li><a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Sintomas', 'action' => 'sintoma')) ?>');"><i class="fa fa-circle-o"></i>Nuevo Lugar</a></li>  -->       
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="glyphicon glyphicon-search"></i><span>Sintomas en la Piel</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Html->url(['controller' => 'Pielsintomas', 'action' => 'index']); ?>"><i class="fa fa-circle-o"></i>Listado</a></li>
                <!--<li><a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Pielsintomas', 'action' => 'pielsintoma')) ?>');"><i class="fa fa-circle-o"></i>Nuevo Sintoma en la Piel</a></li> --> 
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="glyphicon glyphicon-question-sign"></i><span>Tipo de Ampollas</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Html->url(['controller' => 'Tipoampollas', 'action' => 'index']); ?>"><i class="fa fa-circle-o"></i>Listado</a></li>
                <!--<li><a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Tipoampollas', 'action' => 'tipoampolla')) ?>');"><i class="fa fa-circle-o"></i>Nuevo Tipo de Ampolla</a></li> -->
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="glyphicon glyphicon-picture"></i><span>Penfigo</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Html->url(['controller' => 'Penfigos', 'action' => 'index']); ?>"><i class="fa fa-circle-o"></i>Listado</a></li>
               <!-- <li><a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(['controller' => 'Penfigos', 'action' => 'penfigo']); ?>');"><i class="fa fa-circle-o"></i>Nuevo</a></li>-->
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-street-view"></i><span>Areas</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Html->url(['controller' => 'Areas', 'action' => 'index']); ?>"><i class="fa fa-circle-o"></i>Listado</a></li>
                <!--<li><a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(['controller' => 'Areas', 'action' => 'area']); ?>');"><i class="fa fa-circle-o"></i>Nuevo</a></li>-->
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="glyphicon glyphicon-heart"></i><span>Signos</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Html->url(['controller' => 'Signos', 'action' => 'index']); ?>"><i class="fa fa-circle-o"></i>Listado</a></li>
               <!-- <li><a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(['controller' => 'Signos', 'action' => 'signo']); ?>');"><i class="fa fa-circle-o"></i>Nuevo</a></li>-->
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="glyphicon glyphicon-tint"></i><span>Laboratorios</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Html->url(['controller' => 'Laboratorios', 'action' => 'index']); ?>"><i class="fa fa-circle-o"></i>Listado</a></li>
              <!--  <li><a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(['controller' => 'Laboratorios', 'action' => 'laboratorio']); ?>');"><i class="fa fa-circle-o"></i>Nuevo</a></li>-->
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="glyphicon glyphicon-folder-open"></i><span>Resultados</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Html->url(['controller' => 'Resultados', 'action' => 'index']); ?>"><i class="fa fa-circle-o"></i>Listado</a></li>
               <!-- <li><a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(['controller' => 'Resultados', 'action' => 'resultado']); ?>');"><i class="fa fa-circle-o"></i>Nuevo</a></li>-->
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="glyphicon glyphicon-plus-sign"></i><span>Examenes</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Html->url(['controller' => 'Examenes', 'action' => 'index']); ?>"><i class="fa fa-circle-o"></i>Listado</a></li>
                <!--<li><a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(['controller' => 'Examenes', 'action' => 'examen']); ?>');"><i class="fa fa-circle-o"></i>Nuevo</a></li>-->
            </ul>
        </li>
    </ul>
</section>
<!-- /.sidebar -->
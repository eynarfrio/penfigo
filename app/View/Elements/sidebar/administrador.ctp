<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo $this->webroot; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
            <p><?php echo $this->Session->read('Auth.User.username'); ?></p>
            <a href="javascript:"> <?php echo $this->Session->read('Auth.User.role'); ?></a>
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
                <i class="glyphicon glyphicon-globe"></i> <span>Sintomas</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Html->url(['controller' => 'Sintomas', 'action' => 'lista']); ?>"><i class="fa fa-circle-o"></i> Listado</a></li>
                <li><a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Sintomas', 'action' => 'sintoma')) ?>');"><i class="fa fa-circle-o"></i>Nuevo Lugar</a></li>         
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="glyphicon glyphicon-search"></i><span>Sintomas en la Piel</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Html->url(['controller' => 'Pielsintomas', 'action' => 'index']); ?>"><i class="fa fa-circle-o"></i>Listado</a></li>
                <li><a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Pielsintomas', 'action' => 'pielsintoma')) ?>');"><i class="fa fa-circle-o"></i>Nuevo Sintoma en la Piel</a></li>  
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="glyphicon glyphicon-question-sign"></i><span>Tipo de Ampollas</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Html->url(['controller' => 'Tipoampollas', 'action' => 'index']); ?>"><i class="fa fa-circle-o"></i>Listado</a></li>
                <li><a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Tipoampollas', 'action' => 'tipoampolla')) ?>');"><i class="fa fa-circle-o"></i>Nuevo Tipo de Ampolla</a></li>  
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="glyphicon glyphicon-fullscreen"></i><span>Tipo de Erosiones</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Html->url(['controller' => 'Tipoerociones', 'action' => 'index']); ?>"><i class="fa fa-circle-o"></i>Listado</a></li>
                <li><a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Tipoerociones', 'action' => 'tipoerocion')) ?>');"><i class="fa fa-circle-o"></i>Nuevo Tipo de Erosion</a></li>  
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="glyphicon glyphicon-fullscreen"></i><span>Penfigo</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Html->url(['controller' => 'Penfigos', 'action' => 'index']); ?>"><i class="fa fa-circle-o"></i>Listado</a></li>
                <li><a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(['controller' => 'Penfigos', 'action' => 'penfigo']); ?>');"><i class="fa fa-circle-o"></i>Nuevo</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-street-view"></i><span>Areas</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo $this->Html->url(['controller' => 'Areas', 'action' => 'index']); ?>"><i class="fa fa-circle-o"></i>Listado</a></li>
                <li><a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(['controller' => 'Areas', 'action' => 'area']); ?>');"><i class="fa fa-circle-o"></i>Nuevo</a></li>
            </ul>
        </li>
    </ul>
</section>
<!-- /.sidebar -->
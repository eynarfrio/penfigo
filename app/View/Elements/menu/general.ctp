<?php $medico = $this->requestAction(['controller' => 'Medicos', 'action' => 'get_medico']); ?>
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

            <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wheelchair"></i>
                    <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 9 tasks</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                            <li><!-- Task item -->
                                <a href="#">
                                    <h3>
                                        Design some buttons
                                        <small class="pull-right">20%</small>
                                    </h3>
                                    <div class="progress xs">
                                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li><!-- end task item -->
                        </ul>
                    </li>
                    <li class="footer">
                        <a href="#">View all tasks</a>
                    </li>
                </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?php if ($medico['Medico']['sexo'] == 'Masculino'): ?>
                    <img src="<?php echo $this->webroot; ?>imagenes/doctor-icono.jpg" height="160px" width="160px"class="user-image" alt="User Image">
                    <?php else:?>
                    <img src="<?php echo $this->webroot; ?>imagenes/doctora-icono.jpg" height="160px" width="160px"class="user-image" alt="User Image">
                    <?php endif;?>
                      
                    <span class="hidden-xs"><?php echo $medico['Medico']['nombres'] ?></span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <?php if ($medico['Medico']['sexo'] == 'Masculino'): ?>
                          <img src="<?php echo $this->webroot; ?>imagenes/doctor-icono.jpg" height="160px" width="160px"class="img-circle" alt="User Image">
                        <?php else: ?>
                          <img src="<?php echo $this->webroot; ?>imagenes/doctora-icono.jpg" height="160px" width="160px"class="img-circle" alt="User Image">
                        <?php endif; ?>
                        <p>
                            <?php echo $medico['Medico']['nombres'] ?> - <?php echo $medico['Medico']['tipo_medico'] ?>
                        </p>
                    </li>

                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="<?php echo $this->Html->url(['controller' => 'Medicos', 'action' => 'form_medico']); ?>" class="btn btn-default btn-flat">Perfil</a>
                        </div>
                        <div class="pull-right">
                            <a href="<?php echo $this->Html->url(['controller' => 'Users', 'action' => 'salir']) ?>" class="btn btn-default btn-flat">Salir</a>
                        </div>
                    </li>
                </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
        </ul>
    </div>
</nav>
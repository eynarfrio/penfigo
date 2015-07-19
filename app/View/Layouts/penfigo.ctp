<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SEPENFIGO</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.4 -->
        <link href="<?php echo $this->webroot; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo $this->webroot; ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo $this->webroot; ?>css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="<?php echo $this->webroot; ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo $this->webroot; ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?php echo $this->webroot; ?>dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
            .example-modal .modal {
                position: relative;
                top: auto;
                bottom: auto;
                right: auto;
                left: auto;
                display: block;
                z-index: 1;
            }
            .example-modal .modal {
                background: transparent!important;
            }
        </style>

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo $this->webroot; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    </head>
    <body class="skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="javascript:" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>P</b>SE</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Penfigo</b>SE</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <?php echo $this->element('menu/general') ?>
            </header>

            <!-- =============================================== -->

            <!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                <?php echo $this->element('sidebar/general') ?>
            </aside>

            <!-- =============================================== -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <br>
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content') ?>




            </div><!-- /.content-wrapper -->



            <div class='control-sidebar-bg'></div>

            <div class="modal modal-primary"  id="mimodal">
                <div class="modal-dialog">

                    <div class="modal-content">

                        <div class="col-md-12" id="spin-cargando-mod">
                            <div class="box box-primary box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">Cargando</h3>
                                </div>
                                <!-- Loading (remove the following to stop the loading)-->
                                <div class="overlay">
                                    <i class="fa fa-refresh fa-spin"></i>
                                </div>
                                <!-- end loading -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->

                        <div id="divmodal">

                        </div>


                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


        </div><!-- ./wrapper -->


        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo $this->webroot; ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <script src="<?php echo $this->webroot; ?>plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->webroot; ?>plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

        <!-- SlimScroll -->
        <script src="<?php echo $this->webroot; ?>plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src='<?php echo $this->webroot; ?>plugins/fastclick/fastclick.min.js'></script>
        <!-- AdminLTE App -->
        <script src="<?php echo $this->webroot; ?>dist/js/app.min.js" type="text/javascript"></script>

        <!-- Demo -->
        <script src="<?php echo $this->webroot; ?>dist/js/demo.js" type="text/javascript"></script>
        <?php echo $this->fetch('addscript'); ?>
        <script>
          $(".tabla-date").dataTable();
          function cargarmodal(urll)
          {
              $('#divmodal').hide();
              jQuery("#spin-cargando-mod").show(200);
              jQuery('#mimodal').modal('show', {backdrop: 'static'});
              jQuery("#divmodal").load(urll, function (responseText, textStatus, req) {
                  if (textStatus == "error")
                  {
                      alert("error!!!");
                  }
                  else {
                      setTimeout(function ()
                      {
                          jQuery("#spin-cargando-mod").hide(600);
                          $('#divmodal').show(600);
                      }, 1500);

                  }
              });

          }
        </script>


    </body>
</html>
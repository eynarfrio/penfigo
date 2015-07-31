<!DOCTYPE html>
<html>

    <body class="skin-blue fixed" data-spy="scroll" data-target="#scrollspy">

        <div class="content body">

            <section id='introduction'>
                <h2 class='page-header'><a href="#informacion">Informacion </a></h2>
                <p class='lead'>
                    <b>Penfigo</b> is a popular open source WebApp template for admin dashboards and control panels.
                    It is a responsive HTML template that is based on the CSS framework Bootstrap 3.
                    It utilizes all of the Bootstrap components in its design and re-styles many
                    commonly used plugins to create a consistent design that can be used as a user
                    interface for backend applications. AdminLTE is based on a modular design, which
                    allows it to be easily customized and built upon. This documentation will guide you through
                    installing the template and exploring the various components that are bundled with the template.
                </p>
            </section><!-- /#introduction -->

            <!-- ============================================================= -->

            <section id='download'>
                <h2 class='page-header'><a href="#download">Download</a></h2>
                <p class='lead'>
                    AdminLTE can be downloaded in two different versions, each appealing to different
                    skill levels and use case.
                </p>
                <div class='row'>
                    <div class='col-sm-6'>
                        <div class='box box-primary'>
                            <div class='box-header with-border'>
                                <h3 class='box-title'>Ready</h3>
                                <span class='label label-primary pull-right'><i class='fa fa-html5'></i></span>
                            </div><!-- /.box-header -->
                            <div class='box-body'>
                                <p>Compiled and ready to use in production. Download this version
                                    if you don't want to customize AdminLTE's LESS files.</p>
                                <a href='http://almsaeedstudio.com/download/AdminLTE-dist' class='btn btn-primary'><i class='fa fa-download'></i> Download</a>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                    <div class='col-sm-6'>
                        <div class='box box-danger'>
                            <div class='box-header with-border'>
                                <h3 class='box-title'>Source Code</h3>
                                <span class='label label-danger pull-right'><i class='fa fa-database'></i></span>
                            </div><!-- /.box-header -->
                            <div class='box-body'>
                                <p>All files including the compiled CSS. Download this version
                                    if you plan on customizing the template. <b>Requires a LESS compiler.</b></p>
                                <a href='http://almsaeedstudio.com/download/AdminLTE' class='btn btn-danger'><i class='fa fa-download'></i> Download</a>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </section>

            <!-- ============================================================= -->

            <section id="dependencies">
                <h2 class="page-header"><a href="#dependencies">Dependencies</a></h2>
                <p class="lead">AdminLTE depends on two main frameworks.
                    The downloadable package contains both of these libraries, so you don't have to manually download them.</p>
                <ul class="bring-up">
                    <li><a href="http://getbootstrap.com" target="_blank">Bootstrap 3</a></li>
                    <li><a href="http://jquery.com/" target="_blank">jQuery 1.11+</a></li>
                    <li><a href="#plugins">All other plugins are listed below</a></li>
                </ul>
            </section>

            <section id='layout'>
                <h2 class='page-header'><a href="#layout">Layout</a></h2>
                <p class='lead'>The layout consists of four major parts:</p>

                <div class="callout callout-danger lead">
                    <h4>Tip!</h4>
                    <p>The <a href="../starter.html">starter page</a> is a good place to start building your app if you'd like to start from scratch.</p>
                </div>  

            </section>

            <section id='components' data-spy="scroll" data-target="#scrollspy-components">
                <h2 class='page-header'><a href="#components">Components</a></h2>
                <div class='callout callout-info lead'>
                    <h4>Reminder!</h4>
                    <p>
                        AdminLTE uses all of Bootstrap 3 components. It's a good start to review
                        the <a href="http://getbootstrap.com">Bootstrap documentation</a> to get an idea of the various components
                        that this documentation <b>does not</b> cover.
                    </p>
                </div>
                <div class='callout callout-danger lead'>
                    <h4>Tip!</h4>
                    <p>
                        If you go through the example pages and would like to copy a component, right-click on
                        the component and choose "inspect element" to get to the HTML quicker than scanning
                        the HTML page.
                    </p>
                </div>

                <h4>Top Nav Layout. Main Header Example.</h4>
                <div class="callout callout-info lead">
                    <h4>Reminder!</h4>
                    <p>To use this main header instead of the regular one, you must add the <code>layout-top-nav</code> class to the body tag.</p>
                </div>
            </section>

        </div>
        <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src='../plugins/fastclick/fastclick.min.js'></script>    
        <!-- AdminLTE App -->
        <script src="../dist/js/app.min.js" type="text/javascript"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
        <script src="docs.js"></script>
    </body>
</html>

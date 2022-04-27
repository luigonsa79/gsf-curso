    <!--sidebar start-->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

      <div class="menu_section">
        <h3>Administracion GSF</h3>
        <ul class="nav side-menu">
          <?php //echo Permisos::nav(); ?>
          <?php echo Permisos::mostrarMenu(); ?>
        </ul>
      </div>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <!-- <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div> -->
    <!-- /menu footer buttons -->
    </div>
    </div>


    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
          <ul class=" navbar-right">
            <li class="nav-item dropdown open" style="padding-left: 15px;">
              <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                <img src="<?= IMG ?>img.jpg" alt="">Usuario
              </a>
              <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="javascript:;"> Perfil</a>
                <a class="dropdown-item" href="javascript:;">
                  <span>Config</span>
                </a>
                <a class="dropdown-item" href="<?= base_url ?>/logout"><i class="fa fa-sign-out pull-right"></i> Salir</a>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- /top navigation -->
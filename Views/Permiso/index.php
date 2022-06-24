<?php headerAdmin($data); ?>
<!-- contenido -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><?php echo $data['page_name']; ?></h3>
      </div>

    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
          <div class="x_title">
            <h2><?php echo $data['page_name']; ?></h2>
            <?php if (Permisos::create()) : ?>
              <ul class="nav navbar-right panel_toolbox">
                <li><a href="<?= base_url ?>/roles" class=""><button class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Lista de roles</button></a>
                </li>
              </ul>
            <?php endif; ?>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <!-- tabla -->
            <?php echo Alertas::mostraAlerta(); ?>




            <form class="form-horizontal form-label-left" action="<?php echo base_url ?>/permiso/store" method="POST" novalidate>

              <input type="hidden" name="idRol" id="idRol" value="<?php echo $accesobyRole['id_rol'] ?>">

              <table id="tblPermiso" class="display responsive nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Pagina</th>
                    <th>Crear</th>
                    <th>Read</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                

                    <?php
                    $n = 1;
                    $paginas = $accesobyRole['paginas'];
                    // debug($paginas);

                    for ($i = 0; $i < count($paginas); $i++) : ?>

                      <?php
                      $accesos = $paginas[$i]['accesos']; //default estan 0

                      $cCkeck = $accesos['c'] == 1 ? "checked" : "";
                      $rCkeck = $accesos['r'] == 1 ? "checked" : "";
                      $uCkeck = $accesos['u'] == 1 ? "checked" : "";
                      $dCkeck = $accesos['d'] == 1 ? "checked" : "";

                      $idPage = $paginas[$i]['id'];
                      ?>
                      <tr>
                        <td>
                          <?php echo $n  ?>
                          <input type="hidden" name="paginas[<?php echo $i  ?>][id]" value="<?php echo $idPage ?>">
                        </td>
                        <td>

                          <?php echo $paginas[$i]['titulo']; ?>
                        </td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" name="paginas[<?php echo $i  ?>][c]" <?php echo $cCkeck ?>>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" name="paginas[<?php echo $i  ?>][r]" <?php echo $rCkeck ?>>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" name="paginas[<?php echo $i  ?>][u]" <?php echo $uCkeck ?>>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                            <input type="checkbox" name="paginas[<?php echo $i  ?>][d]" <?php echo $dCkeck ?>>
                          </div>
                        </td>

                      </tr>


                    <?php
                      $n++;
                    endfor; ?>

                </tbody>
              </table>

              <div class="mt-3 mt-md-1">
                <input type="submit" class="btn btn-info btn-lg btn-block" value="Guardar Permisos">
              </div>


            </form>

        

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- contenido -->
<?php footerAdmin($data); ?>
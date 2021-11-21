  <!-- footer content -->
  <footer>
    <div class="pull-right text-gray">
      Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com"><span class="text-gray">Colorlib</span></a>
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
  </div>
  </div>



  <!-- javascripts -->
  <!-- jQuery -->
  <script src="
    <?php echo media(); ?>/js/jquery.min.js">
  </script>
  <!-- Bootstrap -->
  <script src="
    <?php echo media(); ?>/js/bootstrap.bundle.min.js">
  </script>
  <!-- FastClick -->
  <script src="
    <?php echo media(); ?>/js/fastclick.js">
  </script>
  <!-- NProgress -->
  <script src="
    <?php echo media(); ?>/js/nprogress.js">
  </script>
  <!-- Custom Theme Scripts -->
  <script src="
    <?php echo media(); ?>/js/custom.min.js">
  </script>




  <!-- Url para JavaScrip-->
  <script>
    const base_url = "<?php echo base_url; ?>";
  </script>
  <!--cargar solo en la pagina page_functions_js personalizados desde el controlador-->
  <script src="
    <?php echo media(); ?>/app/js/<?= $data['function_js']; ?>"></script>
  </body>

  </html>
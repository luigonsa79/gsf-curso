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
  <script src=" <?= JS ?>/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?= JS ?>/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="<?= JS ?>/fastclick.js"></script>
  <!-- NProgress -->
  <script src="<?= JS ?>/nprogress.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="<?= JS ?>/custom.min.js"></script>
  
  <!-- plugins -->
  <script src="<?= PLUGINS ?>/noty/noty.min.js"></script>




  <!-- Url para JavaScrip-->
  <script>
    const base_url = "<?php echo base_url; ?>";
  </script>
  <!--cargar solo en la pagina page_functions_js personalizados desde el controlador-->
  <script src="<?= ASSETS ?>/app/js/<?= $data['function_js']; ?>"></script>

  </body>

  </html>
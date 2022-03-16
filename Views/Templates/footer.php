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
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.5/af-2.3.7/b-2.2.2/b-html5-2.2.2/b-print-2.2.2/r-2.2.9/datatables.min.js"></script>




  <!-- Url para JavaScrip-->
  <script>
    const base_url = "<?php echo base_url; ?>";
  </script>
  <!--cargar solo en la pagina page_functions_js personalizados desde el controlador-->
  <script src="<?= ASSETS ?>/app/js/<?= $data['function_js']; ?>"></script>

  </body>

  </html>
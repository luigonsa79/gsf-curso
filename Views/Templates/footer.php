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

  <script type="text/javascript">
    $(document).ready(function() {
      var t = $('#table').DataTable({
        aProcessing: true,
        aServerSide: true,
        // opciones de lenguaje
        language: {
          url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json",
        },

        // ocultar columnas
        columnDefs: [{
          targets: [0],
          visible: true,
          serchable: false,
        }, ],
        // mostrar botones de exportacion
        dom: "lBfrtip",
        buttons: [{
            extend: "copyHtml5",
            text: "<i class='fa fa-copy'></i>",
            titleAttr: "Copiar",
            className: "btn btn-secondary",
          },
          {
            extend: "excelHtml5",
            text: "<i class='fa fa-file-excel-o'></i>",
            titleAttr: "Exportar a Excel",
            className: "btn btn-warning",
          },
          {
            extend: "pdfHtml5",
            text: "<i class='fa fa-file-pdf-o'></i>",
            titleAttr: "Exportar a PDF",
            className: "btn btn-danger",
          },
          {
            extend: "csvHtml5",
            text: "<i class='fa fa-file-text-o'></i>",
            titleAttr: "Exportar a CSVF",
            className: "btn btn-primary",
          },
        ],
        lengthMenu: [
          [5, 10, 25, 50, -1],
          [5, 10, 25, 50, "All"],
        ],
        iDisplayLength: 5,
        order: [
          [0, "desc"]
        ],
      });
      // ordenar consecutivo de los registros
      t.on('order.dt seach.dt', function() {
        t.column(0, {
          search: 'applied',
          order: 'applied'
        }).nodes().each(
          function(cell, i) {
            cell.innerHTML = i + 1;
          }
        );
      }).draw();
      // end ordenar consecutivo de los registros
    })
  </script>

  <script type="text/javascript">
    // menu
    $("li>a").click(function(e) {
      $('li>ul>li>a').addClass('d-block');
    });
  </script>

  </body>

  </html>
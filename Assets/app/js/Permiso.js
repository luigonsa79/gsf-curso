let tblPermiso;
document.addEventListener(
  "DOMContentLoaded",
  function () {
    tblPermiso = new DataTable("#tblPermiso", {
      // ocultar columnas
      columnDefs: [
        {
          targets: [0],
          visible: true,
          serchable: false,
        },
      ],
      // mostrar botones de exportacion
      dom: "lBfrtip",
      buttons: [
        {
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
      iDisplayLength: 20,
      order: [[0, "asc"]],
    });
  },
  false
);

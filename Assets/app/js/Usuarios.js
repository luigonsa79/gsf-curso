let tblUsuarios;
document.addEventListener(
  "DOMContentLoaded",
  function () {
    tblUsuarios = new DataTable("#tblUsuarios", {
      aProcessing: true,
      aServerSide: true,
      // opciones de lenguaje
      language: {
        url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json",
      },
      // consultar los datos a la api
      ajax: {
        url: `${base_url}/usuarios/all`,
        dataSrc: "",
      },
      // datos desde el servidor
      columns: [
        { data: "id" },
        { data: "nombre" },
        { data: "correo" },
        { data: "rol" },
        { data: "estado" },
      ],
      // ocultar columnas
      columnDefs: [
        {
          targets: [0],
          visible: false,
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
      lengthMenu:[
        [5,10,25,50, -1],
        [5,10,25,50, "All"],
      ],
      iDisplayLength:10,
      order:[[0,"desc"]],
    });
  },
  false
);

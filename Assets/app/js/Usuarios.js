let tblUsuarios;
document.addEventListener(
  "DOMContentLoaded",
  function () {
    tblUsuarios = new DataTable("#tblUsuarios", {
      ajax: {
        url: `${base_url}/usuarios/all`,
        dataSrc: "",
      },
      columns: [
        { data: "id" }, 
        { data: "nombre" },
        { data: "correo" },
        { data: "rol" },
        { data: "estado" },
      ],
    });
  },
  false
);

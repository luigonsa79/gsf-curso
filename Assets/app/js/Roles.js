// eliminar

function eliminarFnt(element) {
  let idRol = element.dataset.idrol;
  let nombreRol = element.dataset.namerol;
  // console.log(idRol);
  // console.log(nombreRol);
  var n = new Noty({
    text: "Esta seguro de eliminar este registro?",
    type: "error",
    theme: "metroui",
    buttons: [
      Noty.button("YES", "btn btn-success", async function () {
        // console.log("borrar");

        const datos = new FormData();

        datos.append("id", idRol);
        datos.append("nombre", nombreRol);

        try {
          const url = `${base_url}/Roles/destroy`;
          const respuesta = await fetch(url, {
            method: "POST",
            body: datos,
          });
          const resultado = await respuesta.json();

          if (resultado) {
            console.log(resultado);
            new Noty({
              type: "success",
              text: `${resultado.msg}`,
              layout: "topRight",
              theme: "metroui",
              timeout: 1500,
            }).show();
            window.location.href = `${base_url}/roles`;
          }
        } catch (error) {
          console.log(error);
        }

        n.close();
      }),

      Noty.button("NO", "btn btn-error", function () {
        // console.log("no se borro");
        n.close();
      }),
    ],
  });
  n.show();
}

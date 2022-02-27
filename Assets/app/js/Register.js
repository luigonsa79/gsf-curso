document.addEventListener(
  "DOMContentLoaded",
  function () {
    // console.log(base_url);
  },
  false
);

async function save() {
  event.preventDefault();
  formRegister = document.querySelector("#formRegister")
  let datos = new FormData(formRegister);

  try {
    const url = `${base_url}/Register/save`;

    const respuesta = await fetch(url, {
      method: "POST",
      body: datos,
    });

    const resultado = await respuesta.json();

    if (resultado.status) {
      new Noty({
        type: 'success',
        text: `${resultado.msg}`,
        layout: "topCenter",
        theme: "metroui",
        timeout: 1500
      }).show();
      formRegister.reset();
    }else{
      new Noty({
        type: 'error',
        text: `${resultado.error}`,
        layout: "topCenter",
        theme: "metroui",
        timeout: 1500
      }).show();
    }


  } catch (err) {
    console.log(err);
  }
}




document.addEventListener(
  "DOMContentLoaded",
  function () {
    // console.log(base_url);
  },
  false
);

async function save() {
  event.preventDefault();

  let formRegister = new FormData(document.querySelector("#formRegister"));

  try {
    const url = `${base_url}/Register/save`;

    const respuesta = await fetch(url, {
      method: "POST",
      body: formRegister,
    });

    const resultado = await respuesta.json();

    console.log(resultado);
  } catch (err) {
    console.log(err);
  }
}

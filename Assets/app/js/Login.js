document.querySelector("#loginForm").addEventListener("submit", function (e) {
  e.preventDefault();
  login();
});

async function login() {
  let loginForm = document.querySelector("#loginForm");
  const datos = new FormData(loginForm);
  try {
    const url = `${base_url}/login/ingresar`;
    const respuesta = await fetch(url, {
      method: "POST",
      body: datos,
    });
    const resultado = await respuesta.json();

    if (resultado.error) {
      new Noty({
        type: "error",
        text: `${resultado.error}`,
        layout: "topCenter",
        theme: "metroui",
        timeout: 1500,
      }).show();
    } else {
      window.location.href = `${base_url}/perfil`;
    }
  } catch (err) {
    console.log(err);
  }
}

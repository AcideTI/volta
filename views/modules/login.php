<body class="fondoLogin">
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              <div class="card shadow-lg border-0 rounded-lg mt-5">

                <div class="card-body">
                  <form method="post" class="formularLogin">
                    <h3 class="text-center font-weight-light my-4"><img class="imagenLogin" src="assets/img/logo.png"></h3>
                    <div class="form-floating mb-3">
                      <input class="form-control" id="inputCorreo" type="text" name="inputCorreo" placeholder="Ejemplo@gmail.com" />
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control" id="inputPassword" type="password" name="inputPassword" placeholder="Contraseña" />
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                      <button class="btn btn-light" type="submit">Ingresar</button>
                    </div>
                    <?php
                    $login = new ControllerUsuarios();
                    $login->ctrIniciarSesion();
                    ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
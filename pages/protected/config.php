<?php 
include '../php/sesion.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <title>configuracion</title>
  </head>
  <body>
    <div class="grid-card">
      <div class="set-card">
        <div class="set-card-header">
          <h4 class="label">Configuracion</h4>
        </div>
        <div class="set-card-body">
          <div class="smart-list-item-container">
            <div class="smart-list-container using" data-for-tab="1">
              <span class="smart-content-label">Cuenta</span>
            </div>
            <div class="smart-list-container" data-for-tab="2">
              <span class="smart-content-label">Contraseña</span>
            </div>
            <div class="smart-list-container" data-for-tab="3">
              <span class="smart-content-label">Colores</span>
            </div>
            <div class="smart-list-container" data-for-tab="4">
              <span class="smart-content-label">Extras</span>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-content">
        <div class="set-card-right fade display show" id="right" data-tab="1">
          <div class="set-card-header">
            <h4 class="label">Informacion Personal</h4>
          </div>          
          <div class="set-card-body">
          <form method="POST" action="../php/nameUser.php">
            <div class="info-pers">              
              <div class="info-pers-izquierda">
                <div class="input-style">
                  <label id="nombre-profesor">Nombre de usuario</label>
                  <input type="text" id="Nombre" name="Nombre" required/>
                </div>
                <div class="input-style">
                  <label id="nombre-profesor">Titulo</label>
                  <input type="text" id="Titulo" name="Titulo" />
                </div>
                <button type="submit" class="save-changes">Guardar Cambios</button>
              </div>            
              <div class="info-pers-derecha">
                <div class="avatar">
                  <div class="avatar-image">
                    <img src="./Info/head.jpg" />
                  </div>
                  <div class="avatar-button">
                    <button>
                      <i class="bx bxs-cloud-upload"></i>
                      <span>Subir</span>
                    </button>
                  </div>
                  <small>
                    Elija una imagen no
                    <br />
                    mayor a 3MB
                  </small>
                </div>
              </div>
            </div>            
          </div>  
          </form>      
        </div>
        <div class="set-card-right fade" id="right" data-tab="2">
          <div class="set-card-header">
            <h4 class="label">Constraseña</h4>
          </div>
          <div class="set-card-body">
            <form method="POST" action="../php/passwd.php">
            <div class="input-style">
              <label id="nombre-profesor">Contraseña Actual</label>
              <input type="password" name="passwd_actual" id="passwd_actual" required/>
              <a href="../token_Password.html" class="forgot-style">¿Olvido su contraseña?</a>
            </div>
            <div class="input-style">
              <label id="nombre-profesor">Nueva Contraseña</label>
              <input type="password" name="passwd_new" id="passwd_new" required/>
            </div>
            <div class="input-style">
              <label id="nombre-profesor">Verificar Contraseña</label>
              <input type="password" name="passwd_new_ver" id="passwd_new_ver" required/>
            </div>
            <button type="submit" class="save-changes">Guardar Cambios</button>
            </form>
          </div>
        </div>
        <div class="set-card-right fade" id="right" data-tab="3">
          <div class="set-card-header">
            <h4 class="label">Colores</h4>
          </div>
          <div class="set-card-body">
            <div class="info-pers">
              <div class="color-change">
                <div class="title-color">
                  <label>Elija un color</label>
                </div>
                <div class="theme-colors">
                  <div
                    class="color"
                    style="
                      background: linear-gradient(
                        222.12deg,
                        rgb(154, 181, 255) -56.52%,
                        #4a88fc 114.92%
                      );
                      color: #007bff;
                      fill: rgb(0, 75, 255);
                      outline: skyblue;
                      stroke: #05bada66;
                    "
                  ></div>
                  <div
                    class="color"
                    style="
                      background: linear-gradient(
                        222.12deg,
                        rgb(154, 255, 181) -56.52%,
                        rgb(32, 212, 137) 114.92%
                      );
                      color: rgb(32, 212, 137);
                      fill: #0bb783;
                      outline: rgb(94, 246, 175);
                      stroke: #05bada66;
                    "
                  ></div>
                  <div
                    class="color"
                    style="
                      background: linear-gradient(
                        222.12deg,
                        rgb(255, 219, 154) -56.52%,
                        rgb(252, 169, 74) 114.92%
                      );
                      color: rgb(252, 169, 74);
                      fill: rgb(253, 142, 31);
                      outline: rgb(246, 198, 94);
                      stroke: #daa10566;
                    "
                  ></div>
                  <div
                    class="color"
                    style="
                      background: linear-gradient(
                        222.12deg,
                        rgb(200, 154, 255) -56.52%,
                        rgb(155, 74, 252) 114.92%
                      );
                      color: rgb(155, 74, 252);
                      fill: #842cff;
                      outline: rgb(116, 94, 246);
                      stroke: #7a05da66;
                    "
                  ></div>
                  <div
                    class="color"
                    style="
                      background: linear-gradient(
                        222.12deg,
                        rgb(154, 230, 255) -56.52%,
                        rgb(74, 200, 252) 114.92%
                      );
                      color: rgb(33, 188, 255);
                      fill: #00a8d6;
                      outline: rgb(94, 246, 226);
                      stroke: #05bada66;
                    "
                  ></div>
                  <div
                    class="color"
                    style="
                      background: linear-gradient(
                        222.12deg,
                        rgb(255, 242, 154) -56.52%,
                        rgb(246, 191, 38) 114.92%
                      );
                      color: rgb(246, 191, 38);
                      fill: rgb(226, 171, 28); 
                      outline: rgb(246, 223, 94);
                      stroke: #ccda0566;
                    "
                  ></div>
                  <div
                    class="color"
                    style="
                      background: linear-gradient(
                        222.12deg,
                        rgb(255, 181, 154) -56.52%,
                        rgb(252, 74, 97) 114.92%
                      );
                      color: #f64e60;
                      fill: #ff2d53;
                      outline: rgb(246, 94, 107);
                      stroke: #ff2d5366;
                    "
                  ></div>
                  <div
                    class="color"
                    style="
                      background: linear-gradient(
                        222.12deg,
                        rgb(255, 154, 200) -56.52%,
                        rgb(252, 74, 151) 114.92%
                      );
                      color: rgb(252, 74, 151);
                      fill: #ff2dc3;
                      outline: rgb(246, 94, 188);
                      stroke: #da05c866;
                    "
                  ></div>
                </div>
              </div>
              <div class="color-change">
                <div class="title-color">
                  <label>Cambiar de Tema</label>
                </div>
                <div class="color-scheme">
                  <div class="toggleWrapper">
                    <input type="checkbox" class="dn" id="dn" />
                    <label for="dn" class="toggle">
                      <span class="toggle__handler">
                        <span class="crater crater--1"></span>
                        <span class="crater crater--2"></span>
                        <span class="crater crater--3"></span>
                      </span>
                      <span class="star star--1"></span>
                      <span class="star star--2"></span>
                      <span class="star star--3"></span>
                      <span class="star star--4"></span>
                      <span class="star star--5"></span>
                      <span class="star star--6"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="color-change">
                <div class="title-color">
                  <label>Tamaño de Fuente</label>
                </div>
                <div class="color-scheme">
                  <div class="button-size">
                    <span class="btn-size chosen" onclick="document.getElementById('enrollado').style.fontSize = '1em'">A</span>
                    <span class="btn-size" id="middle" onclick="document.getElementById('enrollado').style.fontSize = '1.1em'">A</span>
                    <span class="btn-size" onclick="document.getElementById('enrollado').style.fontSize = '1.2em'">A</span>
                  </div>
                </div>
              </div>
            </div>
            <button class="save-changes" id="last-btn">Por Defecto</button>
          </div>
        </div>
        <div class="set-card-right fade" id="right" data-tab="4">
          <div class="set-card-header">
            <h4 class="label">Extras</h4>
          </div>
          <div class="set-card-body"></div>
        </div>
      </div>
    </div>
  </body>
</html>

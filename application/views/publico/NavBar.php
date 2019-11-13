<header>
    <div id="LoginModal" class="modal">
        <div class="modal-content">
            <h4>Iniciar Sesión</h4>
            <form class="row" method="post" action="/Administrador/login">
                <div class="input-field col s12">
                    <input id="usuario" name="usuario" type="text" class="validate">
                    <label for="usuario">Usuario</label>
                </div>
                <div class="input-field col s12">
                    <input id="contrasena" name="contrasena" type="password" class="validate">
                    <label for="contrasena">Contraseña</label>
                </div>
                <div class="input-field col s12">
                    <button type="submit" class="btn blue" style="width:100%">Autenticar</button>
                </div>

            </form>
        </div>
        <div class="modal-footer">
            <a class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
        </div>
    </div>
    <nav style="background:#272a5b">
        <div class="nav-wrapper container">
            <a href="/" class="brand-logo">CONALPEDIS</a>

            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="<?php echo base_url() ?>Inicio">Inicio</a></li>
                <li><a href="<?php echo base_url() ?>Colecciones">Álbumes</a></li>
                <li><a class="waves-effect waves-light modal-trigger" href="#LoginModal">Iniciar Sesión</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="<?php echo base_url() ?>Inicio">Inicio</a></li>
        <li><a href="<?php echo base_url() ?>Colecciones">Álbumes</a></li>
        <li><a class="waves-effect waves-light modal-trigger" href="#LoginModal">Iniciar Sesión</a></li>
    </ul>

</header>
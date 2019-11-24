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
                    <input id="contrasena" name="contrasena" type="text" class="validate">
                    <label for="contrasena">Contraseña</label>
                </div>
                <div class="input-field col s12">
                    <button type="submit" class="btn blue" style="width:100%">Autenticar</button>
                </div>

            </form>
        </div>
        <div class="modal-footer">
            <a class="modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>
    <nav style="background:#272a5b">
        <div class="nav-wrapper container">
            <a href="/" class="brand-logo">ADMINISTRADOR</a>

            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a href=" <?php echo base_url() ?>Administrador/Inicio">Colecciones</a>
                </li>
                <li>
                    <form action="/Administrador/logout" method="POST">
                        <button type="submit" class="btn blue">Cerrar Sesión</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">

        <li>
            <a href=" <?php echo base_url() ?>Administrador/Inicio">Colecciones</a>
        </li>
        <li>
            <form action="/Administrador/logout" method="POST">
                <button type="submit" class="btn blue">Cerrar Sesión</button>
            </form>
        </li>
    </ul>

</header>
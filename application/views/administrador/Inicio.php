<main>
    <div class="row">
        <div class="col m4 s12 izquierda">
            <form action="/Administrador/AgregarAlbum" method="POST">
                <div class="input-field col s12">
                    <input id="nombre_coleccion" name="nombre_album" type="text" class="">
                    <label for="nombre_coleccion">Nombre Álbum</label>
                </div>
                <div class="input-field col s12">
                    <input id="descripcion_coleccion" name="descripcion_album" type="text" class="">
                    <label for="descripcion_coleccion">Descripción Álbum</label>
                </div>
                <div class="input-field col s12">
                    <button type="submit" class="btn blue" style="width:100%">Agregar Álbum</button>
                </div>
            </form>
        </div>
        <div class=" col m8 s12 derecha">
            <div class="row">
                <?php foreach ($albums as $album) { ?>
                    <div class="col s12 m6">
                        <div class="card ">
                            <div class="card-content ">
                                <span class="card-title"><?php echo strtoupper($album['nombre']) ?></span>
                                <p><?php echo $album['descripcion'] ?></p>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col s6">
                                        <a href="/Administrador/Album/<?php echo $album['id_album']?>" class="btn blue darken-1 link-button">Ver</a>
                                    </div>
                                    
                                    <div class="col s6">
                                        <form action="/Administrador/EliminarAlbum" method="POST">
                                            <button type="submit" class="btn red" value="<?php echo $album['id_album'] ?>" name="id_album">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</main>
<main>
    <div class="row">
        <div class="col m4 s12 izquierda">
            <form action="/Administrador/AgregarFoto" method="POST" enctype="multipart/form-data">
                <div class="input-field col s12">
                    <input id="id_coleccion" name="id_album" type="hidden" class="" value="<?php echo $id ?>">

                </div>

                <div class="input-field col s12">
                    <input id="titulo" name="titulo" type="text" class="">
                    <label for="titulo">Título de la Imagen</label>
                </div>
                <div class="input-field col s12">
                    <input id="descripcion" name="descripcion" type="text" class="">
                    <label for="descripcion">Descripción de la Imagen</label>
                </div>

                <div class="input-field col s12">
                    <input id="archivo" name="archivo" type="file" class="">

                </div>
                <div class="input-field col s12">
                    <select name="tipo_recurso">
                        <option value="" disabled selected>Elija el tipo de Imagen</option>
                        <option value="imagen">Imagen</option>

                        <option value="video">Video</option>

                    </select>
                    <label>Tipo de Imagen</label>
                </div>
                <div class="input-field col s12">
                    <button type="submit" class="btn blue" style="width:100%">Agregar Imagen</button>
                </div>
            </form>
        </div>
        <div class=" col m8 s12 derecha">
            <div class="row">
                <div class="col s12">
                    <h4 class="center-align"><?php echo strtoupper($album['nombre']) ?></h4>
                </div>
                <div class="col s12">
                    <p><?php echo $album['descripcion'] ?></p>
                </div>

                <?php if (isset($fotos)) {
                    foreach ($fotos as $foto) {   ?>
                        <div class="col m4 s12">
                            <div class="card ">
                                <div class="card-content ">
                                    <span class="card-title"><?php echo $foto['titulo'] ?></span>

                                    <p>Descripción: <?php echo $foto['descripcion'] ?></p>

                                    <?php if ($foto['tipo_recurso'] === 'imagen') { ?>
                                        <img src="<?php echo base_url() ?>uploads/multimedia/<?php echo $foto['nombre_recurso'] ?>" alt="" class="responsive-img materialboxed">
                                    <?php } ?>

                                    <?php if ($foto['tipo_recurso'] == 'video') { ?>
                                        <video class="responsive-video" src="<?php echo base_url() ?>uploads/biblioteca/<?php echo $foto['nombre_recurso'] ?>" controls></video>
                                    <?php } ?>
                                    <p>Tipo de Libro: <?php echo $foto['tipo_recurso'] ?></p>

                                </div>


                                <div class="card-action">
                                    <div class="row">


                                        <div class="col s12">
                                            <form action="/Administrador/EliminarFoto" method="POST">
                                                <input type="hidden" value="<?php echo $id ?>" name="id_album">
                                                <button type="submit" class="btn red" value="<?php echo $foto['id_foto'] ?>" name="id_foto">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>


            </div>

        </div>
    </div>
</main>
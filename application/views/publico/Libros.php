<main>
    <div class="row">
        <div class="col s12">
            <h4 class="center-align"><?php echo strtoupper($coleccion['nombre']) ?></h4>
        </div>
        <div class="col s12">
            <p><?php echo $coleccion['descripcion'] ?></p>
        </div>

        <?php if (isset($libros)) {
            foreach ($libros as $libro) {   ?>
                <div class="col s12 m6">
                    <div class="card ">
                        <div class="card-content ">
                            <span class="card-title center-align"><?php echo $libro['titulo'] ?></span>

                            <p>Descripción: <?php echo $libro['descripcion'] ?></p>

                            <?php if ($libro['tipo_recurso'] === 'imagen') { ?>
                                <img src="<?php echo base_url() ?>uploads/multimedia/<?php echo $libro['nombre_recurso'] ?>" alt="" class="responsive-img materialboxed">
                            <?php } ?>

                            <?php if ($libro['tipo_recurso'] == 'video') { ?>
                                <video class="responsive-video" src="<?php echo base_url() ?>uploads/biblioteca/<?php echo $libro['nombre_recurso'] ?>" controls></video>
                            <?php } ?>


                        </div>



                    </div>
                </div>
        <?php }
        } ?>


    </div>
</main>
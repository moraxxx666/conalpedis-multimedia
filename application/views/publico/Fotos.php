<main>
    <div class="row">
        <div class="col s12">
            <h4 class="center-align"><?php echo strtoupper($coleccion['nombre']) ?></h4>
        </div>
        <div class="col s12">
            <p><?php echo $coleccion['descripcion'] ?></p>
        </div>

        <?php if (isset($fotos)) {
            foreach ($fotos as $foto) {   ?>
                <div class="col s12 m6">
                    <div class="card ">
                       
                            <h3 class="card-title center-align"><?php echo $foto['titulo'] ?></h3>



                            <?php if ($foto['tipo_recurso'] === 'imagen') { ?>
                                <img src="<?php echo base_url() ?>uploads/multimedia/<?php echo $foto['nombre_recurso'] ?>" alt="" class="responsive-img materialboxed">
                            <?php } ?>

                            <?php if ($foto['tipo_recurso'] == 'video') { ?>
                                <video class="responsive-video" src="<?php echo base_url() ?>uploads/biblioteca/<?php echo $foto['nombre_recurso'] ?>" controls></video>
                            <?php } ?>
                            <p class="center-align">Descripción: <?php echo $foto['descripcion'] ?></p>

                        



                    </div>
                </div>
        <?php }
        } ?>



    </div>
</main>
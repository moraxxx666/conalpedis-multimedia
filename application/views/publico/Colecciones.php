<main>
    <div class="row">
        
        <div class="col s12">

            <div class="row">
                <?php foreach ($colecciones as $coleccion) { ?>
                    <div class="col s12 m6 ">
                        <div class="card ">
                            <div class="card-content ">
                                <span class="card-title center-align"><?php echo strtoupper($coleccion['nombre']) ?></span>
                                <p class="center-align"><?php echo $coleccion['descripcion'] ?></p>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col s12">
                                        <a href="/Coleccion/<?php echo $coleccion['id_album'] ?>" class="btn blue darken-1 link-button">Ver Colección</a>
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

<?php include __DIR__ . '/partials/inicio-doc.part.php'; ?>

<?php include __DIR__ . '/partials/nav-doc.part.php'; ?>

<?php if($mensaje!='') :?>
    <div class="alert alert-primary bg-primary" role="alert">
        <strong>Bien hecho!</strong> Has agregado con exito el asociado <?= $asociado->getNombre()?>
    </div>
<?php endif  ?>
<div class="container">
    <div class="jumbotron jumbotron-fluid " style="margin: 10px;">
        <div class="container ">
            <h1 class="display-3">Alta asociados</h1>
            <p class="lead">Esto es una practica evaluada sobre la gestion de unos asocios.</p>
        </div>
    </div>



    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" style="margin: 10px;">

            <hr>
            <div class="form-group" style="margin: 10px;">
                <div class="col-xs-12">
                    <label for="nombre">Introduzca nombre del asociado</label><br>
                    <input type="text" name="nombre" class="form-control"><br>
                    <label for="descripcion">Introduzca descripcion del asociado</label><br>
                    <input type="text" name="descripcion" class="form-control"><br>

                </div>
            </div>

        <div class="form-group" style="margin: 10px;">
            <div class="col-xs-12">
                <label class="label-control">Imagen</label>
                <input class="form-control-file" type="file" name="imagen">
                <button class="pull-right btn btn-lg sr-button btn-success">ENVIAR</button>
            </div>
            <br>
        </div>

        </form>
        <br>



    <div>

            <div class="custyle" style="margin-top: 10px;">
                <table class="table table-hover">
                <thead>

                <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th >Descripcion</th>

                </tr>
                </thead>
                <?php if(empty($asociados)===false) : ?>
                    <?php foreach ($asociados as $asociado): ?>

                        <tr>
                            <th><p><?= $asociado->getId() ?></p></th>
                            <th><img src="<?= $asociado->getUrlGallery() ?>" alt="<?= $asociado->getDescripcion() ?>" title="<?=$asociado ->getDescripcion() ?>" style="height: 64px;width: 64px;"><br>Descripcion: <br><?= $asociado->getDescripcion() ?></th>
                            <th><p><?= $asociado->getNombre()?></p></th>
                            <th><p><?= $asociado->getDescripcion()?></p></th>
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>
                </table>
            </div>
        </div>



</div>



<?php include __DIR__ . '/partials/fin-doc.part.php'; ?>
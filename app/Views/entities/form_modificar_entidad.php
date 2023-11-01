<?= $this->extend('layout') ?>

<?= $this->section('title') ?>
<title> Modificar Entidad </title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">

    <h1>Modificar entidad</h1>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <form id="modificarEntidad" method="post" action="" class="row g-3">
                    <div class="col-md-4">
                        <label for="validationDefault01" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="validationDefault01" name="nombre" placeholder="Ingrese el nombre de la entidad" value="<?php echo $entidad['nombre']; ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault02" class="form-label">Direccion </label>
                        <input type="text" class="form-control" id="validationDefault02" name="direccion" placeholder="Ingrese la direccion de la entidad" value="<?php echo $entidad['direccion']; ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault03" class="form-label">Localidad</label>
                        <input type="text" class="form-control" id="validationDefault03" name="localidad" placeholder="Ingrese el nombre de la localidad" value="<?php echo $entidad['localidad']; ?>" required>

                    </div>
                    <div class="col-md-4">
                        <label for="validationDefaultUsername" class="form-label">Email</label>
                        <div class="input-group">
                            <!-- <span class="input-group-text" id="inputGroupPrepend2">@</span> -->
                            <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" name="email" placeholder="Ejemplo: unaEntidad@gmail.com" value="<?php echo $entidad['email']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault05" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="validationDefault05" name="telefono" placeholder="Ingrese el numero de telefono de la entidad" value="<?php echo $entidad['telefono']; ?>" required>

                    </div>
                    <div class="col-md-4">
                        <label for="id_usuario" class="form-label">Representante</label>
                        <select class="form-select" id="validationDefault04" name="id_usuario" required>
                            <?php foreach ($representantes as $representante) { ?>
                                <option value="<?php echo $representante['id_usuario']; ?>"><?php echo $representante['nombre']; ?></option>
                                <!-- traer tambien los datos de los usuarios que pueden ser representantes -->
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                            <label class="form-check-label" for="invalidCheck2">
                                Aceptar terminos y condiciones.
                            </label>
                        </div>
                    </div>
                    <input type="hidden" name="id" id="id" value="<?php echo $entidad['id_entidad']; ?>" <div class="col-12">
                    <button class="btn btn-primary" type="submit">Guardar Cambios</button>

                </form>
            </div>
        </div>
    </section>

</main>

<?= $this->endSection() ?>
<!-- JS-->
<?= $this->section('footer') ?>

<script src="<?= base_url('/assets/js/entities_change.js') ?>"></script>

<?= $this->endSection() ?>
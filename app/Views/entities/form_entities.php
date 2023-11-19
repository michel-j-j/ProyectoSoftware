<?= $this->extend('layout') ?>
<?= $this->section('title') ?>
<title>Nueva Entidad</title>

<?= $this->endSection() ?>
<?= $this->section('content') ?>


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Nueva Entidad</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=<?= base_url($_SESSION['index']) ?>>Inicio</a></li>
                <li class="breadcrumb-item">Entidades</li>
                <li class="breadcrumb-item active">Nueva Entidad</li>
            </ol>
        </nav>
    </div>
    <section class="section">

        <div class="row">

            <div class="col-lg-12">

                <div class="col-lg">

                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Nueva Entidad</h5>
                            <form method="post" id="crearEntidad" class="row g-3">
                                <div class="col-md-4">
                                    <label for="validationDefault01" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="nombre" placeholder="Ingrese el nombre de la entidad" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDefault02" class="form-label">Direccion </label>
                                    <input type="text" class="form-control" id="validationDefault02" name="direccion" placeholder="Ingrese la direccion de la entidad" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDefault03" class="form-label">Localidad</label>
                                    <input type="text" class="form-control" id="validationDefault03" name="localidad" placeholder="Ingrese el nombre de la localidad" required>

                                </div>
                                <div class="col-md-4">
                                    <label for="validationDefaultUsername" class="form-label">Email</label>
                                    <div class="input-group">
                                        <!-- <span class="input-group-text" id="inputGroupPrepend2">@</span> -->
                                        <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" name="email" placeholder="Ejemplo: unaEntidad@gmail.com" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDefault05" class="form-label">Telefono</label>
                                    <input type="text" class="form-control" id="validationDefault05" name="telefono" placeholder="Ingrese el numero de telefono de la entidad" required>

                                </div>
                                <div class="col-md-4">
                                    <label for="validationDefault04" class="form-label">Representante</label>
                                    <select class="form-select" id="validationDefault04" name="id_usuario" required>
                                        <option selected disabled value="">Elegir representante</option>
                                        <?php foreach ($representantes as $representante) { ?>
                                            <option value="<?php echo $representante['id'] ?>"><?php echo $representante['id'];
                                                                                                echo $representante['nombre'] ?></option>
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
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Enviar formulario</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</main>
<?= $this->endSection() ?>
<?= $this->section('footer') ?>
<script src="<?= base_url('/assets/js/entities_List.js') ?>">
</script>
<?= $this->endSection() ?>
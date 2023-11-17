<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Cargar documentacion</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Documentacion</li>
                <li class="breadcrumb-item active">Cargar documentacion</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <!-- Lista de usuarios -->
        <section class="section">
            <div class="row">

                <div class="card-body">
                    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                        <div class="col-lg-12">
                            <div class="col-lg-12 mt-3">
                                <div class="card">
                                    <div class="card-body mt-2">
                                        <h5 class="card-title">Agregar documentacion</h5>
                                        <!-- Vertical Form -->
                                        <form class="row g-3" id="agregarDocumentacion">
                                            <label for="validationDefault04" class="form-label">Entidad emisora</label>
                                            <select class="form-select" name="nombreEntidad" required>
                                                <option selected disabled value="">Seleccione entidad</option>
                                                <?php foreach ($data['entidades'] as $entidad) { ?>
                                                    <option value="<?php echo $entidad['id_entidad'] ?>">
                                                        <?php echo $entidad['nombre'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <label for="validationDefault05" class="form-label">Tipo de documentacion</label>
                                            <select class="form-select" name="tipoDocumentacion" required>
                                                <option selected disabled value="">Seleccione tipo de documentacion</option>
                                                <?php foreach ($data['tipoDocumentacion'] as $tipoDocumentacion) { ?>
                                                    <option value="<?php echo $tipoDocumentacion['id_tipo_documentacion'] ?>">
                                                        <?php echo $tipoDocumentacion['nombre'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <div class="col-12">
                                                <label for="nombre" class="form-label">Nombre de la tarjeta/identificacion</label>
                                                <input type="text" class="form-control" name="nombre" placeholder="Ej: Lemon, Banco P.">
                                            </div>
                                            <div class="col-12">
                                                <label for="numero" class="form-label">Numero de tarjeta/dni/ID</label>
                                                <input type="text" class="form-control" name="numero" placeholder="xxxx-xxxx-xxxx-xxxx">
                                            </div>
                                            <div class="col-12">
                                                <label for="fecha_emision" class="form-label">Fecha emision</label>
                                                <input type="date" class="form-control" name="fecha_emision">
                                            </div>
                                            <div class="col-12">
                                                <label for="fecha_vencimiento" class="form-label">Fecha vencimiento</label>
                                                <input type="date" class="form-control" name="fecha_vencimiento">
                                            </div>
                                            <input type="hidden" name="id_usuario" value="2">
                                            <div class="text-center">
                                                <a href="<?php echo base_url('/dashboard/user') ?> "> <button type="button" class="btn btn-danger">Volver</button></a>
                                                <button type="reset" class="btn btn-warning">Reiniciar campos</button>
                                                <button type="submit" class="btn btn-primary">Confirmar</button>
                                            </div>
                                        </form>
                                        <!-- Vertical Form -->
                                    </div>
                                </div>
                            </div>
                            </form>
                            <!-- Vertical Form -->
                        </div>
                    </div>
                </div>


        </section>
</main><!-- End #main -->

</main><!-- End #main -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src=" <?= base_url('/assets/js/user_cargarDocs.js') ?>">
</script>
<?= $this->endSection() ?>
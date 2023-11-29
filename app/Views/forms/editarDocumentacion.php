<?= $this->extend('layout') ?>
<?= $this->section('content') ?>



<main id="main" class="main">
    <div class="pagetitle">
        <h1>Editar documentacion</h1>

    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-6">

                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">




                            <!-- Vertical Form -->
                            <form class="row g-3" id="modificarDocumento"
                                action="<?= base_url('/modificarDocumento') ?>" method="POST"  onsubmit="return validarFechas()">
                                <div class="col-12">
                                    <br>
                                    <label for="nombre" class="form-label">Nombre de la
                                        tarjeta/identificacion</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        value="<?php echo $data['documentacion']['nombre'] ?>">
                                </div>
                                <label for="validationDefault04" class="form-label">Entidad emisora</label>
                                <select class="form-select" id="nombreEntidad" name="nombreEntidad" required>
                                    <option selected disabled value="">Seleccione entidad</option>

                                    <?php foreach ($data['entidades'] as $entidad) { ?>
                                        <option value="<?php echo $entidad['nombre'] ?>">
                                            <?php echo $entidad['nombre'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <label for="validationDefault05" class="form-label">Tipo de documentacion</label>
                                <select class="form-select" id="tipoDocumentacion" name="tipoDocumentacion" required>
                                    <option selected disabled value="">Seleccione tipo de documentacion</option>

                                    <?php foreach ($data['tipoDocumentacion'] as $tipoDocumentacion) { ?>
                                        <option value="<?php echo $tipoDocumentacion['nombre'] ?>">
                                            <?php echo $tipoDocumentacion['nombre'] ?>
                                        </option>
                                    <?php } ?>
                                </select>

                                <div class="col-12">
                                    <label for="numero" class="form-label">Numero de tarjeta/dni/ID</label>
                                    <input type="text" class="form-control" id="numero" name="numero"
                                        value="<?php echo $data['documentacion']['numero'] ?>">
                                </div>
                                <div class="col-12">
                                    <label for="fecha_emision" class="form-label">Fecha emision</label>
                                    <input type="date" class="form-control" id="fecha_emision" name="fecha_emision">
                                </div>
                                <div class="col-12">
                                    <label for="fecha_vencimiento" class="form-label">Fecha
                                        vencimiento</label>
                                    <input type="date" class="form-control" id="fecha_vencimiento"
                                        name="fecha_vencimiento">
                                </div>
                                <div class="col-12">
                                    <input type="hidden" class="form-control" id="id" name="id"
                                        value="<?php echo $data['documentacion']['id'] ?>">

                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <button type="reset" class="btn btn-secondary">Reiniciar campos</button>
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
        </div>
        </div>


    </section>
</main><!-- End #main -->
<?= $this->endSection() ?>
<?= $this->extend('layout') ?>
<?= $this->section('content') ?>



<main id="main" class="main">
    <div class="pagetitle">
        <h1>Editar tipo de documentacion</h1>

    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-6">

                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">




                            <!-- Vertical Form -->
                            <form class="row g-3" id="modificarTipoDocumento"
                                action="<?= base_url('/modificarTipoDocumento') ?>" method="POST">
                                <div class="col-12">
                                    <br>
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input required type="text" class="form-control" id="nombre" name="nombre"
                                        value="<?php echo $tipoDocumentacion['nombre'] ?>">
                                </div>

                                <div class="col-12">
                                    <label for="pasos_recuperacion" class="form-label">Pasos de recuperacion</label>

                                    <textarea class="form-control" id="pasos_recuperacion" name="pasos_recuperacion"
                                        required
                                        value=""><?php echo $tipoDocumentacion['pasos_recuperacion'] ?></textarea>
                                </div>
                                <div>
                                    <input required type="hidden" class="form-control" id="id" name="id"
                                        value="<?php echo $tipoDocumentacion['id'] ?>">
                                </div>
                                <div class="text-center">
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
        </div>
        </div>


    </section>
</main><!-- End #main -->
<?= $this->endSection() ?>
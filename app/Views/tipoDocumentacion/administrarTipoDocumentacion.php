<?= $this->extend('layout') ?>

<?= $this->section('title') ?>
<title>Lista de tipos de documento</title>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Administrar tipos de documentacion</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Documentacion</li>
                <li class="breadcrumb-item active">Administrar tipos de documentacion</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h1>Listado de tipo de documento</h1>
                            <!-- Table with hoverable rows -->
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Pasos de recuperacion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tipoDocumentaciones as $tipoDocumentacion) { ?>
                                        <tr>
                                            <td scope="col">
                                                <?php echo $tipoDocumentacion['id'] ?>
                                            </td>
                                            <td scope="col">
                                                <?php echo $tipoDocumentacion['nombre'] ?>
                                            </td>
                                            <td scope="col">
                                                <?php echo $tipoDocumentacion['pasos_recuperacion'] ?>
                                            </td>
                                            <td scope="col">

                                                <form action="<?= base_url('/eliminarTipoDocumentacion') ?>"
                                                    method="POST" class="eliminarTipoDocumentacion"
                                                    style="display: inline;">
                                                    <input type="hidden" name="eliminar"
                                                        value="<?php echo $tipoDocumentacion['id']; ?>">
                                                    <button type="submit"
                                                        class="btn btn-danger float-right">Eliminar</button>
                                                </form>

                                            </td>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- End Table with hoverable rows -->

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">

                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">


                            <h5 class="card-title">Agregar tipo de documento</h5>
                            <!-- Vertical Form -->
                            <form class="row g-3" id="insertarTipoDocumentacion"
                                action="<?= base_url('/administrarTipoDocumentacion') ?>" method="POST">
                                <div class="col-12">
                                    <label>Tipo de documentacion</label>
                                    <input type="text" class="form-control" id="tipoDocumentacion"
                                        name="tipoDocumentacion" required>
                                        <label>Pasos de recuperacion</label>
                                        <textarea class="form-control" id="pasos_recuperacion" name="pasos_recuperacion" required></textarea>
                                     

                                    <div class="text-center">
                                        <br>
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
    </section>
</main>

<?= $this->endSection() ?>
<?= $this->section('footer') ?>

<script src="<?= base_url('/assets/js/entities_list.js') ?>"></script>

<?= $this->endSection() ?>
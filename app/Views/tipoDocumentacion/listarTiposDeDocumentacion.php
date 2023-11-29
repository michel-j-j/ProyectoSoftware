<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Administrar tipos de documentacion de las entidades</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=<?= base_url($_SESSION['index']) ?>>Inicio</a></li>
                <li class="breadcrumb-item">Entidades</li>
                <li class="breadcrumb-item active">Administrar tipos de documentacion de las entidades</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-10">

                <div class="card">

                    <div class="card-body">
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
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
</main>

<?= $this->endSection() ?>
<?= $this->section('footer') ?>

<script src="<?= base_url('/assets/js/entities_list.js') ?>"></script>

<?= $this->endSection() ?>
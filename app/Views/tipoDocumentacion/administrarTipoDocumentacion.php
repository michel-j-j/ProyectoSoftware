<?= $this->extend('layout') ?>

<?= $this->section('title') ?>
<title>Lista de tipos de documento</title>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Administrar tipos de documentacion</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=<?= base_url($_SESSION['index']) ?>>Inicio</a></li>
                <li class="breadcrumb-item">Documentacion</li>
                <li class="breadcrumb-item active">Administrar tipos de documentacion</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                          
                            <h5 class="card-title">Listado de tipo de documento</h5>
                            
                            <!-- Table with hoverable rows -->
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Pasos de recuperacion</th>
                                        <th scope="col">Acciones</th>
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

                                                <a href="<?php echo base_url('modificarTipoDocumento/') ?><?php echo $tipoDocumentacion['id']; ?>" class="btn btn-warning float-right">Modificar</a>

                                                <form id="eliminarTipoDocumentacion" style="display: inline;">
                                                    <input type="hidden" name="eliminar" value="<?php echo $tipoDocumentacion['id']; ?>">
                                                    <hr>
                                                    <button type="submit" class="btn btn-danger float-right">&nbsp;Eliminar&nbsp;</button>
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
                <div class="col-lg-4">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Agregar tipo de documento</h5>
                            <!-- Vertical Form -->
                            <form class="row g-3" id = "insertarTipoDocumentacion">
                                <div class="col-12">
                                    <label>Tipo de documentacion</label>
                                    <input type="text" class="form-control" id="tipoDocumentacion" name="tipoDocumentacion" required>
                                    <label>Pasos de recuperacion</label>
                                    <textarea class="form-control" id="pasos_recuperacion" name="pasos_recuperacion" required></textarea>


                                    <div class="text-center">
                                        <br>
                                        <button type="submit" class="btn btn-primary">Confirmar</button>
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

<script src="<?= base_url('/assets/js/entities_list.js') ?>"></script>

<?= $this->endSection() ?>
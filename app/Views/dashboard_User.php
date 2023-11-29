<?= $this->extend('layout'); ?>

<?= $this->section('content') ?>

<body>

    <main id="main" class="main">
        <section class="section mt-5 card text-center">
            <div class="container mt-5 mb-5">
                <div class="row mb-5">
                    <div class="jumbotron">
                        <h1 class="display-4">La billetera virtual para proteger tus documentos importantes</h1>
                        <p class="lead card-title">Carga tus documentos y denúncialos en caso de pérdida.</p>
                        <!-- Agrega un botón CTA principal aquí -->
                    </div>
                </div>

                <div class="row justify-content-center mt-5 mb-5">
                    <div class="col-lg-4">
                        <h3>Gestiona tu Documentacion</h3>
                        <p>Accede de forma rapida a tus documentos en cualquier momento, en cualquier lugar.</p>
                        <a class="btn btn-primary btn-lg" href="<?= base_url('miDocumentacion/' . $_SESSION['id'] . '') ?>"role="button">Mis Documentos</a>
                    </div>
                    <div class="col-lg-4">
                        <h3>Carga tus documentos</h3>
                        <p>Carga tus documentos de forma rapida y segura en la mejor plataforma del mercado.</p>
                        <a class="btn btn-primary btn-lg" href="<?php echo base_url('/user/cargarDocumentacion') ?> " role="button">Agregar Documentos</a>
                    </div>
                    <div class="col-lg-4">
                        <h3>Denuncia Rápida</h3>
                        <p>Reporta la pérdida de documentos y toma medidas de inmediato.</p>
                        <a class="btn btn-primary btn-lg"  href="<?= base_url('/selecccionarDenunciarDocumentacion/') ?><?php echo $_SESSION['id'] ?>"role="button">Denunciar documentos</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

</body>

<!-- Vendor JS Files -->

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<?= $this->endSection() ?>
</body>

</html>
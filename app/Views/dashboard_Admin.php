<?= $this->extend('layout'); ?>

<?= $this->section('content') ?>

<body>

    <main id="main" class="main">
        <section class="section card mt-5 mb-5">
            <div class="container mt-5 mb-5">
                <div class="row">
                    <div class="jumbotron">
                        <h1 class="display-4 text-center">La billetera virtual para proteger tus documentos importantes</h1>
                        <p class="lead card-title text-center">Carga tus documentos y denúncialos en caso de pérdida</p>
                        <!-- Agrega un botón CTA principal aquí -->
                    </div>
                </div>
                <div class="row mt-5 mb-5 text-center" style="background-color: white;">
                    <div class="col-lg-4 bienvenida">
                        <h3>Gestioná Usuarios</h3>
                        <p>Gestion de usuarios en un solo click.</p>
                        <br>
                        <a class="btn btn-primary btn-lg" href="<?= base_url('/tables/listaUsuarios') ?>" role="button">Ver Usuarios</a>
                    </div>
                    <div class="col-lg-4 bienvenida">
                        <h3>Administra Entidades</h3>
                        <p>Agrega entidades de forma simple y sin problemas.</p>
                        <a class="btn btn-primary btn-lg" href=<?= base_url('/listaEntidades') ?> role="button">Gestionar Entidades</a>
                    </div>
                    <div class="col-lg-4 bienvenida">
                        <h3>Control de denuncias</h3>
                        <p>Accede rapidamente al listado de denuncias.</p>
                        <br>
                        <a class="btn btn-primary btn-lg" href="<?= base_url('/listadoDenuncias') ?>" role="button">Ver Estado de Denuncias</a>
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
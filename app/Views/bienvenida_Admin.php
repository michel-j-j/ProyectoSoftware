<?= $this->extend('layout'); ?>

<?= $this->section('content') ?>

<body>

    <main id="main" class="main">
        <section class="section">
            <div class="container mt-4">
                <div class="row">
                    <div class="jumbotron">
                        <h1 class="display-4">La billetera virtual para proteger tus documentos importantes</h1>
                        <p class="lead">Carga tus documentos y denúncialos en caso de pérdida.</p>
                        <!-- Agrega un botón CTA principal aquí -->
                    </div>
                </div>
                <div class="row"> </div>

                <div class="row">
                    <div class="col-lg-4 bienvenida">
                        <h3>Seguridad de Documentos</h3>
                        <p>Mantén tus documentos seguros en nuestra plataforma encriptada.</p>
                        <a class="btn btn-primary btn-lg" href="#" role="button">Ver Documentos</a>
                    </div>
                    <div class="col-lg-4 bienvenida">
                        <h3>Denuncia Rápida</h3>
                        <p>Reporta la pérdida de documentos y toma medidas de inmediato.</p>
                        <a class="btn btn-primary btn-lg" href="#" role="button">Denunciar documento</a>
                    </div>
                    <div class="col-lg-4 bienvenida">
                        <h3>Notificaciones en Tiempo Real</h3>
                        <p>Recibe alertas cuando tus documentos se actualicen o cambien de estado.</p>
                        <a class="btn btn-primary btn-lg" href="#" role="button">Ver Estado de Denuncias</a>
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
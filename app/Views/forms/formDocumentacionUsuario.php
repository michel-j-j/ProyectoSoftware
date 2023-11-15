<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - Perdi mi Billetera</title>

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="shortcut icon" type="image/ico" href="assets/icons/logo.png">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="<?= base_url('/assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/vendor/quill/quill.snow.css') ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/vendor/quill/quill.bubble.css') ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/vendor/simple-datatables/style.css') ?>" rel="stylesheet">


    <link href="<?= base_url('/assets/css/style.css') ?>" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>
    <main id="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-9">

                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Agregar documentacion</h5>

                                <!-- Vertical Form -->
                                <form class="row g-3" id="agregarDocumentacion" method="POST">
                                    <div class="col-12">
                                        <label for="nombre" class="form-label">Nombre de la
                                            tarjeta/identificacion</label>
                                        <input type="text" class="form-control" name="nombre">
                                    </div>
                                    <div class="col-12">
                                        <label for="numero" class="form-label">Numero de tarjeta/dni/ID</label>
                                        <input type="text" class="form-control" name="numero">
                                    </div>
                                    <div class="col-12">
                                        <label for="fecha_emision" class="form-label">Fecha emision</label>
                                        <input type="date" class="form-control" name="fecha_emision">
                                    </div>
                                    <div class="col-12">
                                        <label for="fecha_vencimiento" class="form-label">Fecha vencimiento</label>
                                        <input type="date" class="form-control" name="fecha_vencimiento">
                                    </div>


                                    <div>
                                        <a href="<?php echo base_url('/dashboard/user') ?> "> <button type="button" class="btn btn-secondary">Volver</button></a>
                                        <button type="reset" class="btn btn-secondary">Reiniciar campos</button>
                                        <button type="submit" class="btn btn-primary ">Confirmar</button>

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
    <script src="<?= base_url('/assets/vendor/apexcharts/apexcharts.min.js') ?>"></script>
    <script src="<?= base_url('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('/assets/vendor/chart.js/chart.umd.js') ?>"></script>
    <script src="<?= base_url('/assets/vendor/echarts/echarts.min.js') ?>"></script>
    <script src="<?= base_url('/assets/vendor/quill/quill.min.js') ?>"></script>
    <script src="<?= base_url('/assets/vendor/simple-datatables/simple-datatables.js') ?>"></script>
    <script src="<?= base_url('/assets/vendor/tinymce/tinymce.min.js') ?>"></script>
    <script src="<?= base_url('/assets/vendor/php-email-form/validate.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- Template Main JS File -->
    <script src="<?= base_url('/assets/js/main.js') ?>"></script>
    <script src="<?= base_url('/assets/js/user_cargarDocs.js') ?>"></script>
</body>

</html>
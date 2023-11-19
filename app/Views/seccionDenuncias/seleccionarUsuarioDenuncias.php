<?= $this->extend('layout') ?>
<?= $this->section('content') ?>






<main id="main" class="main">

    <div class="pagetitle">
        <h1>Administrar documentos denunciados</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Denuncias</li>
                <li class="breadcrumb-item active">Administrar documentos denunciados</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">

            <!-- Lista de usuarios -->
            <div class="col-lg-6">
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Usuarios</h5>
                                    <!-- Table with stripped rows -->
                                    <div
                                        class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                                        <div class="datatable-top">
                                            <div class="datatable-dropdown">
                                                <label>
                                                    <select class="datatable-selector">
                                                        <option value="5">5</option>
                                                        <option value="10" selected="">10</option>
                                                        <option value="15">15</option>
                                                        <option value="20">20</option>
                                                        <option value="25">25</option>
                                                    </select> entries per page
                                                </label>
                                            </div>

                                            <div class="datatable-search">
                                                <input class="datatable-input" placeholder="Search..." type="search"
                                                    title="Search within table">
                                            </div>

                                        </div>
                                        <div class="datatable-container">
                                            <table class="table datatable datatable-table" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th data-sortable="true" style="width: 15%;"><button
                                                                class="datatable-sorter">Nombre</button></th>
                                                        <th data-sortable="true" style="width: 15%;"><button
                                                                class="datatable-sorter">Apellido</button></th>
                                                        <th data-sortable="true" style="width: 10%;"><button
                                                                class="datatable-sorter">DNI</button></th>
                                                        <th data-sortable="true" style="width: 10%;"><button
                                                                class="datatable-sorter">Email</button></th>
                                                        <th data-sortable="true" style="width: 10%;"><button
                                                                class="datatable-sorter">Administrar denuncias</button>
                                                        </th>
                                                </thead>
                                                <tbody>
                                                    <?php $index = 0 ?>
                                                    <?php foreach ($usuarios as $usuario) { ?>
                                                        <tr data-index="<?php $index ?>">
                                                            <td>
                                                                <?php echo $usuario['nombre'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $usuario['apellido'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $usuario['dni'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $usuario['email'] ?>
                                                            </td>
                                                            <td>
                                                                <form class="row g-3" id="administrarDenuncias"
                                                                    action="<?= base_url('administrarDenuncias') ?>"
                                                                    method="POST">
                                                                    <input type="hidden" class="form-control" id="email"
                                                                        name="email" value="<?php echo $usuario['email'] ?>">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Seleccionar</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <?php $index = $index + 1; ?>
                                                <?php } ?>

                                                <!-- hacer un checkbox para seleccionar un usuario por lista -->

                                            </table>
                                        </div>
                                        <div class="datatable-bottom">
                                            <div class="datatable-info">Showing 1 to 5 of 5 entries</div>
                                            <nav class="datatable-pagination">
                                                <ul class="datatable-pagination-list"></ul>
                                            </nav>
                                        </div>
                                    </div>
                                    <!-- End Table with stripped rows -->

                                </div>
                            </div>

                        </div>
                    </div>

                </section>
            </div class="col-lg-6">

            <div class="col-lg-6">

                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Seleccionar usuario por email</h5>

                            <!-- Vertical Form -->
                            <form class="row g-3" id="administrarDenuncias"
                                action="<?= base_url('administrarDenuncias') ?>" method="POST">
                                <div class="col-12">
                                    <label for="email" class="form-label">E-mail a administrar</label>
                                    <input type="text" required class="form-control" id="email" name="email">
                                </div>
                                <button type="submit" class="btn btn-primary">Confirmar</button>
                        </div>
                        </form>
                        <!-- Vertical Form -->

                    </div>
                </div>
            </div>
        </div>
        </div>



</main><!-- End #main -->






<?= $this->endSection() ?>
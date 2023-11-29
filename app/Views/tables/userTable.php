<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Listado de usuarios</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=<?=base_url($_SESSION['index'])?>>Inicio</a></li>
                <li class="breadcrumb-item">Usuarios</li>
                <li class="breadcrumb-item active">Listado de usuarios</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">

        <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Usuarios</h5>

                        <!-- Table with stripped rows -->
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
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
                                    <input class="datatable-input" placeholder="Search..." type="search" title="Search within table">
                                </div>

                            </div>
                            <div class="datatable-container">
                                <table class="table datatable datatable-table" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th data-sortable="true" style="width: 10%;"><button class="datatable-sorter">Nombre</button></th>
                                            <th data-sortable="true" style="width: 10%;"><button class="datatable-sorter">Apellido</button></th>
                                            <th data-sortable="true" style="width: 10%;"><button class="datatable-sorter">DNI</button></th>
                                            <th data-sortable="true" style="width: 10%;"><button class="datatable-sorter">Email</button></th>
                                            <th data-sortable="true" style="width: 10%;"><button class="datatable-sorter">Fecha de nacimiento</button></th>
                                            <th data-sortable="true" style="width: 10%;"><button class="datatable-sorter">Localidad</button></th>
                                            <th data-sortable="true" style="width: 20%;"><button class="datatable-sorter">Direccion</button></th>
                                            <th data-sortable="true" style="width: 10%;"><button class="datatable-sorter">Nacionalidad</button></th>
                                            <th data-sortable="true" style="width: 10%;"><button class="datatable-sorter">Rol</button></th>
                                            <th data-sortable="true" style="width: 10%;"><button class="datatable-sorter">Acciones</button></th>
                                        </tr>
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
                                                    <?php echo $usuario['fecha_nacimiento'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $usuario['localidad'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $usuario['direccion'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $usuario['nacionalidad'] ?>
                                                </td>
                                                <td>
                                                    <?php if ($usuario['id_rol'] == 1) {
                                                        echo "Administrador";
                                                    } else {
                                                        echo "Ciudadano";
                                                    } ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url('forms/modificarUsuario/') ?><?php echo $usuario['id']; ?>" class="btn btn-warning float-right">&nbsp;&nbsp;Editar&nbsp;&nbsp;</a>
                                                   <hr>
                                                    <form method="post" action="<?php echo base_url('/forms/eliminarUsuario') ?>" style="display: inline;">
                                                        <input type="hidden" name="id_eliminar" value="<?php echo $usuario['id']; ?>">
                                                        <button type="submit" class="btn btn-danger float-right">Eliminar</button>
                                                    </form>

                                                </td>
                                            </tr>
                                    </tbody>
                                    <?php $index = $index + 1; ?>
                                <?php } ?>
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
</main><!-- End #main -->


<?= $this->endSection() ?>
<?= $this->extend('layout') ?>
<?= $this->section('content') ?>






<main id="main" class="main">
    <div class="pagetitle">
        <h1>Cargar documentacion</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Documentacion</li>
                <li class="breadcrumb-item active">Cargar documentacion</li>
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
                                                        <th data-sortable="true" style="width: 10%;">Seleccionar</th>
                                                </thead>
                                                <tbody>
                                                    <?php $index = 0 ?>
                                                    <?php foreach ($data['usuarios'] as $usuario) { ?>
                                                        <tr data-index="<?php $index ?>">
                                                            <td>
                                                                <?php echo $usuario->nombre ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $usuario->apellido ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $usuario->dni ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $usuario->email ?>
                                                            </td>
                                                            <td>
                                                                <input class="form-check-input" type="radio"
                                                                    name="id_usuario" value="<?= $usuario->email ?>"
                                                                    id="radio<?= $usuario->id ?>">
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo base_url('listarDocumentacion/') ?><?php echo $usuario->id; ?>"
                                                                    class="btn btn-warning float-right">Lista documentacion</a>
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


                            <h5 class="card-title">Agregar documentacion</h5>
                            <!-- Vertical Form -->
                            <form class="row g-3" id="insertarDocumentacion"
                                action="<?= base_url('/insertarDocumentacion') ?>" method="POST">
                                <div class="col-12">
                                    <label>Usuario</label>
                                    <input type="text" class="form-control" id="usuarioSeleccionado"
                                        name="usuario_seleccionado">

                                    <label for="nombre" class="form-label">Nombre de la
                                        tarjeta/identificacion</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                </div>
                                <label for="validationDefault04" class="form-label">Entidad emisora</label>
                                <select class="form-select" id="nombreEntidad" name="nombreEntidad" required>
                                    <option selected disabled value="">Seleccione entidad</option>

                                    <?php foreach ($data['entidades'] as $entidad) { ?>
                                        <option value="<?php echo $entidad['nombre'] ?>">
                                            <?php echo $entidad['nombre'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <label for="validationDefault05" class="form-label">Tipo de documentacion</label>
                                <select class="form-select" id="tipoDocumentacion" name="tipoDocumentacion" required>
                                    <option selected disabled value="">Seleccione tipo de documentacion</option>

                                    <?php foreach ($data['tipoDocumentacion'] as $tipoDocumentacion) { ?>
                                        <option value="<?php echo $tipoDocumentacion['nombre'] ?>">
                                            <?php echo $tipoDocumentacion['nombre'] ?>
                                        </option>
                                    <?php } ?>
                                </select>

                                <div class="col-12">
                                    <label for="numero" class="form-label">Numero de tarjeta/dni/ID</label>
                                    <input type="text" class="form-control" id="numero" name="numero">
                                </div>
                                <div class="col-12">
                                    <label for="fecha_emision" class="form-label">Fecha emision</label>
                                    <input type="date" class="form-control" id="fecha_emision" name="fecha_emision">
                                </div>
                                <div class="col-12">
                                    <label for="fecha_vencimiento" class="form-label">Fecha
                                        vencimiento</label>
                                    <input type="date" class="form-control" id="fecha_vencimiento"
                                        name="fecha_vencimiento">
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <button type="reset" class="btn btn-secondary">Reiniciar campos</button>
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




</main><!-- End #main -->
<script>
    // Espera a que el documento esté completamente cargado
    document.addEventListener('DOMContentLoaded', function () {
        // Obtiene todos los radio buttons con el nombre 'id_usuario'
        const radioButtons = document.querySelectorAll('input[name="id_usuario"]');
        // Obtiene el campo de entrada del formulario
        const usuarioSeleccionadoInput = document.getElementById('usuarioSeleccionado');

        // Itera sobre los radio buttons y agrega un evento de cambio a cada uno
        radioButtons.forEach(function (radioButton) {
            radioButton.addEventListener('change', function () {
                // Verifica si el radio button está marcado
                if (radioButton.checked) {
                    // Actualiza el valor del campo de entrada con el valor del radio button seleccionado
                    usuarioSeleccionadoInput.value = radioButton.value;
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>
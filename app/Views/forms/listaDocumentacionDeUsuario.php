<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Administrar documentacion</h1>

    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">

            <!-- Lista de usuarios -->
            <div class="col-lg-12">
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Lista de documentos del usuario</h5>
                                    <!-- Table with stripped rows -->
                                    <div
                                        class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                                        <div class="datatable-top">

                                        </div>
                                        <div class="datatable-container">
                                            <table class="table datatable datatable-table" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th data-sortable="true" style="width: 10%;"><button
                                                                class="datatable-sorter">Entidad</button></th>
                                                        <th data-sortable="true" style="width: 15%;"><button
                                                                class="datatable-sorter">Tipo documentacion</button>
                                                        </th>
                                                        <th data-sortable="true" style="width: 10%;"><button
                                                                class="datatable-sorter">Fecha de emision</button></th>
                                                        <th data-sortable="true" style="width: 10%;"><button
                                                                class="datatable-sorter">Fecha de vencimiento</button>
                                                        </th>
                                                        <th data-sortable="true" style="width: 10%;"><button
                                                                class="datatable-sorter">Nombre de tarjeta</button>
                                                        </th>
                                                        <th data-sortable="true" style="width: 10%;"><button
                                                                class="datatable-sorter">Numero de la tarjeta</button>
                                                        </th>
                                                        <th data-sortable="true" style="width: 10%;"><button
                                                                class="datatable-sorter">Estado de la
                                                                documentacion</button>
                                                        </th>
                                                        <th data-sortable="true" style="width: 15%;"><button
                                                                class="datatable-sorter">Acciones</button>
                                                        </th>
                                                </thead>
                                                <tbody>
                                                    <?php $index = 0 ?>
                                                    <?php foreach ($data as $documento) { ?>
                                                        <tr data-index="<?php $index ?>">
                                                            <td>
                                                                <?php echo $documento['nombreEntidad'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $documento['nombreTipoDocumentacion'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $documento['fecha_emision'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $documento['fecha_vencimiento'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $documento['nombre'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $documento['numero'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $documento['estado_documentacion'] ?>
                                                            </td>
                                                            <td>
                                                                <?php $estado = $documento['estado_documentacion'];
                                                                if ($estado == "Activo") { ?>
                                                                    <a href="<?php echo base_url('modificarDocumento/') ?><?php echo $documento['id']; ?>"
                                                                        class="btn btn-warning float-right">Modificar</a>
                                                                    <button type="button" class="btn btn-danger"
                                                                        id="eliminarDocumentacion"
                                                                        value="<?php echo $documento['id'] ?>">Eliminar</button>

                                                                <?php } else { ?>
                                                                    <button type="button" class="btn btn-danger"
                                                                        disabled>Eliminar</button>

                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <?php $index = $index + 1; ?>
                                                <?php } ?>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </section>

</main><!-- End #main -->

<?= $this->endSection() ?>
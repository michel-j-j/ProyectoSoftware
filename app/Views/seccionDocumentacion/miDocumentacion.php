<?= $this->extend('layout', $datos = ['title' => 'MiDocumentacion']) ?>
<?= $this->section('content') ?>

<main id="main" class="main">
    <!-- TEST ID -->
    <?php $id = 1 ?>
    <!-- TEST ID -->

    <div class="pagetitle">
        <h1>Mi Documentacion</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=<?=base_url($_SESSION['index'])?>>Inicio</a></li>
                <li class="breadcrumb-item">Documentacion</li>
                <li class="breadcrumb-item active">Mi Documentacion</li>
            </ol>
        </nav>
    </div>
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
                                            <table class="table datatable datatable-table table-light" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th data-sortable="true" style="width: 15%;"><button
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
                                                                class="datatable-sorter">Editar</button>
                                                        </th>

                                                        <th data-sortable="true" style="width: 10%;"><button
                                                                class="datatable-sorter">Eliminar</button>
                                                        </th>

                                                </thead>
                                                <form class="eliminarDocumento" style="display: inline;"
                                                    action="<?= base_url('eliminarDocumento') ?>" method="POST">
                                                    <tbody>
                                                        <?php $index = 0 ?>
                                                        <?php foreach ($data as $documento) { ?>
                                                            <?php ?>
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
                                                                    <a href="<?php echo base_url('modificarDocumento/') ?><?php echo $documento['id']; ?>"
                                                                        class="btn btn-warning float-right">Modificar</a>
                                                                </td>

                                                                <td>
                                                                    <input type="hidden" name="id_eliminar"
                                                                        value="<?php echo $documento['id']; ?>">
                                                                        <button type='button' id='eliminarDocumentacion' value=<?= $documento['id'] ?> class="btn btn-danger float-right">Eliminar</button>

                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                        <?php $index = $index + 1; ?>
                                                    <?php } ?>

                                                </form>
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
<?= $this->extend('layout') ?>

<?= $this->section('title') ?>
<title>Lista de Entidades</title>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>


<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body">
                    <h5 class="card-title">Listado de Entidades</h5>
                    <div style="text-align: right;"><a href="<?php echo base_url('nuevaEntidad') ?>" class="btn btn-primary float-right">Nueva Entidad</a></div>
                    <!-- Table with hoverable rows -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Localidad</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Email</th>
                                <th scope="col">Encargado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($entidades as $entidad) { ?>
                                <tr>
                                    <td scope="col"><?php echo $entidad['id_entidad'] ?></td>
                                    <td scope="col"><?php echo $entidad['nombre'] ?></td>
                                    <td scope="col"><?php echo $entidad['localidad'] ?></td>
                                    <td scope="col"><?php echo $entidad['direccion'] ?></td>
                                    <td scope="col"><?php echo $entidad['telefono'] ?></td>
                                    <td scope="col"><?php echo $entidad['email'] ?></td>
                                    <td scope="col"><?php echo $entidad['encargado']['nombre'] ?></td>
                                    <td scope="col">
                                        <a href="<?php echo base_url('/modificarEntidad/') ?><?php echo $entidad['id_entidad']; ?>" class="btn btn-warning float-right">Modificar</a>
                                        <form class="eliminarEntidadForm" style="display: inline;">
                                            <input type="hidden" name="eliminar" value="<?php echo $entidad['id_entidad']; ?>">
                                            <button type="submit" class="btn btn-danger float-right">Eliminar</button>
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
    </section>
</main>

<?= $this->endSection() ?>
<?= $this->section('footer') ?>

<script src="<?= base_url('/assets/js/entities_list.js') ?>"></script>

<?= $this->endSection() ?>
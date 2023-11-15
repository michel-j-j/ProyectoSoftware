<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body">
                    <h1>Listado de denuncias</h1>
                    
                    <!-- Table with hoverable rows -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">N° Denuncia</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Email</th>
                                <th scope="col">Estado de la denuncia</th>
                                <th scope="col">Documentacion asociada</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <?php foreach ($data as $denuncia) { ?>
                                <tr>
                                    <td scope="col">
                                        <?php echo $denuncia['id'] ?>
                                    </td>
                                    <td scope="col">
                                        <?php echo $denuncia['documentacion'][0]['nombre'] ?>
                                    </td>
                                    <td scope="col">
                                        <?php echo $denuncia['documentacion'][0]['apellido'] ?>
                                    </td>
                                    <td scope="col">
                                        <?php echo $denuncia['documentacion'][0]['email'] ?>
                                    </td>
                                    <td scope="col">
                                    <?php echo $denuncia['estado'] ?>
                                    </td>
                                    <td scope="col">
                                    <a href="<?php echo base_url('documentacionAsociada/') ?><?php echo $denuncia['id']; ?>"
                                            class="btn btn-warning float-right">Documentacion</a>
                                    </td>
                                    <td scope="col">
                                        <form class="eliminarEntidadForm" style="display: inline;">
                                            <input type="hidden" name="eliminar"
                                                value="<?php echo $denuncia['id']; ?>">
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
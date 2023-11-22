<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Estado denuncia</h5>

                <!-- Default Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Denuncia N°</th>
                            <th scope="col">Estado denuncia</th>
                            <th scope="col">Nombre documentacion</th>
                            <th scope="col">N° documentacion</th>
                            <th scope="col">Estado documentacion</th>
                            <th scope="col">Modificar estado documentacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $index = 0 ?>
                        <?php foreach ($denunciasActivas as $denuncia) { ?>
                            <?php foreach ($denuncia['documentacion'] as $documentacion) { ?>

                                <tr>
                                    <!--N° denuncia -->
                                    <td>
                                        <?php echo $denuncia['id'] ?>
                                    </td>
                                    <!--Estado denuncia -->
                                    <td>
                                        <?php echo $denuncia['estado'] ?>
                                    </td>
                                    <td>
                                        <?php echo $documentacion['nombre'] ?>
                                    </td>
                                    <td>
                                        <?php echo $documentacion['numero'] ?>
                                    </td>
                                    <td>
                                        <?php echo $documentacion['estado'] ?>
                                    </td>
                                    <td>
                                        <form class="row g-3" id="cambiarEstadoDocumentacion"
                                            action="<?= base_url('cambiarEstadoDocumentacion') ?>" method="POST">

                                            <select name="estado" id="estado">
                                                <option value="Denunciado">Denunciado</option>
                                                <option value="En recuperacion">En recuperacion</option>
                                                <option value="Recuperado">Recuperado</option>
                                            </select>

                                    <td>
                                        <input type="hidden" class="form-control" id="id_documentacion" name="id_documentacion"
                                            value="<?php echo $documentacion['id'] ?>">
                                        <input type="hidden" class="form-control" id="id_denuncia" name="id_denuncia"
                                            value="<?php echo $denuncia['id'] ?>">
                                        <button type="submit" class="btn btn-warning">Confirmar</button>
                                    </td>
                                    </form>
                                    </td>
                                    <?php
                            } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- End Default Table Example -->
            </div>
        </div>
    </div>
</main><!-- End #main -->

<?= $this->endSection() ?>
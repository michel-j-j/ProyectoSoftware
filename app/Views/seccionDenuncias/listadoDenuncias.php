<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<main id="main" class="main">
<div class="pagetitle">
        <h1>Listado Denuncias</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=<?=base_url($_SESSION['index'])?>>Inicio</a></li>
                <li class="breadcrumb-item">Denuncias</li>
                <li class="breadcrumb-item active">Listado Denuncias</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class ="card">
                <div class="card-body">

                    <table class="table table-hover datatable">
                        <thead>
                            <tr>
                                <th scope="col">N° Denuncia</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Email</th>
                                <th scope="col">Estado de la denuncia</th>
                                <th scope="col">Documentacion asociada</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($data)) {
                                foreach ($data as $denuncia) { ?>
                                    <tr>
                                        <td scope="col">
                                            <?php  echo $denuncia['id'] ?>
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
                                            <a href="<?php echo base_url('documentacionAsociada/') ?><?php echo $denuncia['id']; ?>" class="btn btn-warning float-right">Documentacion</a>
                                        </td>
                                    </tr>

                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </section>
</main>


<?= $this->endSection() ?>
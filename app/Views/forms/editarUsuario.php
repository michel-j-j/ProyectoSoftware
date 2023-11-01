<?= $this->extend('layout') ?>
<?= $this->section('content') ?>






<main id="main" class="main">

    <div class="pagetitle">
        <h1>Editar usuario</h1>
        <nav>
            <!--   <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Usuarios</li>
                <li class="breadcrumb-item active">Agregar usuario</li>
            </ol> -->
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Datos del usuario</h5>
                            <!-- Vertical Form -->
<<<<<<< HEAD
                            <form class="row g-3" id="insertarUsuario" action="<?= base_url('/forms/modificarUsuario') ?>" method="POST">
                                <div class="col-12">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario['nombre'] ?>">
                                </div>
                                <div class="col-12">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $usuario['apellido'] ?>">
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario['email'] ?>">
=======
                            <form class="row g-3" id="insertarUsuario"
                                action="<?= base_url('/forms/modificarUsuario') ?>" method="POST">
                                <div class="col-12">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        value="<?php echo $usuario['nombre'] ?>">
                                </div>
                                <div class="col-12">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido"
                                        value="<?php echo $usuario['apellido'] ?>">
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="<?php echo $usuario['email'] ?>">
>>>>>>> e4a26e086fe807697d115caeeeaed5c7853b878e
                                </div>
                                <div class="col-12">
                                    <label for="contrasena" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="contrasena" name="contrasena">
                                </div>
                                <div class="col-12">
                                    <label for="dni" class="form-label">DNI</label>
<<<<<<< HEAD
                                    <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $usuario['dni'] ?>">
                                </div>
                                <div class="col-12">
                                    <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                                    <input type="date" class="form-control" id="fecha_ nacimiento" name="fecha_nacimiento">
                                </div>
                                <div class="col-12">
                                    <label for="localidad" class="form-label">Localidad</label>
                                    <input type="text" class="form-control" id="localidad" name="localidad" value="<?php echo $usuario['localidad'] ?>">
                                </div>
                                <div class="col-12">
                                    <label for="direccion" class="form-label">Direccion</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $usuario['direccion'] ?>">
                                </div>
                                <div class="col-12">
                                    <label for="nacionalidad" class="form-label">Nacionalidad</label>
                                    <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="<?php echo $usuario['nacionalidad'] ?>">
                                </div>
                                <div class="col-12">
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $usuario['id'] ?>">
=======
                                    <input type="text" class="form-control" id="dni" name="dni"
                                        value="<?php echo $usuario['dni'] ?>">
                                </div>
                                <div class="col-12">
                                    <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                                    <input type="date" class="form-control" id="fecha_ nacimiento"
                                        name="fecha_nacimiento">
                                </div>
                                <div class="col-12">
                                    <label for="localidad" class="form-label">Localidad</label>
                                    <input type="text" class="form-control" id="localidad" name="localidad"
                                        value="<?php echo $usuario['localidad'] ?>">
                                </div>
                                <div class="col-12">
                                    <label for="direccion" class="form-label">Direccion</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion"
                                        value="<?php echo $usuario['direccion'] ?>">
                                </div>
                                <div class="col-12">
                                    <label for="nacionalidad" class="form-label">Nacionalidad</label>
                                    <input type="text" class="form-control" id="nacionalidad" name="nacionalidad"
                                        value="<?php echo $usuario['nacionalidad'] ?>">
                                </div>
                                <div class="col-12">
                                    <input type="hidden" class="form-control" id="id" name="id"
                                        value="<?php echo $usuario['id'] ?>">
>>>>>>> e4a26e086fe807697d115caeeeaed5c7853b878e
                                </div>

                                <!-- cambiar por findAll roles -->

                                <div class="col-12">
<<<<<<< HEAD
                                    <input class="form-check-input" type="radio" name="rol" value="ciudadano" id="ciudadano">
=======
                                    <input class="form-check-input" type="radio" name="rol" value="ciudadano"
                                        id="ciudadano">
>>>>>>> e4a26e086fe807697d115caeeeaed5c7853b878e
                                    <label class="form-check-label" for="ciudadano">
                                        Ciudadano
                                    </label>
                                </div>
                                <div class="form-check">
<<<<<<< HEAD
                                    <input class="form-check-input" type="radio" name="rol" value="administrador" id="administrador" checked>
=======
                                    <input class="form-check-input" type="radio" name="rol" value="administrador"
                                        id="administrador" checked>
>>>>>>> e4a26e086fe807697d115caeeeaed5c7853b878e
                                    <label class="form-check-label" for="administrador">
                                        Administrador
                                    </label>
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
            </div>
    </section>

</main><!-- End #main -->

<?= $this->endSection() ?>
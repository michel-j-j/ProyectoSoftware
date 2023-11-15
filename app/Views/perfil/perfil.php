<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
  <?php
  if (isset($_POST)) {
  }
  ?>
  <div class="pagetitle">
    <h1>Perfil</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=' <?php echo base_url('incio')?>' >Inicio</a></li>
        <li class="breadcrumb-item">Cuenta</li>
        <li class="breadcrumb-item active">Perfil</li>
      </ol>
    </nav>
  </div>

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="assets/img/profile-img.png" alt="Profile" class="rounded-circle">
            <h2><?php echo $user['nombre'] . ' ' . $user['apellido'] ?></h2>
            <h3><?php echo $_SESSION['tipo_rol'] ?></h3>
            <div class="social-links mt-2">
              <a class="circle"><i class="bi bi-circle"></i></a>
              <a class="circle"><i class="bi bi-circle"></i></a>
              <a class="circle"><i class="bi bi-circle"></i></a>
              <a class="circle"><i class="bi bi-circle"></i></a>
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Descripción general</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Perfil</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Cambiar Contraseña</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Sobre mi</h5>
                <p class="small fst-italic"><?php echo $user['sobre_mi'] ?></p>

                <h5 class="card-title">Detalles</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nombre Completo</div>
                  <div class="col-lg-9 col-md-8"><?php echo $user['nombre'] . ' ' . $user['apellido'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Rol</div>
                  <div class="col-lg-9 col-md-8"><?php echo $_SESSION['tipo_rol'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Nacionalidad</div>
                  <div class="col-lg-9 col-md-8"><?php echo $user['nacionalidad'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Direccion</div>
                  <div class="col-lg-9 col-md-8"><?php echo $user['localidad'] . ', ' . $user['direccion'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Telefono</div>
                  <div class="col-lg-9 col-md-8"><?php echo $user['telefono'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Fecha Nacimiento</div>
                  <div class="col-lg-9 col-md-8"><?php echo $user['fecha_nacimiento'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8"><?php echo $user['email'] ?></div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <form id='modificarPerfil'>
                  <!-- Profile Edit Form -->
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Imagen de Perfil</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="assets/img/profile-img.png" alt="Profile">
                      <div class="pt-2">
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nombre</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="nombre" type="text" class="form-control" id="fullName" value=<?php echo $user['nombre'] ?>>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Apellido</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="apellido" type="text" class="form-control" id="fullName" value=<?php echo $user['apellido'] ?>>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="sobre mi" class="col-md-4 col-lg-3 col-form-label">Sobre mi</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="sobre_mi" class="form-control" id="about" style="height: 100px"><?php echo $user['sobre_mi'] ?></textarea>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Nacionalidad</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="nacionalidad" type="text" class="form-control" id="Job" value=<?php echo $user['nacionalidad'] ?>>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Localidad</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="localidad" type="text" class="form-control" id="Country" value=<?php echo $user['localidad'] ?>>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Direccion</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="direccion" type="text" class="form-control" id="Address" value=<?php echo $user['direccion'] ?>>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Fecha Nacimiento</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="fecha_nacimiento" type="date" class="form-control" id="Address" value=<?php echo $user['fecha_nacimiento'] ?>>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Telefono" class="col-md-4 col-lg-3 col-form-label">Telefono</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="telefono" type="text" class="form-control" id="telefono" value=<?php echo $user['telefono'] ?>>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="Email" value=<?php echo $user['email'] ?>>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>
              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form id='modificarContra'>

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Contraseña Actual</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="contra_vieja" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nueva Contraseña</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="contra_nueva" type="password" class="form-control" id="newPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Volver a Ingresar Nueva Contraseña</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?= $this->endSection() ?>
<!DOCTYPE html>
<!-- saved from url=(0060)https://coreui.io/demos/bootstrap/5.0/light-v3/register.html -->
<html lang="es-419" data-coreui-theme="dark">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!--<base href="./">-->
	<base href=".">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta name="description" content="CoreUI - Bootstrap Admin Template">
	<meta name="author" content="Łukasz Holeczek">
	<meta name="keyword" content="Bootstrap,Admin,Template,SCSS,HTML,RWD,Dashboard">
	<title>Registro de Usuario</title>
	<link rel="apple-touch-icon" sizes="57x57" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="32x32" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!-- Vendors styles-->
	<link rel="stylesheet" href="CoreUI Bootstrap Admin Template_files/simplebar.css">
	<link rel="stylesheet" href="CoreUI Bootstrap Admin Template_files/simplebar(1).css">
	<!-- Main styles for this application-->
	<link href="CoreUI Bootstrap Admin Template_files/style.css" rel="stylesheet">
	<!-- We use those styles to show code examples, you should remove them in your application.-->
	<link href="CoreUI Bootstrap Admin Template_files/examples.css" rel="stylesheet">
	<script async="" src="CoreUI Bootstrap Admin Template_files/gtm.js.descarga"></script>
	<script src="CoreUI Bootstrap Admin Template_files/config.js.descarga"></script>
	<script src="CoreUI Bootstrap Admin Template_files/color-modes.js.descarga"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<!-- Google Tag Manager-->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-KX4JH47');
	</script>
	<!-- End Google Tag Manager-->
	<style type="text/css">
		@font-face {
			font-family: Roboto;
			src: url("chrome-extension://mcgbeeipkmelnpldkobichboakdfaeon/css/Roboto-Regular.ttf");
		}
	</style>
</head>

<body>
	<!-- Google Tag Manager (noscript)-->
	<noscript>
		<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KX4JH47" height="0" width="0" style="display:none;visibility:hidden"></iframe>
	</noscript>
	<!-- End Google Tag Manager (noscript)-->
	<div class="min-vh-100 d-flex flex-row align-items-center">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="card mb-4 mx-4">
						<div class="card-body p-4">
							<h1>Registro De Usuario</h1>
							<form id="formularioRegistro">
								<p class="text-body-secondary">Crear una cuenta</p>
								<div class="input-group mb-3">
									<span class="input-group-text">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person icon" viewBox="0 0 16 16">
											<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
										</svg></span>
									<input class="form-control" type="text" placeholder="Nombre" name="nombre">
									<span class="input-group-text">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person icon" viewBox="0 0 16 16">
											<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
										</svg></span>
									<input class="form-control" type="text" placeholder="Apellido" name="apellido">
								</div>
								<div class="input-group mb-3">
									<span class="input-group-text">
										<i class="bi bi-signpost-split"></i>
									</span>
									<input class="form-control" type="text" placeholder="Localidad" name="localidad">
									<span class="input-group-text">
										<i class="bi bi-signpost-split"></i>
									</span>
									<input class="form-control" type="text" placeholder="Direccion" name="direccion">
								</div>
								<div class="input-group mb-3"><span class="input-group-text">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
											<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
										</svg></span>
									<input class="form-control" type="text" placeholder="Email" name="email">
								</div>
								<div class="input-group mb-3">
									<span class="input-group-text">
										<i class="bi bi-airplane-engines"></i>
									</span>
									<input class="form-control" type="text" placeholder="Nacionalidad" name="nacionalidad">
									<span class="input-group-text">
									<i class="bi bi-calendar"></i>
									</span>
									<input class="form-control" type="date" placeholder="Fecha de Nacimiento" name="fecha_nacimiento">
								</div>
								<div class="input-group mb-3"><span class="input-group-text">
										<i class="bi bi-body-text"></i></span>
									<textarea class="form-control" type="text" placeholder="Sobre mi" name="sobre_mi"></textarea>
								</div>
								<div class="input-group mb-3">
									<span class="input-group-text">
										<i class="bi bi-person-vcard icon"></i>
									</span>
									<input class="form-control" type="text" placeholder="Numero de DNI" name="dni">
								</div>
								<div class="input-group mb-3"><span class="input-group-text">
										<i class="bi bi-telephone icon"></i></span>
									<input class="form-control" type="text" placeholder="Telefono" name="telefono">
								</div>
								<div class="input-group mb-3"><span class="input-group-text">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock icon" viewBox="0 0 16 16">
											<path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
											<path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z" />
										</svg></span>
									<input class="form-control" type="password" placeholder="Contraseña" name="contra">
									<span class="input-group-text">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock icon" viewBox="0 0 16 16">
											<path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
											<path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z" />
										</svg></span>
									<input class="form-control" type="password" placeholder="Repetir Contraseña" name="repetir contra">

								</div>

								<button class="btn btn-block btn-success" type="submit">Crear Cuenta</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- CoreUI and necessary plugins-->
	<script src="CoreUI Bootstrap Admin Template_files/coreui.bundle.min.js.descarga"></script>
	<script src="CoreUI Bootstrap Admin Template_files/simplebar.min.js.descarga"></script>
	<script src="CoreUI Bootstrap Admin Template_files/i18next.min.js.descarga"></script>
	<script src="CoreUI Bootstrap Admin Template_files/i18nextHttpBackend.js.descarga"></script>
	<script src="CoreUI Bootstrap Admin Template_files/i18nextBrowserLanguageDetector.js.descarga"></script>
	<script src="CoreUI Bootstrap Admin Template_files/i18next.js.descarga"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="assets/js/registrar.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		const header = document.querySelector('header.header');

		document.addEventListener('scroll', () => {
			if (header) {
				header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
			}
		});
	</script>
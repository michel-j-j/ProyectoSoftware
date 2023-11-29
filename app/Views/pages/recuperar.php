<!DOCTYPE html>
<!-- saved from url=(0057)https://coreui.io/demos/bootstrap/5.0/light-v3/login.html -->
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
	<title>Sistema de recuperacion</title>
	<link rel="apple-touch-icon" sizes="57x57" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="https://coreui.io/demos/bootstrap/5.0/light-v3/assets/favicon/android-icon-192x192.png">
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="assets/js/recuperar.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
				<div class="col-md-4">
					<div class="card-group d-block d-md-flex row">
						<div class="card col-md-7 p-4 mb-0">
							<div class="card-body">
								<h1>Recuperacion</h1>
								<p class="text-body-secondary">Recuperar Contraseña</p>
								<form id="formularioRecuperacion">

									<div class="input-group mb-3"><span class="input-group-text">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
												<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
											</svg></span>
										<input class="form-control" type="email" placeholder="Email" name="email" required>
									</div>
									<div class="row">
										<div class="text-center">
											<button class="btn btn-warning px-4 " type="submit">Recuperar</button>
								</form>
							</div>
						</div>
					</div>
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
</body>

</html>
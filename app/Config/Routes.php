<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


//Get request ENTIDAD
//PRUEBAS CON DASHBOARD Y CARGAR DOCUMENTACION DESDE EL USUARIO
$routes->get('/', 'ControladorPrincipal::index');
$routes->get('/dashboard/user', 'ControladorPrincipal::dashboardUsuario');
$routes->get('/dashboard/admin', 'ControladorPrincipal::dashboardAdministrador');
$routes->get('/user/cargarDocumentacion', 'ControladorPrincipal::agregarDocumentos');
$routes->post('/user/cargarDoc', 'ControladorPrincipal::agregarDoc');
//FIN PRUEBA

//Creacion de entidades
$routes->get('/nuevaEntidad', 'EntidadController::formularioEntidad'); //Muestra el formulario para una nueva entidad
$routes->post('/nuevaEntidad', 'EntidadController::formularioEntidad'); //Manda el formulario y vuelve a cargar la pagina
//Listar entidades
$routes->get('/listaEntidades', 'EntidadController::entidadesList'); //Lista las entidades
//Modificar entidades
$routes->get('/modificarEntidad/(:num)', 'EntidadController::modificarEntidad/$1'); //Muestra el formulario para editar entidades
$routes->post('/modificarEntidad/(:num)', 'EntidadController::modificarEntidad/$1'); // Hace el update de una entidad

//Eliminar entidades
//$routes->get('/eliminarEntidad/(:num)', 'EntidadController::eliminarEntidad/$1');
$routes->post('/eliminarEntidad', 'EntidadController::eliminarEntidad');
//Rutas, usuarios
// $routes->get('/pantallaTesting', 'AdminController::index');

$routes->get('/login', 'LoginController::login');
$routes->post('/login/logear', 'LoginController::logear');
$routes->get('/registrar', 'LoginController::registrar');
$routes->post('/registrar/registrarse', 'LoginController::registrarse');

$routes->get('/recuperar', 'LoginController::recuperar');
$routes->post('/recuperar/recuperarse', 'LoginController::recuperarse');

$routes->get('forms/formDocumentacion', 'DocumentacionController::formularioDocumentacion');
$routes->post('insertarDocumentacion', 'DocumentacionController::insertarDocumentacion');
$routes->get('listarDocumentacion/(:num)', 'DocumentacionController::listarDocumentacion/$1');
$routes->post('/eliminarDocumentacion', 'DocumentacionController::eliminarDocumentacion');
$routes->get('modificarDocumento/(:num)', 'DocumentacionController::modificarDocumentacion/$1');
$routes->post('modificarDocumento', 'DocumentacionController::modificarDocumentacion');

$routes->get('miDocumentacion/(:num)', 'DocumentacionController::miDocumentacion/$1');
$routes->post('denunciarDocumentacion', 'DenunciaController::denunciarDocumentacion');

$routes->get('forms/formUsuarios_admin', 'UserController::formularioUsuario_admin');
$routes->post('forms/formUsuarios_admin', 'UserController::formularioUsuario_admin');

$routes->get('forms/modificarUsuario/(:num)', 'UserController::modificarUsuario/$1');
$routes->post('forms/modificarUsuario', 'UserController::modificarUsuario/$1');

$routes->get('tables/listaUsuarios', 'UserController::userList');
$routes->post('forms/eliminarUsuario/', 'UserController::eliminarUsuario/');

$routes->get('seleccionarUsuarioDenuncia', 'DenunciaController::seleccionarUsuarioDenuncia');
$routes->post('administrarDenuncias', 'DenunciaController::administrarDenunciasActivas');

$routes->get('perfil', 'PerfilController::perfil');

$routes->post('modificar', 'PerfilController::modificarPerfil');

$routes->post('modificarContra', 'PerfilController::modificarContrasena');

$routes->get('configuracion', 'PerfilController::configuracionPerfil');

$routes->get('cerrarSesion', 'PerfilController::cerrarSesion');
$routes->post('cambiarEstadoDocumentacion', 'DocumentacionController::cambiarEstadoDocumentacion');

$routes->get('listadoDenuncias', 'DenunciaController::listadoDenuncias');

$routes->get('administrarTipoDocumentacion', 'TipoDocumentacionController::administrarTipoDocumentacion');
$routes->post('administrarTipoDocumentacion', 'TipoDocumentacionController::administrarTipoDocumentacion');

$routes->post('eliminarTipoDocumentacion', 'TipoDocumentacionController::eliminarTipoDocumentacion');

$routes->get('documentacionAsociada/(:num)', 'DenunciaController::documentacionAsociada/$1');
$routes->get('misDenuncias/(:num)', 'DenunciaController::misDenuncias/$1');
$routes->get('selecccionarDenunciarDocumentacion/(:num)', 'DocumentacionController::selecccionarDenunciarDocumentacion/$1');
$routes->get('listarTiposDeDocumentacion', 'TipoDocumentacionController::listarTiposDeDocumentacion');
$routes->get('modificarTipoDocumento/(:num)', 'TipoDocumentacionController::modificarTipoDocumento/$1');
$routes->post('modificarTipoDocumento', 'TipoDocumentacionController::modificarTipoDocumento');


$routes->post('cancelarDenuncia', 'DenunciaController::cancelarDenuncia');

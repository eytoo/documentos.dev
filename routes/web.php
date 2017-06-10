<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get("/acopiosystem-generate-backup", function () {
    Artisan::queue('backup:run', ["--only-db" => true]);
    if (str_contains(URL::previous(), 'admin/emp/backups')) {
        return redirect()->back();
    }
});

Route::get("imagenes/{entity}/{folder}/{file}", function ($entity = "cursos", $folder = "iconos", $file) {
    $path = storage_path("app/" . $entity . "/" . $folder . "/" . $file);
    return response()->file($path);
});

Route::get("crear/admin", function () {
    $admin                  = new App\Admin();
    $admin->admin_nombre    = "Cesar";
    $admin->admin_apellidos = "Cueva Mejia";
    $admin->admin_email     = "imarvdt@gmail.com";
    $admin->admin_password  = Hash::make("1234");
    $admin->save();
});

Route::get("check/admin", function () {
    return Auth::user();
});

Route::group(['domain' => 'cursania.dev'], function () {
    Route::group(["middleware" => "web"], function () {
        Route::get('{provider}/authorize', 'Front\AuthController@authorise');
        Route::get('{provider}/login', 'Front\AuthController@socialLogin');
        //Home
        Route::get('/', 'Front\IndexController@getIndex');
        Route::get('welcome', 'Front\IndexController@getIndexLogin')->middleware("auth.client");

        Route::get('curso/{url}', 'Front\CursoController@getCurso')->name("curso");
        Route::get('post/{url}', 'Front\BlogController@getPost');
        Route::get('nosotros', 'Front\IndexController@getNosotros');
        Route::get('faq', 'Front\IndexController@getFaq');

        // Autentificación
        Route::post('auth/dologin', 'Front\AuthController@login');
        Route::post('auth/doregister', 'Front\AuthController@registro');
        Route::get('auth/logout', 'Front\AuthController@logout');

        // Comentario
        Route::get('comentario/formulario/{tipo}/{cont_id}/{cont_url}', 'Front\ComentarioController@getFormComnetario');
        Route::get('comentario/publicar', 'Front\ComentarioController@postComentario')->middleware("auth.client");
        Route::post('comentario/public', 'Front\ComentarioController@postComentario')->middleware("auth.client");
        Route::get('cur/redir', 'Front\ComentarioController@getRedireccionar')->middleware("auth.client");
    });

});

/**
 * Rutas para la sitio de administración (Team Cursania)
 */
Route::group(['domain' => 'team.cursania.dev'], function () {

    Route::get('/', function () {
        if (Auth::check()) {
            return redirect("home");
        } else {
            return redirect('login');
        }
    });

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'OtherController@login');
    //Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('/home', 'HomeController@index');

    Route::group(['prefix' => 'admin', "middleware" => "web", "middleware" => "auth"], function () {
        // Roles y permisos
        Route::resource("roles", "RoleController");
        Route::resource("roles", "RoleController");
        Route::post('config/saveperms', 'OtherController@guardarPermisos');

        // Productores
        Route::resource('productores', 'ProductorController');

        // Plantas
        Route::resource("plantas", "PlantaController");

        //Compras
        Route::resource("compras", "CompraController");

        //Ventas
        Route::resource("ventas", "VentaController");

        //Usuarios
        Route::resource('administradores', 'AdminController');
        Route::resource('usuarios', 'UserController');

        //Usuarios
        Route::resource('empresa', 'EmpresaController');
        Route::get('emp/bono', 'EmpresaController@bono');
        Route::get('emp/cantidad', 'EmpresaController@cantidad');
        Route::get('sistema/onof', 'EmpresaController@onof');
        Route::get('sistema/imagenes', 'EmpresaController@imagenes');

        Route::get('reportes/productores', 'ReporteController@productores')->name("reprod");
        Route::get('reportes/ventas', 'ReporteController@ventas')->name("repventas");
        Route::get('reportes/compras', 'ReporteController@compras')->name("repcompras");
        Route::get('reportes/bono/productor', 'ReporteController@bonoProductor')->name("repbonopro");
        Route::get('reportes/bono/acopio', 'ReporteController@bonoAcopio')->name("repbonoacopio");

        Route::get("emp/backups", "OtherController@getBackups");

        Route::resource('cursos', 'CursoController');
        Route::resource('rubros', 'RubroController');
        Route::resource('categorias', 'CategoriaController');
        Route::resource('profesores', 'ProfesorController');
        Route::resource('temas', 'TemaController');
        Route::resource('lecciones', 'LeccionController');
        Route::get('vimeo/validar', 'LeccionController@validar');

        // Blog
        Route::resource('postcategorias', 'PostCategoriaController');
        Route::resource('entradas', 'PostController');
        Route::post('post/uploadImage', 'PostController@uploadImage');

        //Planes
        Route::resource('plan', 'PlanController');
    });
});

//

/*Route::get('percrear', function () {
$editUser = new App\Permission();
$editUser->name = 'rep_prod_all';
$editUser->display_name = 'Reporte de productores'; // optional
$editUser->save();
});*/

/*
Route::resource('comentario', 'ComentarioController');
Route::resource('etiqueta', 'EtiquetaController');
Route::resource('categoria', 'CategoriaController');
Route::resource('etiquetacont', 'EtiquetaContController');

Route::resource('postcategoria', 'PostCategoriaController');
Route::resource('rubro', 'RubroController');
Route::resource('descuento', 'DescuentoController');
Route::resource('cupon', 'CuponController');
Route::resource('plan', 'PlanController');
Route::resource('curso', 'CursoController');
Route::resource('profesores', 'ProfesorController');
Route::resource('profesorcurso', 'ProfesorCursoController');
Route::resource('user', 'UserController');
Route::resource('usuariocursos', 'UsuarioCursosController');
Route::resource('tema', 'TemaController');
Route::resource('leccion', 'LeccionController');
Route::resource('ventacab', 'VentaCabController');
Route::resource('errorpagos', 'ErrorPagosController');
Route::resource('pagospen', 'PagosPenController');
Route::resource('tipopago', 'TipoPagoController');
Route::resource('serviciopago', 'ServicioPagoController');
Route::resource('ventadet', 'VentaDetController');
Route::resource('suscripcion', 'SuscripcionController');
Route::resource('testimonio', 'TestimonioController');
Route::resource('empresa', 'EmpresaController');
Route::resource('ticket', 'TicketController');
Route::resource('admin', 'AdminController');
 */

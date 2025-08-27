<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\compraController; 
use App\Models\UserSony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite; // Asegurate de importar Socialite si usas facade

// HOME
Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])
    ->name('home');

Route::get('novedades', [\App\Http\Controllers\HomeController::class, 'novedades'])
    ->name('novedades');

// PRODUCTOS
Route::get('producto', [\App\Http\Controllers\ProductoController::class, 'index'])
    ->name('producto.index');

Route::get('producto/{id}', [\App\Http\Controllers\ProductoController::class, 'view'])
    ->name('producto.view')
    ->whereNumber('id');

Route::get('producto/publicar', [\App\Http\Controllers\ProductoController::class, 'create'])
    ->name('producto.create')
    ->middleware(['auth', 'cliente.acceso']);

Route::post('producto/publicar', [\App\Http\Controllers\ProductoController::class, 'store'])
    ->name('producto.store')
    ->middleware(['auth', 'cliente.acceso']);

Route::get('producto/{id}/eliminar', [\App\Http\Controllers\ProductoController::class, 'delete'])
    ->name('producto.delete')
    ->whereNumber('id')
    ->middleware(['auth', 'cliente.acceso']);

Route::delete('producto/{id}/eliminar', [\App\Http\Controllers\ProductoController::class, 'destroy'])
    ->name('producto.destroy')
    ->whereNumber('id')
    ->middleware(['auth', 'cliente.acceso']);

Route::get('producto/editar/{id}', [\App\Http\Controllers\ProductoController::class, 'edit'])
    ->name('producto.edit')
    ->whereNumber('id')
    ->middleware(['auth', 'cliente.acceso']);

Route::put('producto/editar/{id}', [\App\Http\Controllers\ProductoController::class, 'update'])
    ->name('producto.update')
    ->whereNumber('id')
    ->middleware(['auth', 'cliente.acceso']);

// USUARIOS
Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])
    ->name('users.index')
    ->middleware('auth');

Route::get('users/{id}', [\App\Http\Controllers\UserController::class, 'view'])
    ->name('users.view')
    ->whereNumber('id')
    ->middleware('auth');

Route::get('users/crear', [\App\Http\Controllers\UserController::class, 'create'])
    ->name('users.create')
    ->middleware(['auth', 'cliente.acceso']);

Route::post('/usuarios/create', [\App\Http\Controllers\UserController::class, 'store'])
    ->name('users.store')
    ->middleware(['auth', 'cliente.acceso']);

Route::get('users/{id}/eliminar', [\App\Http\Controllers\UserController::class, 'delete'])
    ->name('users.delete')
    ->whereNumber('id')
    ->middleware(['auth', 'cliente.acceso']);

Route::delete('users/{id}/eliminar', [\App\Http\Controllers\UserController::class, 'destroy'])
    ->name('users.destroy')
    ->whereNumber('id')
    ->middleware(['auth', 'cliente.acceso']);

Route::get('users/editar/{id}', [\App\Http\Controllers\UserController::class, 'edit'])
    ->name('users.edit')
    ->whereNumber('id')
    ->middleware(['auth']);

Route::put('users/editar/{id}', [\App\Http\Controllers\UserController::class, 'update'])
    ->name('users.update')
    ->whereNumber('id')
    ->middleware(['auth']);

Route::get('registrarse', [\App\Http\Controllers\UserController::class, 'registre'])
    ->name('users.registre');

Route::post('registrarse', [\App\Http\Controllers\UserController::class, 'storeRegistre'])
    ->name('users.storeRegistre');

// LOGIN
Route::get('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'login'])
    ->name('auth.login');

Route::post('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'authenticate'])
    ->name('auth.authenticate');

Route::post('cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('auth.logout');

// BLOG
Route::get('blog', [\App\Http\Controllers\BlogController::class, 'index'])
    ->name('blog.index');

Route::get('blog/{id}', [\App\Http\Controllers\BlogController::class, 'view'])
    ->name('blog.view')
    ->whereNumber('id');

Route::get('blog/publicar', [\App\Http\Controllers\BlogController::class, 'create'])
    ->name('blog.create')
    ->middleware(['auth', 'cliente.acceso']);

Route::post('blog/publicar', [\App\Http\Controllers\BlogController::class, 'store'])
    ->name('blog.store')
    ->middleware(['auth', 'cliente.acceso']);

Route::get('blog/{id}/eliminar', [\App\Http\Controllers\BlogController::class, 'delete'])
    ->name('blog.delete')
    ->whereNumber('id')
    ->middleware(['auth', 'cliente.acceso']);

Route::delete('blog/{id}/eliminar', [\App\Http\Controllers\BlogController::class, 'destroy'])
    ->name('blog.destroy')
    ->whereNumber('id')
    ->middleware(['auth', 'cliente.acceso']);

Route::get('blog/editar/{id}', [\App\Http\Controllers\BlogController::class, 'edit'])
    ->name('blog.edit')
    ->whereNumber('id')
    ->middleware(['auth', 'cliente.acceso']);

Route::put('blog/editar/{id}', [\App\Http\Controllers\BlogController::class, 'update'])
    ->name('blog.update')
    ->whereNumber('id')
    ->middleware(['auth', 'cliente.acceso']);

// CARRITO
Route::post('/carrito/agregar/{producto}', [CompraController::class, 'agregarAlCarrito'])
    ->middleware('auth')
    ->name('carrito.agregar');

Route::delete('/carrito/eliminar/{producto}', [CompraController::class, 'eliminarDelCarrito'])
    ->middleware('auth')
    ->name('carrito.eliminar');

Route::get('/carrito', [CompraController::class, 'verCarrito'])
    ->middleware('auth')
    ->name('carrito.ver');

Route::post('/carrito/comprar', [CompraController::class, 'compraCarrito'])
    ->name('carrito.comprar');

Route::get('/ventas', [CompraController::class, 'index'])
    ->name('ventas.index');






// LOGIN GOOGLE (Socialite)
Route::get('/auth/google', function () {
    return Socialite::driver('google')->with(['prompt' => 'select_account'])->redirect();
})->name('google.login');


Route::get('/auth/google/callback', function () {
    $user_google = Socialite::driver('google')->stateless()->user();


    $user = UserSony::updateOrCreate(
        ['google_id' => $user_google->id],
        [
            'name' => $user_google->name,
            'email' => $user_google->email,
            'role' => 'Cliente',
        ]
    );

    Auth::login($user);

    if (is_null($user->password)) {
        return redirect()->route('auth.set_password');
    }

    // Redirige a su perfil si ya tiene contraseña
    return redirect()->route('users.index', ['id' => $user->id]);
});



// Mostrar formulario para setear contraseña
Route::get('/set-password', function () {
    return view('users.set_password');
})->middleware('auth')->name('auth.set_password_form');

// Guardar contraseña
Route::post('/set-password', function(Request $request) {
    $request->validate([
        'password' => 'required|min:6|confirmed',
    ]);

    $user = Auth::user();

    if (!$user) {
        return redirect()->route('auth.login')->withErrors('Debes iniciar sesión primero.');
    }

    $user->password = bcrypt($request->password);
    $user->save();

    return redirect()->route('home')->with('success', 'Contraseña actualizada correctamente.');
})->middleware('auth')->name('auth.set_password');




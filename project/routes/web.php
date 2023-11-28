<?php
use Illuminate\http\Request;
use App\Models\Crud;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*Route::get('/inscription', function () {
    return view('inscription');
});*/
Route::post('/ciar_plano', function (Request $informacoes) {
    Crud::create([
        'm-nome'=>$informacoes->m_nome,
    ]);
});
Route::resource('students', StudentController::class);



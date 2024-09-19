<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::get('/', function () {
    return view('welcome');
});
Route::view('/teste','tela-teste');
Route::view('/cadastro','tela-cadastro');

Route::post('/salva-usuario', function(Request $request){
$user = new User();
$user->name = $request->nome;
$user->email = $request->email;
$user->password = $request->senha;
$user->save();

return "salvo com sucesso";

}
) ->name('SalvaUsuario');
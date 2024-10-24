<?php

use App\Models\Noticia;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;



Route::get('/', function () {
    return view('home');
})
->name('home');

Route::view('/teste','tela-teste');

Route::view('/cadastro','tela-cadastro')->name('telaCadastro');

Route::view('/login','login')->name('login');

Route::post('/salva-usuario', function(Request $request){
$user = new User();
$user->name = $request->nome;
$user->email = $request->email;
$user->password = $request->senha;
$user->save();

return redirect()->route('home');

}
) ->name('SalvaUsuario');


Route::post('/logar', 
    function(Request $request){
       
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('home');
        }
 
        return back()->withErrors([
            'email' => 'Essas credenciais não correspondem com nenhuma existente em nosso sistema.',
        ])->onlyInput('email');
    
    }
    ) ->name('logar');


    Route::get('/logout',
        function (Request $request){
            Auth::logout();
            $request->session()->regenerate();
            return redirect()->route('home');
        }
    )->name('logout');

    Route::get('/gerencia-noticias',
                function(){

                    $noticias = Noticia::all();

                    return view('gerencia-noticias' , compact('noticias'));

                }
    )->name('gerenciaNoticias');
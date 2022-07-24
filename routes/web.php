<?php

use Illuminate\Support\Facades\Route;
use App\Mail\MensagemTestMail;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]); // verify habilita a verificação de email

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home')
->middleware('verified');
Route::resource('tarefa', 'App\Http\Controllers\TarefaController')->middleware('verified');

Route::get('mensagem-teste', function(){
    return new MensagemTestMail();
   // Mail::to('tiagoeinez@gmail.com')->send(new MensagemTestMail()); // posso para debug, só executar esta linha de código no tinker, não esquecer de dar um use na class use App\Mail\MensagemTestMail;
   // return 'E-mail enviado com sucesso';
});

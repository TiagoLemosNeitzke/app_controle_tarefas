<?php

use Illuminate\Support\Facades\Route;
use App\Mail\MensagemTestMail;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('tarefa', 'App\Http\Controllers\TarefaController');

Route::get('mensagem-teste', function(){
    return new MensagemTestMail();
   // Mail::to('tiagoeinez@gmail.com')->send(new MensagemTestMail()); // posso para debug, só executar esta linha de código no tinker, não esquecer de dar um use na class use App\Mail\MensagemTestMail;
   // return 'E-mail enviado com sucesso';
});

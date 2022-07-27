@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-center mb-4">
            <img src="../img/logo.png" alt="logo marca do app">
        </div>

        <div class="mt-8 overflow-hidden bg-white shadow dark:bg-gray-800 sm:rounded-lg">

            <div class="container p-4">
                <div class="row d-flex justify-contant-center">
                    <h2 class="mb-4 text-center">Seja Bem vindo ao app Controle de Tarefas! </h2>
                    <p class="text-center"> Faça login para continuar.</p>

                    <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                    <p class="text-center mt-3"> Ainda não tem uma conta?  </p>
                    <a class="btn btn-primary" href="{{ route('register') }}">Cadastre-se</a>
                </div>
            </div>


        </div>

        <div class="mt-4 flex justify-center sm:items-center sm:justify-between">
            <div class="ml-4 text-center text-sm text-gray-500 sm:ml-0 sm:text-right">
                Controle de tarefas v1.0.0 (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </div>
@endsection

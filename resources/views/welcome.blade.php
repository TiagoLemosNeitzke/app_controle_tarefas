@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-center mb-4 mt-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor"
                class="bi bi-list-task text-primary" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z" />
                <path
                    d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z" />
                <path fill-rule="evenodd"
                    d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z" />
            </svg>

        </div>

        <div class="mt-4 overflow-hidden bg-white shadow dark:bg-gray-800 sm:rounded-lg">
            <div class="container">
                <div class="row d-flex">
                    <h2 class="fw-bold mb-4 mt-4 text-center">Seja Bem vindo ao app Controle de Tarefas! </h2>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <p class="text-center"> Já tem uma conta? Faça login.</p>

                <div class="d-flex justify-content-center">
                    <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                </div>

                <p class="mt-3 text-center"> Ainda não tem uma conta? </p>
                 <div class="d-flex justify-content-center">
                    <a class="btn btn-primary" href="{{ route('register') }}">Cadastre-se</a>
                </div>
                
            </div>
        </div>

        <div class="mt-4 pb-2 flex justify-center sm:items-center sm:justify-between fixed-bottom">
            <div class="ml-4 text-center fs-6 text-gray-500 sm:ml-0 sm:text-right">
                App Controle de tarefas <b>v1.0.0</b> (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </div>
@endsection

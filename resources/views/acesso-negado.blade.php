@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center mb-4">
            <img src="../img/logo.png" alt="logo marca do app">
        </div>

        <div class="mt-8 overflow-hidden bg-white shadow dark:bg-gray-800 sm:rounded-lg">

            <div class="container pb-4">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header text-danger text-center">Acesso negado!</div>

                            <div class="card-body text-danger text-center">
                                Desculpe! Você não pode acessar este recurso.
                            </div>
                        </div>
                    </div>
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

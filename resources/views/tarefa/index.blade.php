@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-info">
                    <div class="card-header border-info">
                        <h5 class="card-title">Olá <b>{{ $name }}</b>! Veja abaixo sua lista de tarefas.</h5>
                        <nav class="nav nav-bar">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Tarefas
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li class="nav-item">
                                        <a class="btn btn-primary ms-4 mb-2" href="{{ route('tarefa.create') }}">Nova
                                            Tarefa</a>
                                    </li>
                                    <li>
                                        <a class="btn btn-primary me-4 ms-4 mb-2"
                                            href="{{ route('tarefa.exportacao', ['xlsx']) }}">XLSX</a>
                                    </li>
                                    <li>
                                        <a class="btn btn-primary me-4 ms-4 mb-2"
                                            href="{{ route('tarefa.exportacao', ['csv']) }}">CSV</a>
                                    </li>
                                    <li>
                                        <a class="btn btn-primary me-4 ms-4" href="{{ route('tarefa.exportar') }}"
                                            target="_blank">PDF</a>
                                    </li>
                                </ul>
                            </li>
                        </nav>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tarefa</th>
                                    <th scope="col">Data limite conclusão</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($tarefas as $tarefa)
                                    <tr scope="row">
                                        <td>{{ $tarefa->id }}</td>
                                        <td>{{ $tarefa->tarefa }}</td>
                                        <td>{{ date('d/m/Y', strtotime($tarefa->data_limite_conclusao)) }}</td>
                                        <td><a class="btn btn-success"
                                                href="{{ route('tarefa.edit', ['tarefa' => $tarefa->id]) }}">Editar</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('tarefa.destroy', ['tarefa' => $tarefa->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link"
                                        href="{{ $tarefas->previousPageUrl() }}">Voltar</a></li>
                                @for ($i = 1; $i <= $tarefas->lastPage(); $i++)
                                    <li class="page-item {{ $tarefas->currentPage() == $i ? 'active' : '' }}"><a
                                            class="page-link" href="{{ $tarefas->url($i) }}">{{ $i }}</a></li>
                                @endfor
                                <li class="page-item"><a class="page-link" href="{{ $tarefas->nextPageUrl() }}">Avançar</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    @endsection

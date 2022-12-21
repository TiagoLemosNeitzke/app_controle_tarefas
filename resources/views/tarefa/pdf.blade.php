<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        .titulo {
            border: 1px;
            background: #ddd;
            text-align: center;
            width: 100%;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .page-break {
            page-break-after: always;
        }

        table {
            width: 100%;
            border: 1px solid #ddd;
        }

        th {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="titulo"> Lista de Tarefas </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tarefa</th>
                <th>Data limite conclusão</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tarefas as $tarefa)
                <tr>
                    <td>{{ $tarefa->id }}</td>
                    <td>{{ $tarefa->tarefa }}</td>
                    <td>{{ date('d/m/Y', strtotime($tarefa->data_limite_conclusao)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <div class="page-break"></div> --}} {{-- DESCOMENTAR PARA CRIAR UMA NOVA PÁGINA À PARTIR DAQUI --}}
    
    {{-- @for ($i = 1; $i < 4; $i++)
        <div class="page-break"></div>
        <h1> Página {{ $i }}</h1>
    @endfor --}} {{-- AQUI É UM EXEMPLO DE COM EU PODERIA GERAR VÁRIAS PÁGINAS --}}
</body>

</html>

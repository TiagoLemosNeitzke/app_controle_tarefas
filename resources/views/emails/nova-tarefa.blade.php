@component('mail::message')
# {{$tarefa}}

Data limite de conclusão: {{$data_limite_conclusao}}

@component('mail::button', ['url' => $url])
Ver tarefa
@endcomponent

Att,<br>
{{ config('app.name') }}
@endcomponent

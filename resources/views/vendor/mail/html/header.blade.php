<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'App Controle de Tarefas')
<img src="http://localhost:8000/img/logo.png" class="logo" alt="App Controle de Tarefas Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

@auth
    <h1>Bem vindo, {{ Auth::user()->name }}</h1>
   <p> ID:  {{ Auth::user()->id }}</p>
    <p> E-mail: {{ Auth::user()->email }} </p>
    
@endauth

@guest
    <h1>Bem vindo, visitante.</h1>
    <p> Tudo que está dentro do guest é exibido se o usuário não estiver autenticado.</p>
@endguest
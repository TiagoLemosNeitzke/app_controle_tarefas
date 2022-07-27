<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\NovaTarefaMail;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use App\Exports\TarefasExport;
use Maatwebsite\Excel\Facades\Excel;

class TarefaController extends Controller
{  
    public function __construct()
    {
       $this->middleware('auth');
    } 
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->check())
        {
            $name = auth()->user()->name;
            $user_id = auth()->user()->id;
            //dd($id);
            $tarefas = Tarefa::where('user_id', $user_id)->paginate(1);
            //dd($tarefas);
            return view('tarefa.index', ['name' => $name, 'tarefas' => $tarefas]);
        }        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all('tarefa', 'data_limite_conclusao');
        $dados['user_id'] = auth()->user()->id;
        //dd($dados);
        $tarefa = Tarefa::create($dados);
        $destinatario = auth()->user()->email; // pega o endereço de email do usuário logado
        //Mail::to($destinatario)->send(new NovaTarefaMail($tarefa)); // descomentar para enviar email sempre que uma tarefa for criada
        return redirect()->route('tarefa.show', ['tarefa' => $tarefa->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
        $name = auth()->user()->name;
        $user_id = auth()->user()->id;
        //dd($id);
        $tarefas = Tarefa::where('user_id', $user_id)->paginate(1);
        //dd($tarefas);
        return view('tarefa.index', ['name' => $name, 'tarefas' => $tarefas]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        $id = auth()->user()->id;
        $user_id = $tarefa->user_id;

        if($id === $user_id) {
            return view('tarefa.edit', ['tarefa' => $tarefa]);
        }

        return view('/acesso-negado');   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        if(auth()->user()->id === $tarefa->user_id) {
            $tarefa->update($request->all());
            return redirect()->route('tarefa.show', ['tarefa' => $tarefa]);
        }

        return view('/acesso-negado');      
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        //dd(auth()->user()->id, $tarefa->user_id);
        if(auth()->user()->id === $tarefa->user_id) {
            Tarefa::destroy($tarefa->id);
        } else {
            return view('acesso-negado');
        }
        $name = auth()->user()->name;
        $user_id = auth()->user()->id;
        $tarefas = Tarefa::where('user_id', $user_id)->paginate(1);
        return view('tarefa.index', ['name' => $name, 'tarefas' => $tarefas]);
    }

    public function exportacao()
    {
        return Excel::download(new TarefasExport, 'tarefas.xlsx');
    }
}

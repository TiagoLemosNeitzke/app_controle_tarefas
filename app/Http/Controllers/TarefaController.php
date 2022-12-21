<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\NovaTarefaMail;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use App\Exports\TarefasExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

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
        if (auth()->check()) {
            $name = auth()->user()->name;
            $user_id = auth()->user()->id;
           
            $tarefas = Tarefa::where('user_id', $user_id)->orderBy('data_limite_conclusao', 'asc')->paginate(5);
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
        
        $tarefas = Tarefa::where('user_id', $user_id)->orderBy('data_limite_conclusao', 'asc')->paginate(5);
      
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

        if ($id === $user_id) {
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
        if (auth()->user()->id === $tarefa->user_id) {
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
        if (auth()->user()->id === $tarefa->user_id) {
            Tarefa::destroy($tarefa->id);
        } else {
            return view('acesso-negado');
        }
        $name = auth()->user()->name;
        $user_id = auth()->user()->id;
        $tarefas = Tarefa::where('user_id', $user_id)->paginate(5);
        return view('tarefa.index', ['name' => $name, 'tarefas' => $tarefas]);
    }

    public function exportacao($tipo_arquivo)
    {
        if (in_array($tipo_arquivo, ['xlsx', 'csv', 'pdf'])) {
            return Excel::download(new TarefasExport, 'tarefas.'.$tipo_arquivo);
        }
        
        return redirect()->route('tarefa.index');
    }

    public function exportar()
    {
        $tarefas = auth()->user()->tarefas()->get();
        $pdf = Pdf::loadView('tarefa.pdf', ['tarefas' => $tarefas]);
       // $pdf->setPaper('a4', 'landscape'); //landscape -> horizontal | portrait -> vertical
        //return $pdf->download('tarefa.pdf'); //descomentar para download automático
        return $pdf->stream('tarefa.pdf'); //descomentar para download manual
    }
}

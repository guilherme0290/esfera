<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Empresas;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionariosController extends Controller
{
    
    public function index()
    {
        $funcionarios = Funcionario::paginate(10);    
        $empresas = Empresa::all();
        return view('tableFuncionarios', compact('funcionarios','empresas'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {

        $regras = [           
            'nome' => 'required',            
            'sobrenome' => 'required',           
        ];
        $mensagens = [
            'required' => 'O campo :attribute é obrigatório !',              
        ];

        $request->validate($regras, $mensagens);

        $funcionario = Funcionario::create([
            'nome'=> $request->input('nome'),
            'sobrenome' => $request->input('sobrenome'),
            'empresa_id' => $request->input('empresa'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone')
        ]);

        if (isset($funcionario)){          
            $funcionarios = Funcionario::paginate(10);
            return view('tableFuncionarios',compact('funcionarios'))->with('success', 'Funcionario criado com sucesso !!!');
        }else{
            return view ('funcionarios')->with('error','Erro ao criar funcionario');
        }
    }

    
    public function show($id)
    {
        $funcionarios = Funcionario::find($id);
        $empresas = Empresa::all();
        return view('funcionarios',compact('funcionarios','empresas'));
    }

    
    public function new(){
        $empresas = Empresa::all();
        return view('funcionarios',compact('empresas'));
    }

    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        $regras = [           
            'nome' => 'required',            
            'sobrenome' => 'required',           
        ];
        $mensagens = [
            'required' => 'O campo :attribute é obrigatório !',              
        ];

        $request->validate($regras, $mensagens);

        $funcionario = Funcionario::find($id);
        if (isset($funcionario)){
            $funcionario->nome = $request->input('nome');
            $funcionario->sobrenome = $request->input('sobrenome');
            $funcionario->empresa_id = $request->input('empresa');
            $funcionario->email = $request->input('email');
            $funcionario->telefone = $request->input('telefone');
            $funcionario->save();
            return redirect()->route('funcionario_show',$funcionario->id)->with('success','Funcionário alterado com sucesso');
        }
        return redirect()->back()->with('warning','Funcionario não encontrado');
    }

   
    public function destroy($id)
    {
        $funcionario =  Funcionario::find($id);
        if (isset($funcionario)){            
            $funcionario->delete();
            return redirect()->back()->with('success','Funcionario deletado com sucesso');
        }
        return redirect()->back()->with('warning','Funcionario não encontrado! ');
    }
}

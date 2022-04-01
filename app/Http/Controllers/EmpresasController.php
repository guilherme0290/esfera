<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpresasController extends Controller
{
   
    public function index()
    {
        $empresas = Empresa::paginate(10);
        return view('tableEmpresas',compact('empresas'));
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        
        $regras = [           
            'nome' => 'required',            
            'logotipo' => 'dimensions:min_width=100,min_height=100',           
        ];
        $mensagens = [
            'required' => 'O campo :attribute é obrigatório !',   
            'logotipo.dimensions' => 'O tamanho da imagem deve ser mair que 100x100 px',
        ];

        $request->validate($regras, $mensagens);
     
       $empresa = Empresa::create([
            'nome' => $request->input('name'),
            'email' => $request->input('email'),
            'site' => $request->input('site'),
            'logotipo' => $this->salvarImg($request)
        ]);
       

        if (isset($empresa)){
            $empresas = Empresa::paginate(10);
            return view('tableEmpresas',compact('empresas'))->with('success', 'Empresa criada com sucesso !!!');
        }else{
            return view ('empresas')->with('error','Erro ao criar empresa');
        }
    }

    public function salvarImg(Request $request){

        $path = null;
        if ($request->hasFile('logotipo')) {            
            $file = $request->logotipo;
            $path = Storage::disk('public')->put("imagens", $file); //salva a imagem e retorno o path
        }
        return 'storage/'.$path;
    }

   
    public function show($id)
    {
        $empresas = Empresa::find($id);
        
        return view('empresas',compact('empresas'));
       
    }

    public function new(){
        return view('empresas');
    }

  
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {

        $regras = [           
            'nome' => 'required',            
            'logotipo' => 'dimensions:min_width=100,min_height=100',           
        ];
        $mensagens = [
            'required' => 'O campo :attribute é obrigatório !',   
            'logotipo.dimensions' => 'O tamanho da imagem deve ser mair que 100x100 px',
        ];

        $request->validate($regras, $mensagens);

        $empresa =  Empresa::find($id);
        if (isset($empresa)){
            $empresa->nome = $request->input('name');
            $empresa->email = $request->input('email');
            $empresa->site = $request->input('site');
            $empresa->logotipo = $this->salvarImg($request);    
            $empresa->save();            
            return redirect()->route('empresa_show',$empresa->id)->with('success','Empresa alterada com sucesso');
        }
        return redirect()->back()->with('warning','Empresa não encontrada');
    }

   
    public function destroy($id)
    {
        $empresa =  Empresa::find($id);

        if (isset($empresa)){
             $func = Funcionario::where('empresa_id',$empresa->id)->first();
             if (isset($func)){
                return redirect()->back()->with('warning','Empresa vinculada a um funcionario, não é possivel deletar! ');
             }
            $empresa->delete();
            return redirect()->back()->with('success','Empresa deletada com sucesso');
        }
        return redirect()->back()->with('warning','Empresa não encontrada! ');

    }
}

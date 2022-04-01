@extends('adminlte::page')


@section('title', 'Funcionarios')

@section('content_header')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                <strong>Erro ao cadastrar funcionario:</strong>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('success') }}
        </div>
    @elseif(session()->has('warning'))
        <div class="alert alert-warning alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('warning') }}
        </div>
    @endif
@stop

@section('content')
    <div class="container-fluid">
      
        <div class="col">
            <div class="form-group row">
                <div class="col-md-3 col-sm-6 col-12" id="buttoncad">      
                  <a href="{{route('funcionario_new')}}"  class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Novo Funcionário</a>
                </div> 
            </div> 

            <div class="card">
                <div class="card-body">
                    <table id="tabelafuncionarios" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Empresa</th>                                           
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($funcionarios as $r)
                                <tr>
                                    <td>{{$r->id}}</td>
                                    <td>{{$r->nome}}</td>
                                    <td>{{$r->email}}</td>
                                    <td>{{$r->empresa->nome}}</td>    
                                                                                                             
                                                                        
                                    <td style="width: 80px;">
                                       <a  type="button" href="{{route('funcionario_show',$r->id)}}"  class="fas fa-edit edit" style="font-size:24px;" title="Editar" ></a> 
                                       <a type="button"  href="/funcionarios/del/" class="fas fa-trash-alt canc" style="font-size:24px;" title="Deletar" data-toggle="modal" data-target="#modalcanc"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        @include('modals.modalCanc')
       
    </div>
@endsection


@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
@stop

@section('js') 
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>   
    <script src="{{ asset('js/modalConfimaExclusao.js') }}"></script>
    
@stop

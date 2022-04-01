@extends('adminlte::page')


@section('title', 'Empresas')

@section('content_header')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                <strong>Erro ao cadastrar empresa:</strong>
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
                  <a href="{{route('empresa_new')}}"  class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Nova Empresa</a>
                </div> 
            </div> 
            
            <div class="card">
                <div class="card-body">
                    <table id="tabelaempresas" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Site</th>                                           
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empresas as $r)
                                <tr>
                                    <td>{{$r->id}}</td>
                                    <td>{{$r->nome}}</td>
                                    <td>{{$r->email}}</td>                                   
                                    <td>{{$r->site}}</td>    
                                                                           
                                                                        
                                    <td style="width: 80px;">
                                       <a  type="button" href="{{route('empresa_show',$r->id)}}"  class="fas fa-edit edit" style="font-size:24px;" title="Editar" ></a> 
                                       <a type="button"  href="/empresas/del/" class="fas fa-trash-alt canc" style="font-size:24px;" title="Deletar" data-toggle="modal" data-target="#modalcanc"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                {{-- <div class="card-footer">
                    <h5 class="card-title">Exibindo {{ $empresas->count() }} de {{ $empresas->total() }}
                        ({{ $empresas->firstItem() }} a {{ $empresas->lastItem() }})
                        @if (isset($filtro))
                            {{ $empresas->appends($filtro)->links() }}
                        @else
                            {{ $empresas->links() }}
                        @endif
                    </h5>
                </div> --}}
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

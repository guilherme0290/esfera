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
              
            <div class="card">
                <div class="card-header">Cadastro de empresa</div>
                @if (isset($empresas))
                    <form action="{{route('empresa_edit',$empresas->id)}}" enctype="multipart/form-data" method="POST">
                        @method('PUT')
                    @else
                        <form action="{{route('empresa_store')}}" enctype="multipart/form-data" method="POST">
                            @method('POST')

                @endif
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label class=" col-form-label">ID:</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" id="id" value="{{ $empresas->id ?? '' }}"
                                placeholder="ID" readonly>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="nome" class="col-sm-1.5 col-form-label">Nome:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="name" value="{{ $empresas->nome ?? '' }}"
                                id="nome" placeholder="Nome...">
                        </div>
                        <label for="site" class="col-sm-1.5 col-form-label">Site:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="site"
                                value="{{ $empresas->site ?? '' }}" id="site" placeholder="Site...">
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="email" class="col-sm-1.5 col-form-label">Email:</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" name="email" value="{{ $empresas->nome ?? '' }}"
                                id="email" placeholder="Email...">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telefone" class="col-sm-1.5 col-form-label">Telefone:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="telefone" value="{{ $empresas->nome ?? '' }}"
                                id="telefone" placeholder="Telefone...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="logotipo" class="col-sm-1.5 col-form-label">Logotipo:</label>
                        <div class="col-sm-5">
                            <input type="file" accept="image/*"  name="logotipo" 
                                id="logotipo" required>
                        </div>
                    </div>
                    <div class="form-group row">        
                        @if(isset($empresas->logotipo))
                            <img id="blah" src="{{ asset($empresas->logotipo)}}"  alt="" />
                        @else
                            <img id="blah" src="#"  alt="" />
                        @endif
                    </div>




                    <button class="btn btn-primary btn-sm btn-block">Salvar</button>
                </div>
                </form>
            </div>
        </div>
        {{-- </div> --}}
    </div>
@endsection

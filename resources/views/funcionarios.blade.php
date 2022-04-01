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
              
            <div class="card">
                <div class="card-header"></div>
                @if (isset($funcionarios))
                    <form action="{{route('funcionario_edit',$funcionarios->id)}}" method="POST">
                        @method('PUT')
                    @else
                        <form action="{{route('funcionario_store')}}" method="POST">
                            @method('POST')

                @endif
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label class=" col-form-label">ID:</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" id="id" value="{{ $funcionarios->id ?? '' }}"
                                placeholder="ID" readonly>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="nome" class="col-sm-1.5 col-form-label">Nome:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="nome" value="{{ $funcionarios->nome ?? '' }}"
                                id="nome" placeholder="Nome...">
                        </div>
                        <label for="sobrenome" class="col-sm-1.5 col-form-label">Sobrenome:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="sobrenome"
                                value="{{ $funcionarios->sobrenome ?? '' }}" id="sobrenome" placeholder="Sobrenome...">
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="empresa" class="col-sm-1.5 col-form-label">Empresa:</label>
                        <div class="col-sm-3">
                            <select class="form-control select2" name="empresa" id="empresa">
                                <option selected disabled>---</option>

                                @foreach ($empresas as $c)
                                        @if ($funcionarios->empresa_id ?? '')
                                            <option value="{{ $c->id }}"
                                                {{ $funcionarios->empresa_id == $c->id ? 'selected' : '' }}>
                                                {{ $c->nome}}</option>
                                        @else
                                            <option value="{{ $c->id }}">{{ $c->nome }}</option>
                                        @endif
                                    @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-1.5 col-form-label">Email:</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" name="email" value="{{ $funcionarios->email ?? '' }}"
                                id="email" placeholder="Email...">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telefone" class="col-sm-1.5 col-form-label">Telefone:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="telefone" value="{{ $funcionarios->nome ?? '' }}"
                                id="telefone" placeholder="Telefone...">
                        </div>
                    </div>



                    <button class="btn btn-primary btn-sm btn-block">Salvar</button>
                </div>
                </form>
            </div>
        </div>
        {{-- </div> --}}
    </div>
@endsection

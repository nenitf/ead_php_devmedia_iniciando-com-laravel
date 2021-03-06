@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <ol class="breadcrumb card-header">
                    <li class="breadcrumb-item">
                        <a href="{{ route('clientes.index') }}">Clientes</a>
                    </li>
                    <li class="breadcrumb-item active">Adicionar</li>
                </ol>

                <div class="card-body">
                    <form action="{{ route('clientes.salvar') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input
                                type="text"
                                name="nome"
                                class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                                placeholder="Nome do cliente">
                            @if($errors->has('nome'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('nome') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input
                                type="text"
                                name="email"
                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                placeholder="Email do cliente">
                            @if($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input
                                type="text"
                                name="endereco"
                                class="form-control {{ $errors->has('endereco') ? 'is-invalid' : '' }}"
                                placeholder="Endereço do cliente">
                            @if($errors->has('endereco'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('endereco') }}</strong>
                            </span>
                            @endif
                        </div>
                        <button class="btn btn-info">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


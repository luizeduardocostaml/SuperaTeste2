@extends('layouts.index')

@section('title')
    Login
@endsection

@section('content')
    <div class="container bg-light p-1">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link btn btn-danger" href="{{route('logout')}}">Logout</a>
            </li>
        </ul>
    </div>
    <div class="container m-1">
        <div class="card ">
            <div class="card-header">
                Dados Pessoais
                <a href="{{route('getEditUser')}}" class="btn btn-info" title="Editar dados">Editar</a>
                <a href="{{route('deleteUser')}}" class="btn btn-danger" title="Apagar Usuário">Excluir</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-body">
                <div class="row">
                    <p>Nome: {{$user->name}}</p>
                </div>
                <div class="row">
                    <p>{{$user->email}}</p>
                </div>
                <div class="row">
                    <p>CPF: {{$user->cpf}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container m-1">
        <div class="card ">
            <div class="card-header">
                Endereços
                <a href="{{route('getStoreAddress')}}" class="btn btn-primary">Adicionar novo endereço</a>
            </div>
            @if(session('addressSuccess'))
                <div class="alert alert-success m-1">
                    {{ session('addressSuccess') }}
                </div>
            @endif
            <div class="card-body">
                @foreach($addresses as $address)
                    <div class="card m-2">
                        @if($address->active === '1')
                            <div class="card-header">Endereço Padrão</div>
                        @endif
                        <div class="container">
                            <div class="row">
                                <div class="col-6">CEP: {{$address->cep}}</div>
                                <div class="col-6">Complemento: {{$address->complement}}</div>
                            </div>
                            <div class="row">
                                <div class="col-6">Logradouro: {{$address->street}}</div>
                                <div class="col-6">Cidade: {{$address->city}}</div>
                            </div>
                            <div class="row">
                                <div class="col-6">Número: {{$address->number}}</div>
                                <div class="col-6">UF: {{$address->uf}}</div>
                            </div>
                            <div class="row m-1">
                                <div class="col">
                                    <a href="{{route('getEditAddress', ['id' => $address->id])}}" class="btn btn-info" title="Editar endereço">Editar</a>
                                </div>
                                <div class="col">
                                    <a href="{{route('deleteAddress', ['id' => $address->id])}}" class="btn btn-danger" title="Remover endereço">Remover</a>
                                </div>
                                <div class="col">
                                    @if($address->active === '0')
                                        <a href="{{route('setActive', ['id' => $address->id])}}" class="btn btn-primary" title="Definir endereço como padrão">Definir como Padrão</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

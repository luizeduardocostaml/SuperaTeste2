@extends('layouts.index')

@section('title')
    Cadastrar
@endsection

@section('content')
    <div class="row justify-content-md-center mt-5">
        <div class="card">
            <div class="card-header">
                Cadastro
            </div>
            <div class="card-body">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger m-1">{{$error}}</div>
                    @endforeach
                @endif
                <form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="number" class="form-control" id="cpf" name="cpf">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

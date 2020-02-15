@extends('layouts.index')

@section('title')
    Login
@endsection

@section('content')
    <div class="container bg-light p-1">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link btn btn-primary" href="{{route('getRegister')}}">Cadastrar</a>
            </li>
        </ul>
    </div>
    <div class="row justify-content-md-center mt-5">
        <div class="card">
            <div class="card-header">
                Login
            </div>
            <div class="card-body">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger m-1">{{$error}}</div>
                    @endforeach
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{route('login')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

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
                Dashboard
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
@endsection

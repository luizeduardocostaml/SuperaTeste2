@extends('layouts.index')

@section('title')
    Cadastrar
@endsection

@section('content')
    <div class="row justify-content-md-center mt-5">
        <div class="card">
            <div class="card-header">
                Editar Endereço
            </div>
            <div class="card-body">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger m-1">{{$error}}</div>
                    @endforeach
                @endif
                <form action="{{route('editAddress', ['id' => $address->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">CEP</label>
                        <input type="text" class="form-control" id="cep" name="cep" value="{{$address->cep}}">
                    </div>
                    <div class="form-group">
                        <label for="street">Logradouro</label>
                        <input type="text" class="form-control" id="street" name="street" value="{{$address->street}}">
                    </div>
                    <div class="form-group">
                        <label for="number">Número</label>
                        <input type="number" class="form-control" id="number" name="number" value="{{$address->number}}">
                    </div>
                    <div class="form-group">
                        <label for="complement">Complemento</label>
                        <input type="text" class="form-control" id="complement" name="complement" value="{{$address->complement}}">
                    </div>
                    <div class="form-group">
                        <label for="city">Cidade</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{$address->city}}">
                    </div>
                    <div class="form-group">
                        <label for="uf">UF</label>
                        <input type="text" class="form-control" id="uf" name="uf" value="{{$address->uf}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

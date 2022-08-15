@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        @if (isset($client))
            <h1>Editar Cliente!</h1>  
        @else
            <h1>Crear Cliente!</h1>
        @endif

        @if (isset($client))
            <form method="post" action="{{ route('client.update',$client) }}">
            @method('PUT')
        @else
            <form method="post" action="{{ route('client.store') }}">
        @endif
            @csrf
            <div class="form-group mb-3">
                <label for="name">Nombre</label>
                <input id="name" class="form-control" type="text" name="name" placeholder="Nombre del cliente" value="{{ old('name') ?? @$client->name }}">
                <small class="form-text text-muted">Escribe el nombre del cliente</small>
                @error('name')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="due">Saldo</label>
                <input id="due" class="form-control" type="number" name="due" placeholder="Saldo del cliente" step="0.01" value="{{ old('due') ?? @$client->due }}">
                <small class="form-text text-muted">Escribe el saldo del cliente</small>
                @error('due')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="comments">Comentarios</label>
                <textarea id="comments" class="form-control" cols="30" name="comments" rows="4">{{ old('comments') ?? @$client->comments }}</textarea>
                <small class="form-text text-muted">Escribe algunos comentarios</small>
            </div>
            @if (isset($client))
                <button class="btn btn-info" type="submit">Editar cliente</button>
            @else
                <button class="btn btn-info" type="submit">Guardar cliente</button>
            @endif
            <a href="{{ route('client.index') }}" class="btn btn-danger" type="button">Cancelar</a>
        </form>
    </div>
@endsection
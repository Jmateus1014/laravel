@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        <h1>Listado de Clientes!</h1>
        <a href="{{ route('client.create') }}" class="btn btn-primary">Crear cliente</a>
        @if (Session::has('mensaje'))
            <div class="alert alert-info my-5" role="alert">
                <strong>{{ Session::get('mensaje') }}</strong>
            </div>
            
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Saldo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->due }}</td>
                        <td>
                            <a href="{{ route('client.edit', $client) }}" class="btn btn-warning" type="button">Editar</a>
                            <form action="{{ route('client.destroy', $client) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estas seguro de eliminar el cliente?');">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No hay registros actualmente</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if ($clients->count())
            {{ $clients->links() }}
        @endif
    </div>
@endsection
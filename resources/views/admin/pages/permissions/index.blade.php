@extends('adminlte::page')

@section('title', 'Permissão')

@section('content_header')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <h1>Perfis <a href="{{ route('permissions.create') }}">
            <span class="btn btn-dark material-symbols-outlined">add_circle</span>
        </a></h1>


    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}" class="active">Perfis</a></li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('permissions.search') }}" method="POST" class="form form-inline">
                @csrf

                <input type="text" name="filter" placeholder="Filtrar" class="form-control"
                    value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width='250'>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->name }}
                            </td>
                            <td style="width=10px">
                                {{-- <a href="{{ route('details.profile.index', $permission->url) }}" class="btn btn-primary">Detalhes</a> --}}
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-warning">VER</a>
                                <a href="{{ route('permissions.profiles', $permission->id) }}" class="btn btn-warning"><i class="fas fa-address-book"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">

            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop

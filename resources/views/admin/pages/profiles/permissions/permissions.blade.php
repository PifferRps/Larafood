@extends('adminlte::page')

@section('title', 'Permissões do Perfil { $profile->name }')

@section('content_header')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <h1>Permissões do Perfil <strong>
            {{ $profile->name }}
        </strong>
        <a href="{{ route('profiles.permissions.available', $profile->id) }}">
            <span class="btn btn-dark">ADD NOVA PERMISSÂO</span>
        </a>
    </h1>


    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}" class="active">Perfis</a></li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width='50'>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->name }}
                            </td>
                            <td style="width=10px">
                                <a href="{{ route('profiles.permissions.detach', [$profile->id, $permission->id]) }}"
                                    class="btn btn-danger">Desvincular</a>
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

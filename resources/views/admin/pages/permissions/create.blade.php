@extends('adminlte::page')

@section('title', 'Permissão')

@section('content_header')
    <h1>Cadastrar Permissão</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action=" {{ route('permissions.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.permissions._partials.form')
            </form>
        </div>
    </div>
@endsection

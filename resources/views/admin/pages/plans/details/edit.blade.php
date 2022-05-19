@extends('adminlte::page')

@section('title', "Editar o detalhe {$detail->name}")

@section('content_header')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <h1>Editar o detalhe {{$detail->name}}</h1>


    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('details.plan.index', $plan->url) }}"">Detalhes</a></li>
        <li class="breadcrumb-item"><a href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}"class="active">Editar</a></li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('details.plan.update', [$plan->url, $detail->id])}}" method="POST">
                @method('PUT')
                @include('admin.pages.plans.details._partials.form')
            </form>
        </div>
    </div>
@endsection
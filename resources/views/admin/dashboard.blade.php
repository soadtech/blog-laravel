@extends('admin.layout')

@section('content')
    <h1>Dash board</h1>
    <p>Usuario autenticado: {{ auth()->user()->name}}</p>
@stop

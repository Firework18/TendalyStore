@extends('dashboard.user.app')

@section('titulo', 'Editar Dirección')

@section('titulo_contenido', 'Editar Dirección')

@section('primera_descripcion', 'Completa la información solicitada para editar el punto de entrega.')

@section('contenido')

    <livewire:editar-direccion :direccion='$direccion' />

@endsection

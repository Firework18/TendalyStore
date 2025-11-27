@extends('dashboard.user.app')

@section('titulo', 'Direcciones de Envío')

@section('titulo_contenido', 'Gestión de Direcciones')

@section('primera_descripcion',
    'Administra tus lugares de entrega. Puedes tener un máximo de 3 direcciones
    registradas.')

@section('contenido')


    <livewire:mostrar-direcciones />

@endsection

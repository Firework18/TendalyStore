@extends('dashboard.user.app')

{{-- Título de la pestaña --}}
@section('titulo', 'Nueva Dirección')

{{-- Cabecera del contenido --}}
@section('titulo_contenido', 'Agregar Nueva Dirección')

@section('primera_descripcion', 'Completa la información solicitada para registrar un nuevo punto de entrega.')

@section('contenido')

    <livewire:crear-direccion />

@endsection

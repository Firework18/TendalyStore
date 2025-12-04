@extends('layouts.app')

@section('titulo', 'Finalizar Compra - ' . $negocio->nombre)

@section('contenido')

    <livewire:checkout-component :negocio="$negocio" />

@endsection

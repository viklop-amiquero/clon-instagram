@extends('layouts.app')

@section('titulo')
    Página Principal
@endsection

@section('contenido')
    {{-- Contenido de esta página --}}

    <x-listar-post :posts="$posts"/> 
    
@endsection
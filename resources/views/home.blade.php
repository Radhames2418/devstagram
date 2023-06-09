@extends('layouts.app')

@section('titulo')
    Pagina Principal
@endsection

@section('contenido')
    <section class="container mx-auto mt-10">
        <x-listar-post :posts="$posts" />
    </section>
@endsection

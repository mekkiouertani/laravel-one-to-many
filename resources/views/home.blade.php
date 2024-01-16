@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Home</h1>
        <a class="btn btn-success" href="{{ route('admin.projects.index') }}">Visualizza i Progetti</a>
    </section>
@endsection

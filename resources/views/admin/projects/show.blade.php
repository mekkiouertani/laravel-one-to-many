@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>{{ $project->title }}</h1>
        <p>{!! $project->body !!}</p>
        <span>{{ $project->category->name }}</span>
        <img class="w-25 d-block mb-5" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">


        <button class="btn btn-primary d-inline-block">
            <a class="text-white text-decoration-none" href="{{ route('admin.projects.edit', $project->slug) }}">Edit</a>
        </button>

        <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger cancel-button">Delete</button>
        </form>
        @include('partials.modal_delete')
    @endsection

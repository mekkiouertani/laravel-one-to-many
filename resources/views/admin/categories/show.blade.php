@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>{{ $category->name }}</h1>
        <ul>
            @foreach ($categories->projects as $project)
                <li>{{ $project->title }}</li>
            @endforeach
        </ul>
    @endsection

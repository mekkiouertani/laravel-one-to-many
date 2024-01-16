@extends('layouts.app')
@section('content')
    <section class="container">
        <h2>Categorys</h2>

        @if (!empty(session('message')))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <table class="table table table-striped mt-5">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">
                            <a href="{{ route('admin.categories.show', $category->slug) }}">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                        </th>
                        <td> {{ $category->name }}</td>
                        <td> <a href="{{ route('admin.categories.edit', $category->slug) }}"
                                class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category->slug) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger cancel-button">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary mt-3">
            <a class="text-white text-decoration-none" href="{{ route('admin.categories.create') }}">Create</a>
        </button>
    </section>
    @include('partials.modal_delete')
@endsection

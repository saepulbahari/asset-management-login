@extends('layouts.main')

@section('title', 'Category Management')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Category</h1>

    <form class="flex gap-4 items-center justify-between mb-8">
        <input type="text" class="input" name="search" placeholder="Search categories...">
        <a href="/category/create" class="btn btn-primary">Create New Category</a>
    </form>

    <div class="overflow-x-auto mb-8">
        <table class="table table-sm table-zebra">
            <thead class="bg-gray-100">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Jumlah Asset</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->assets->count() }}</td>
                        <td class="flex gap-2 justify-end">
                            <a href="/category/{{ $category->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                            <form action="/category/{{ $category->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-error btn-sm">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $categories->links() }}
@endsection

@extends('layouts.main')

@section('title', 'Post Management')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Post</h1>

    <form class="flex gap-4 items-center justify-between mb-8">
        <input type="text" class="input" name="search" placeholder="Search posts...">
        <a href="/post/create" class="btn btn-primary">Create New Post</a>
    </form>

    <div class="overflow-x-auto mb-8">
        <table class="table table-sm table-zebra">
            <thead class="bg-gray-100">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $index => $post)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td class="flex gap-2 justify-end">
                            @can('update', $post)
                                <a href="/post/{{ $post->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                            @endcan

                            @can('delete', $post)
                                <form action="/post/{{ $post->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-error btn-sm">Delete</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $posts->links() }}
@endsection

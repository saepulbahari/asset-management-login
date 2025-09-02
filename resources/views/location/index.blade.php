@extends('layouts.main')

@section('title', 'Location')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Location</h1>

    <form class="flex gap-4 items-center justify-between mb-8">
        <input type="text" class="input" name="search" placeholder="Search locations...">
        <a href="/location/create" class="btn btn-primary">Create New Location</a>
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
                @foreach ($locations as $index => $location)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $location->name }}</td>
                        <td>{{ $location->assets->count() }}</td>
                        <td class="flex gap-2 justify-end">
                            <a href="/location/{{ $location->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                            <form action="/location/{{ $location->id }}" method="POST">
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
    {{ $locations->links() }}
@endsection

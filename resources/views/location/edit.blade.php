@extends('layouts.main')

@section('title', 'Edit Location')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Edit Location</h1>

    <form action="/location/{{ $location->id }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div class="flex flex-col space-y-4">
            <label for="name" class="block text-sm font-medium">Name</label>
            <input type="text" id="name" name="name" class="input" value="{{ $location->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Location</button>
    </form>
@endsection

@extends('layouts.main')

@section('title', 'Create Location')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Create Location</h1>

    <form action="/location" method="POST" class="space-y-4">
        @csrf
        <div class="flex flex-col space-y-4">
            <label for="name" class="block text-sm font-medium">Name</label>
            <input type="text" id="name" name="name" class="input" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Location</button>
    </form>
@endsection

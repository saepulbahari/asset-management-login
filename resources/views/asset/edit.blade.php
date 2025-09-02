@extends('layouts.main')

@section('title', 'Edit Asset')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Edit Asset</h1>

    <form action="/asset/{{ $asset->id }}" method="POST" class="space-y-4">
        @method('PUT')
        @csrf
        <div class="flex flex-col space-y-4">
            <label for="name" class="block text-sm font-medium">Name</label>
            <input type="text" id="name" name="name" class="input" required value="{{ $asset->name }}">
        </div>
        <div class="flex flex-col space-y-4">
            <label for="value" class="block text-sm font-medium">Value</label>
            <input type="number" id="value" name="value" class="input" required value="{{ $asset->value }}">
        </div>
        <div class="flex flex-col space-y-4">
            <label for="category" class="block text-sm font-medium">Category</label>
            <select id="category" name="category_id" class="input" required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $asset->category_id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col space-y-4">
            <label for="location" class="block text-sm font-medium">Location</label>
            <select id="location" name="location_id" class="input" required>
                <option value="">Select Location</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}" {{ $location->id == $asset->location_id ? 'selected' : '' }}>
                        {{ $location->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Asset</button>
    </form>
@endsection

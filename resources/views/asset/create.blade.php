@extends('layouts.main')

@section('title', 'Create Asset')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Create Asset</h1>

    {{-- @if ($errors->any())
        <div class="alert alert-error mb-8">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form action="/asset" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col space-y-4">
            <label for="name" class="block text-sm font-medium @error('name') text-error @enderror">Name</label>
            <div>
                <input type="text" id="name" name="name" class="input @error('name') input-error @enderror"
                    value="{{ old('name') }}">
                @error('name')
                    <div class="text-error mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="flex flex-col space-y-4">
            <label for="value" class="block text-sm font-medium @error('value') text-error @enderror">Value</label>
            <div>
                <input type="number" id="value" name="value" class="input @error('value') input-error @enderror"
                    value="{{ old('value') }}">
                @error('value')
                    <div class="text-error mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="flex flex-col space-y-4">
            <label for="category"
                class="block text-sm font-medium @error('category_id') text-error @enderror">Category</label>
            <div>
                <select id="category" name="category_id" class="select @error('category_id') select-error @enderror">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-error mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="flex flex-col space-y-4">
            <label for="location"
                class="block text-sm font-medium @error('location_id') text-error @enderror">Location</label>
            <div>
                <select id="location" name="location_id" class="select @error('location_id') select-error @enderror">
                    <option value="">Select Location</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}" @if (old('location_id') == $location->id) selected @endif>
                            {{ $location->name }}</option>
                    @endforeach
                </select>
                @error('location_id')
                    <div class="text-error mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="flex flex-col space-y-4">
            <label for="image" class="block text-sm font-medium @error('image') text-error @enderror">Image</label>
            <div>
                <input type="file" id="image" name="image"
                    class="file-input @error('image') input-error @enderror" value="{{ old('image') }}">
                @error('image')
                    <div class="text-error mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Create Asset</button>
    </form>
@endsection

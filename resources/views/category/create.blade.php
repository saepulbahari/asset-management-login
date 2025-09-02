@extends('layouts.main')

@section('content')
    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold mb-8">Create Category</h1>

        <form action="/category" method="POST" class="space-y-4">
            @csrf
            <div class="flex flex-col space-y-4">
                <label for="name" class="block text-sm font-medium">Name</label>
                <input type="text" id="name" name="name" class="input" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>
@endsection

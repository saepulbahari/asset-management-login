@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <h1 class="text-3xl mb-8">Selamat Datang</h1>

    <form class="flex flex-1 gap-4 mb-8">
        <input type="text" class="input flex-1" name="search" placeholder="Cari Asset..." value="{{ $request->search }}">
        <select id="category" name="category_id" class="select">
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $request->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}</option>
            @endforeach
        </select>

        <select id="location" name="location_id" class="select">
            <option value="">-- Pilih Lokasi --</option>
            <?php foreach ($locations as $location): ?>
            <option value="{{ $location->id }}" {{ $request->location_id == $location->id ? 'selected' : '' }}>
                {{ $location->name }}</option>
            <?php endforeach; ?>
        </select>
        <button class="btn btn-primary" type="submit">Filter</button>
        <a href="/" class="btn btn-primary btn-outline" type="reset">Reset</a>
    </form>

    <div class="flex gap-4 flex-wrap items-center justify-between">
        @foreach ($assets as $asset)
            <div class="card bg-base-100 w-60 shadow-sm">
                <figure class="h-40">
                    @if ($asset->image)
                        <img src="{{ asset('storage/' . $asset->image) }}" alt="{{ $asset->name }}" />
                    @else
                        <img src="https://prd.place/400?id={{ $asset->id }}" alt="{{ $asset->name }}" />
                    @endif
                </figure>
                <div class="card-body">
                    <h2 class="card-title">{{ $asset->name }}</h2>

                    <div class="flex flex-col gap-4 mb-4">
                        <div class="badge badge-soft badge-primary">
                            {{ $asset->valueInRupiah }}
                        </div>

                        <div class="flex gap-2 flex-wrap">
                            <div class="badge badge-outline badge-info badge-sm">
                                {{ $asset->location->name }}
                            </div>

                            <div class="badge badge-outline badge-info badge-sm">
                                {{ $asset->category->name }}
                            </div>
                        </div>
                    </div>


                    <div class="card-actions justify-center">
                        <a href="/asset/{{ $asset->id }}" class="btn btn-primary w-full">Minat</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $assets->links() }}
    </div>
@endsection

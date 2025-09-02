@extends('layouts.main')

@section('title', 'Kelola Aset')

@section('content')
    <h1 class="text-3xl font-bold mb-8">Kelola Aset</h1>

    <div class="mb-8 border border-gray-300 shadow rounded-2xl p-8">
        <h2 class="text-xl font-bold">Total Nilai Aset: Rp. {{ number_format($sum, 0, ',', '.') }}</h2>
    </div>

    <div class="flex gap-4 items-center mb-8">
        <form class="flex flex-1 gap-4">
            <input type="text" class="input" name="search" placeholder="Cari Asset..." value="{{ $request->search }}">
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
            <a href="/asset" class="btn btn-primary btn-outline" type="reset">Reset</a>
        </form>

        <a href="/asset/create" class="btn btn-primary">+ Tambah Aset Baru</a>
    </div>


    <!-- List assets -->
    <div class="overflow-x-auto mb-8">
        <table class="table table-sm table-zebra">
            <!-- head -->
            <thead class="bg-gray-100">
                <tr>
                    <th>#</th>
                    <th>Nama Aset</th>
                    <th>Nilai</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @foreach ($assets as $index => $asset)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="font-bold @if ($asset->trashed()) line-through text-error @endif">
                            {{ $asset->name }}
                        </td>
                        <td>
                            <div class="badge badge-soft badge-primary">
                                {{ $asset->valueInRupiah }}
                            </div>
                        </td>
                        <td>
                            <div class="badge badge-outline badge-info badge-sm">
                                {{ $asset->category->name }}
                            </div>
                        </td>
                        <td>{{ $asset->location->name }}</td>
                        <td class="flex gap-2 justify-end">
                            <a href="/asset/{{ $asset->id }}/edit" class="btn btn-warning btn-sm btn-soft">Edit</a>

                            <form action="/asset/{{ $asset->id }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus aset ini?')">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-error btn-sm btn-soft">Hapus</button>
                            </form>

                            <form action="/asset/{{ $asset->id }}/force" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus aset ini?')">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-error btn-sm btn-soft">Hapus Permanen</button>
                            </form>

                            <form action="/asset/{{ $asset->id }}/restore" method="POST"
                                onsubmit="return confirm('Yakin ingin mengembalikan aset ini?')">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm btn-soft">Kembalikan</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    {{ $assets->links() }}
@endsection

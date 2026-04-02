@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Tambah Kategori
        </div>

        <div class="card-body">
            <form action="{{ route('backend.kategori.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <button class="btn btn-success btn-sm">Simpan</button>
                <a href="{{ route('backend.kategori.index') }}" class="btn btn-secondary btn-sm">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection

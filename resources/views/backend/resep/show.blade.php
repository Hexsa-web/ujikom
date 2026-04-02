@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Detail Resep: {{ $resep->judul }}</h5>
            <a href="{{ route('backend.resep.index') }}" class="btn btn-secondary btn-sm">Kembali ke Daftar</a>
        </div>

        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-4">
                    @if($resep->foto)
                        <img src="{{ asset('storage/' . $resep->foto) }}" 
                             alt="{{ $resep->judul }}" 
                             class="img-fluid rounded shadow" 
                             style="max-height: 400px; object-fit: cover;">
                    @else
                        <div class="bg-light p-5 text-center rounded">
                            <i class="ti ti-photo fs-1 text-muted"></i><br>
                            Tidak ada foto
                        </div>
                    @endif
                </div>

                <div class="col-md-8">
                    <table class="table table-borderless">
                        <tr>
                            <th width="180">Judul</th>
                            <td>: {{ $resep->judul }}</td>
                        </tr>
                        <tr>
                            <th>Penerbit</th>
                            <td>: {{ $resep->penerbit }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>: {{ $resep->kategori->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>: {{ $resep->deskripsi }}</td>
                        </tr>
                    </table>

                    <hr>

                    <h5 class="mt-4">Bahan-bahan</h5>
                    @if(count($resep->bahan) > 0)
                        <ol class="list-group list-group-numbered mb-4">
                            @foreach($resep->bahan as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">{{ $item['nama'] }}</div>
                                    </div>
                                    @if(!empty($item['jumlah']))
                                        <span class="badge bg-primary rounded-pill">{{ $item['jumlah'] }}</span>
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                    @else
                        <p class="text-muted">Belum ada bahan yang ditambahkan.</p>
                    @endif

                    <h5 class="mt-4">Langkah-langkah</h5>
                    @if(count($resep->langkah) > 0)
                        <ol class="list-group list-group-numbered">
                            @foreach($resep->langkah as $step)
                                <li class="list-group-item">{{ $step }}</li>
                            @endforeach
                        </ol>
                    @else
                        <p class="text-muted">Belum ada langkah yang ditambahkan.</p>
                    @endif

                    <div class="mt-5">
                        <a href="{{ route('backend.resep.edit', $resep->id) }}" class="btn btn-warning">
                            <i class="ti ti-edit"></i> Edit Resep
                        </a>
                        <a href="{{ route('backend.resep.index') }}" class="btn btn-outline-secondary">
                            Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
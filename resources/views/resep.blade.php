@extends('layouts.front') <!-- Ganti dengan layout frontend kamu, misal layouts.app atau layouts.front -->

@section('content')

<section class="recipe-detail section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <!-- Back Button -->
                <div class="mb-4">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm">
                        <i class="ti ti-arrow-left me-2"></i> Kembali
                    </a>
                </div>

                <!-- Card Detail -->
                <div class="card shadow-lg border-0">
                    <div class="row g-0">
                        <!-- Foto (kiri) -->
                        <div class="col-lg-5">
                            @if($resep->foto)
                                <img src="{{ asset('storage/' . $resep->foto) }}" 
                                     class="img-fluid rounded-start h-100 object-fit-cover" 
                                     alt="{{ $resep->judul }}" 
                                     style="min-height: 500px;">
                            @else
                                <div class="bg-light h-100 d-flex align-items-center justify-content-center rounded-start">
                                    <i class="ti ti-photo-off fs-1 text-muted"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Konten (kanan) -->
                        <div class="col-lg-7">
                            <div class="card-body p-5">
                                <!-- Judul -->
                                <h2 class="card-title fw-bold mb-3">{{ $resep->judul }}</h2>

                                <!-- Info kecil -->
                                <div class="d-flex flex-wrap gap-3 mb-4">
                                    <span class="badge bg-primary-subtle text-primary px-3 py-2">
                                        <i class="ti ti-user me-1"></i> {{ $resep->penerbit }}
                                    </span>
                                    <span class="badge bg-info-subtle text-info px-3 py-2">
                                        <i class="ti ti-tag me-1"></i> {{ $resep->kategori->nama ?? 'Uncategorized' }}
                                    </span>
                                </div>

                                <!-- Deskripsi -->
                                <h5 class="fw-semibold mb-3">Deskripsi</h5>
                                <p class="text-muted mb-5">
                                    {!! nl2br(e($resep->deskripsi)) !!}
                                </p>

                                <!-- Bahan-bahan -->
                                <h5 class="fw-semibold mb-3">Bahan-bahan</h5>
                                @if(count($resep->bahan ?? []) > 0)
                                    <ul class="list-group list-group-flush mb-5">
                                        @foreach($resep->bahan as $item)
                                            <li class="list-group-item px-0 py-2 border-0">
                                                <div class="d-flex justify-content-between">
                                                    <span class="fw-medium">{{ $item['nama'] }}</span>
                                                    @if(!empty($item['jumlah']))
                                                        <span class="text-muted">{{ $item['jumlah'] }}</span>
                                                    @endif
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-muted">Belum ada daftar bahan.</p>
                                @endif

                                <!-- Langkah-langkah -->
                                <h5 class="fw-semibold mb-3">Langkah-langkah</h5>
                                @if(count($resep->langkah ?? []) > 0)
                                    <ol class="list-group list-group-numbered mb-5">
                                        @foreach($resep->langkah as $step)
                                            <li class="list-group-item px-0 py-3 border-0">
                                                {{ $step }}
                                            </li>
                                        @endforeach
                                    </ol>
                                @else
                                    <p class="text-muted">Belum ada langkah pembuatan.</p>
                                @endif

                                <!-- Tombol share / print (opsional) -->
                                <div class="d-flex gap-3 mt-5">
                                    <button class="btn btn-outline-primary">
                                        <i class="ti ti-share me-1"></i> Bagikan
                                    </button>
                                    <button class="btn btn-outline-secondary">
                                        <i class="ti ti-printer me-1"></i> Cetak
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
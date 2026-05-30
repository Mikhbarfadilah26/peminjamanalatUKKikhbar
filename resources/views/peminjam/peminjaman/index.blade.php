@extends('layouts.apppeminjam')

@section('content')

@php
    \Carbon\Carbon::setLocale('id');
@endphp

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="bg-primary text-white p-4 rounded shadow-sm mb-4">
        <h3 class="fw-bold mb-1">
            <i class="fas fa-handshake me-2"></i>
            Status Peminjaman Saya
        </h3>
        <small>
            Melihat status peminjaman alat
        </small>
    </div>

    {{-- ALERT SUCCESS WITH TEXT TO SPEECH --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm border-0">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if ('speechSynthesis' in window) {
                    window.speechSynthesis.cancel();

                    @if(isset($data) && $data->count() > 0)
                        @php
                            $pinjam = $data->first();
                        @endphp
                        let pesan = "Peminjaman {{ $pinjam->jumlah }} unit {{ $pinjam->alat->nama_alat }} sedang diajukan. Silakan menunggu persetujuan petugas.";
                    @else
                        let pesan = "Peminjaman anda sedang diajukan. Silakan menunggu persetujuan petugas.";
                    @endif

                    let suara = new SpeechSynthesisUtterance(pesan);
                    suara.lang = 'id-ID';
                    suara.volume = 1;
                    suara.rate = 0.9;
                    suara.pitch = 1;

                    speechSynthesis.speak(suara);
                }
            });
        </script>
    @endif

    {{-- ALERT ERROR --}}
    @if(session('error'))
        <div class="alert alert-danger shadow-sm border-0">
            <i class="fas fa-exclamation-triangle me-2"></i>
            {{ session('error') }}
        </div>
    @endif

    {{-- TABLE --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th width="60" class="text-center">No</th>
                            <th>Foto</th>
                            <th>Nama Alat</th>
                            <th>Tanggal Pinjam</th>
                            <th>Jatuh Tempo</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $item)
                            <tr>
                                {{-- NO --}}
                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>

                                {{-- FOTO --}}
                                <td width="120">
                                    @if($item->alat && $item->alat->foto)
                                        <img src="{{ asset('foto/alat/'.$item->alat->foto) }}"
                                             width="90"
                                             height="70"
                                             class="rounded shadow-sm"
                                             style="object-fit:cover;"
                                             alt="{{ $item->alat->nama_alat }}">
                                    @else
                                        <span class="text-muted small">
                                            <i class="fas fa-image me-1"></i> Tidak ada foto
                                        </span>
                                    @endif
                                </td>

                                {{-- NAMA ALAT --}}
                                <td>
                                    <div class="fw-bold">
                                        {{ $item->alat ? $item->alat->nama_alat : 'Alat tidak ditemukan' }}
                                    </div>
                                    @if($item->alat)
                                        <small class="text-muted">
                                            Kondisi : {{ ucfirst(str_replace('_', ' ', $item->alat->kondisi)) }}
                                        </small>
                                    @endif
                                </td>

                                {{-- TANGGAL PINJAM --}}
                                <td>
                                    <div class="fw-bold text-primary">
                                        <i class="fas fa-calendar-day me-1"></i>
                                        {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->translatedFormat('l') }}
                                    </div>
                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y') }}
                                    </small>
                                </td>

                                {{-- JATUH TEMPO --}}
                                <td>
                                    <div class="fw-bold text-success">
                                        <i class="fas fa-calendar-check me-1"></i>
                                        {{ \Carbon\Carbon::parse($item->tanggal_kembali)->translatedFormat('l') }}
                                    </div>
                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d-m-Y') }}
                                    </small>
                                </td>

                                {{-- JUMLAH --}}
                                <td class="text-center fw-bold">
                                    {{ $item->jumlah }}
                                </td>

                                {{-- STATUS --}}
                                <td class="text-center">
                                    @if($item->status == 'pending')
                                        <span class="badge bg-warning text-dark px-3 py-2">
                                            <i class="fas fa-clock me-1"></i> Menunggu Persetujuan
                                        </span>
                                    @elseif($item->status == 'approved')
                                        <span class="badge bg-success px-3 py-2">
                                            <i class="fas fa-check-circle me-1"></i> Disetujui
                                        </span>
                                    @elseif($item->status == 'rejected')
                                        <span class="badge bg-danger px-3 py-2">
                                            <i class="fas fa-times-circle me-1"></i> Ditolak
                                        </span>
                                    @elseif($item->status == 'selesai')
                                        <span class="badge bg-primary px-3 py-2">
                                            <i class="fas fa-box me-1"></i> Selesai
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-5">
                                    <i class="fas fa-box-open fa-3x mb-3 text-secondary"></i>
                                    <br>
                                    <span class="fw-bold">Belum ada data peminjaman</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
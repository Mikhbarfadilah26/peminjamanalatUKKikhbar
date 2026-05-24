@extends('layouts.apppeminjam')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Daftar Alat
            </h3>

            <p class="text-muted mb-0">
                Pilih alat yang ingin dipinjam
            </p>

        </div>


        {{-- SEARCH --}}
        <div style="width:320px;">

            <div class="input-group">

                <span class="input-group-text bg-white">

                    <i class="fas fa-search"></i>

                </span>

                <input
                    type="text"
                    id="searchAlat"
                    class="form-control"
                    placeholder="Cari nama alat...">

            </div>

        </div>

    </div>


    {{-- ALERT --}}
    @if(session('success'))

    <div class="alert alert-success shadow-sm border-0">

        <i class="fas fa-check-circle me-2"></i>

        {{ session('success') }}

    </div>

    @endif


    @if(session('error'))

    <div class="alert alert-danger shadow-sm border-0">

        <i class="fas fa-times-circle me-2"></i>

        {{ session('error') }}

    </div>

    @endif



    {{-- CARD --}}
    <div class="row g-4" id="alatContainer">

        @forelse($data as $item)

        <div
            class="col-lg-3 col-md-6 alat-item"
            data-nama="{{ strtolower($item->nama_alat) }}">

            <div class="card border-0 shadow-sm h-100 alat-card">

                {{-- FOTO --}}
                <div class="position-relative">

                    <img
                        src="{{ asset('foto/alat/'.$item->foto) }}"
                        class="card-img-top alat-img"
                        alt="foto alat">


                    <span class="badge bg-primary posisi-badge">

                        Stok :
                        {{ $item->stok }}

                    </span>

                </div>



                <div class="card-body d-flex flex-column">

                    <h5 class="fw-bold mb-2">

                        {{ $item->nama_alat }}

                    </h5>


                    <p class="text-muted small mb-2">

                        <i class="fas fa-layer-group me-1"></i>

                        {{ $item->kategori->nama_kategori ?? '-' }}

                    </p>


                    <p class="mb-3">

                        @if($item->kondisi=='baik')

                        <span class="badge bg-success">

                            Kondisi Baik

                        </span>

                        @else

                        <span class="badge bg-warning text-dark">

                            {{ $item->kondisi }}

                        </span>

                        @endif

                    </p>


                    <div class="mt-auto">

                        @if($item->stok>0)

                        <form
                            action="{{ route('peminjam.pinjam',$item->id) }}"
                            method="POST">

                            @csrf

                            <button
                                class="btn btn-primary w-100 fw-bold btn-pinjam">

                                <i class="fas fa-handshake me-2"></i>

                                Pinjam Sekarang

                            </button>

                        </form>

                        @else

                        <button
                            class="btn btn-secondary w-100"
                            disabled>

                            <i class="fas fa-times-circle me-2"></i>

                            Stok Habis

                        </button>

                        @endif

                    </div>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12">

            <div class="alert alert-warning text-center">

                Belum ada data alat

            </div>

        </div>

        @endforelse


        {{-- HASIL KOSONG --}}
        <div
            class="col-12 d-none"
            id="emptySearch">

            <div class="alert alert-info text-center">

                Tidak ada alat ditemukan

            </div>

        </div>

    </div>

</div>



<style>

.alat-card{
border-radius:20px;
overflow:hidden;
transition:.3s;
}

.alat-card:hover{
transform:translateY(-8px);
box-shadow:0 18px 35px rgba(0,0,0,.12);
}

.alat-img{
height:240px;
object-fit:cover;
}

.posisi-badge{
position:absolute;
top:15px;
right:15px;
padding:8px 12px;
border-radius:10px;
}

.btn-pinjam{
border-radius:12px;
padding:10px;
}

.input-group{
box-shadow:0 5px 15px rgba(0,0,0,.06);
border-radius:12px;
overflow:hidden;
}

.form-control{
height:48px;
border:none;
}

.input-group-text{
border:none;
}

</style>



<script>

const search =
document.getElementById(
'searchAlat'
);

const cards =
document.querySelectorAll(
'.alat-item'
);

const kosong =
document.getElementById(
'emptySearch'
);


search.addEventListener(
'keyup',
function(){

let keyword =
this.value
.toLowerCase();

let ditemukan=
0;

cards.forEach(
card=>{

let nama=
card.dataset.nama;

if(
nama.includes(
keyword
)
){

card.style.display='block';

ditemukan++;

}else{

card.style.display='none';

}

});

kosong.classList.toggle(
'd-none',
ditemukan>0
);

}
);

</script>

@endsection
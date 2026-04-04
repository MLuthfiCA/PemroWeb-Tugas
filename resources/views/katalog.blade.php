@extends('app')

@section('content')
<div class="container-fluid p-4">
    <h2 class="mb-4">Katalog Buku</h2>
    
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Laskar Pelangi</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Andrea Hirata</h6>
                    <hr>
                    <p class="card-text">
                        <strong>Genre:</strong> Drama, Pendidikan<br>
                        <strong>Publikasi:</strong> 2005<br>
                        <strong>Status:</strong> <span class="badge bg-success">Tersedia</span>
                    </p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="/pengajuan" class="btn btn-primary btn-sm w-100">Pinjam Buku</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Bumi</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Tere Liye</h6>
                    <hr>
                    <p class="card-text">
                        <strong>Genre:</strong> Petualangan, Fantasi<br>
                        <strong>Publikasi:</strong> 2014<br>
                        <strong>Status:</strong> <span class="badge bg-success">Tersedia</span>
                    </p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="/pengajuan" class="btn btn-primary btn-sm w-100">Pinjam Buku</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Filosofi Teras</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Henry Manampiring</h6>
                    <hr>
                    <p class="card-text">
                        <strong>Genre:</strong> Self-Development<br>
                        <strong>Publikasi:</strong> 2018<br>
                        <strong>Status:</strong> <span class="badge bg-danger">Dipinjam</span>
                    </p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <button class="btn btn-secondary btn-sm w-100" disabled>Tidak Tersedia</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
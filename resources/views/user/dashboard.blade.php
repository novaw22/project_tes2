@extends('user.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <h1 class="fw-semibold d-block mb-1 fs-4 d-flex align-items-center">
                                <span class="d-block text-primary">Dashboard</span>
                            </h1>
                        </div>
                        <div class="mt-4">Aplikasi Pengajuan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 mb-4 order-0">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <h1 class="fw-semibold d-block mb-1 fs-4 text-primary">Pengumuman</h1>
                        </div>
                        <div class="mt-4 border p-3 rounded-3">
                            <p>Aplikasi pengaduan adalah aplikasi pengaduan masyarakat layanan yang diberikan oleh
                                Pemerintah Kabupaten Badung</p>
                            <div class="mt-4 d-flex justify-content-end">
                                <span class="me-2">--</span>
                                <span>Admin</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mb-4 order-0">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <h1 class="fw-semibold d-block mb-1 fs-4 text-primary">Histori Pengajuan</h1>
                        </div>
                        <div class="mt-4">
                            <ul class="list-group">
                                {{-- @forelse ($complaints as $complaint)
                                    <li class="list-group-item" aria-current="true">
                                        <div class="d-flex p-2 justify-content-between align-items-center">
                                            <small>
                                                <span>{{ $complaint->jenis_document->name }}</span>
                                                <small class="d-block text-muted">24 Juni 2023</small>
                                            </small>
                                            @if ($complaint->status === 'pending')
                                                <small class="bg-warning px-2 rounded-3 text-white">menunggu</small>
                                            @endif
                                            @if ($complaint->status === 'accepted')
                                                <small class="bg-success px-2 rounded-3 text-white">diterima</small>
                                            @endif
                                            @if ($complaint->status === 'rejected')
                                                <small class="bg-danger px-2 rounded-3 text-white">ditolak</small>
                                            @endif
                                            @if ($complaint->status === 'need_tobe_revised')
                                                <small class="bg-warning px-2 rounded-3 text-white">revisi</small>
                                            @endif
                                            @if ($complaint->status === 'cancelled')
                                                <small class="bg-danger px-2 rounded-3 text-white">dibatalkan</small>
                                            @endif
                                        </div>
                                    </li>
                                @empty
                                    <li class="list-group-item">
                                        <small>
                                            <span>Belum ada pengajuan</span>
                                        </small>
                                    </li>
                                @endforelse --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection

@extends('user.layouts.app')
@section('title', 'Profile')
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <div class="row">
                                <div class="col-lg-4 mb-4 order-0">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="text-center">
                                            <img src="{{ asset('admin/assets/img/avatars/1.png') }}" alt
                                                class="h-auto rounded-circle" />
                                            <h1 class="mt-3 mb-1 fs-5 text-primary">{{ $profile->name }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 mb-4 order-0">
                                    @if (Session::has('success'))
                                        <div class="alert alert-primary" role="alert">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    @if (Session::has('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ Session::get('error') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('user.profile.save', $user) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row d-flex align-items-center">
                                            <div class="col-lg-6">
                                                <div>
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        value="{{ $user->email }}" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-password-toggle">
                                                    <div class="d-flex justify-content-between">
                                                        <label class="form-label" for="password">Password Baru</label>
                                                    </div>
                                                    <div class="input-group input-group-merge">
                                                        <input type="password" id="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            name="password"
                                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                            aria-describedby="password" />
                                                        @error('password')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        <span class="input-group-text cursor-pointer"><i
                                                                class="bx bx-hide"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <div>
                                                    <label for="name" class="form-label">Nama Lengkap</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="name" name="name"
                                                        value="{{ old('name', $profile->name) }}" />
                                                    @error('name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <label for="nik" class="form-label">NIK</label>
                                                    <input type="text" class="form-control" id="nik" name="nik"
                                                        value="{{ old('nik', $profile->nik) }}" disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <div>
                                                    <label for="phone" class="form-label">No. Telp</label>
                                                    <input type="text"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        id="phone" name="phone"
                                                        value="{{ old('phone', $profile->phone) }}" />
                                                    @error('phone')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <label for="address" class="form-label">Alamat</label>
                                                    <input type="text"
                                                        class="form-control @error('address') is-invalid @enderror"
                                                        id="address" name="address"
                                                        value="{{ old('address', $profile->address) }}" />
                                                    @error('address')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection

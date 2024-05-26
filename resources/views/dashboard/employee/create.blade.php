@extends('layouts.dashboard')

@section('title', 'Tambah Karyawan')

@section('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
@endsection

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Karyawan</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dasbor</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.employee.index') }}">Karyawan</a></li>
                    <li class="breadcrumb-item active">Tambah Karyawan</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-3">Form Tambah</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('dashboard.employee.store') }}" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <a href="/assets/images/users/avatar-9.jpg" class="image-change-99" data-bs-toggle="lightbox" data-caption="Avatar">
                                    <img src="/assets/images/users/avatar-9.jpg" class="img-fluid" id="image-change-99" width="128">
                                </a>
                            </div>
                            <div class="mb-3">
                                <label>Avatar</label>
                                <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" onchange="imageChange(this, 99)">
                                @error('avatar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label>Nama Lengkap<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="nama lengkap.." value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label>Alamat Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="alamat email.." value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label>Nomor Telepon</label>
                                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="nomor telepon.." value="{{ old('phone_number') }}">
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label>Alamat</label>
                                <textarea type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="alamat.." value="{{ old('address') }}"></textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!--end col-->
</div><!--end row-->


@endsection

@section('js')
<script>
    
</script>
@endsection

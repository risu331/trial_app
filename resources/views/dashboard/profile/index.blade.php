@extends('layouts.dashboard')

@section('title', 'Profile')

@section('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
@endsection

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Profile</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
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
                <h5 class="card-title mb-0">Form Edit Data Profile</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('dashboard.profile.update') }}" enctype='multipart/form-data'>
                    @csrf
                    <div class="mb-3">
                        <a href="{{ Auth::user()->avatar ?? '/assets/images/users/avatar-9.jpg' }}" class="image-change-1" data-toggle="lightbox" data-caption="Avatar">
                            <img src="{{ Auth::user()->avatar ?? '/assets/images/users/avatar-9.jpg' }}" class="img-fluid" id="image-change-1" width="128">
                        </a>
                    </div>
                    <div class="mb-3">
                        <label>Avatar</label>
                        <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" onchange="imageChange(this, 1)" accept="image/*">
                        @error('avatar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <div class="input-group">
                            <input name="password" type="password" value="" class="input form-control @error('email') is-invalid @enderror" id="password" placeholder="*******" aria-label="password" aria-describedby="basic-addon1" />
                            <div class="input-group-append">
                                <span class="input-group-text" onclick="password_show_hide();" style="height: 100%;">
                                <i class="fas fa-eye" id="show_eye"></i>
                                <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                </span>
                            </div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!--end col-->
</div><!--end row-->


@endsection

@section('js')
<script>
    function password_show_hide() {
      var x = document.getElementById("password");
      var show_eye = document.getElementById("show_eye");
      var hide_eye = document.getElementById("hide_eye");
      hide_eye.classList.remove("d-none");
      if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
      } else {
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
      }
    }
</script>
@endsection

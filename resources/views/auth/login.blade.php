@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
<div class="col-lg-6">
    <div class="p-lg-5 p-4">
        <div class="text-center">
            <h5 class="mb-0">Selamat Datang !</h5>
            <p class="text-muted mt-2">Masuk untuk melanjutkan ke dasbor.</p>
        </div>

        <div class="mt-4">
            <form action="{{ route('auth.do-login') }}" class="auth-input" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="">Alamat Email </label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="alamat email.." value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="userpassword" class="form-label">Kata Sandi</label>
                    <div class="position-relative auth-pass-inputgroup mb-3">
                        <input type="password" name="password" class="form-control pe-5 password-input @error('password') is-invalid @enderror" placeholder="*******"
                            id="password-input" required>
                        <button
                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                            type="button" id="password-addon"><i class="las la-eye align-middle fs-18"></i></button>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mt-2">
                    <button class="btn btn-dark w-100" type="submit">Masuk</button>
                </div>

            </form>
        </div>

    </div>
</div>

<div class="col-lg-6">
    <div class="d-flex h-100 bg-auth align-items-end" style="background-image: url('/assets/images/small/img-8.jpg')">
        <div class="p-lg-5 p-4 my-auto">
            <div class="bg-overlay bg-dark"></div>
            <div class="p-0 p-sm-4 px-xl-0 py-5">
                <div id="reviewcarouselIndicators" class="carousel slide auth-carousel" data-bs-ride="carousel">
                    <div class="carousel-indicators carousel-indicators-rounded">
                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                    </div>

                    <!-- end carouselIndicators -->
                    <div class="carousel-inner mx-auto">
                        <div class="carousel-item active">
                            <div class="testi-contain text-center">
                                <h5 class="fs-20 text-white mb-0">“Maju Pantang Mundur”
                                </h5>
                                <p class="fs-15 text-white-50 mt-2 mb-0">Setiap hari adalah kesempatan baru untuk meraih impianmu. Jangan pernah berhenti berusaha dan percaya pada dirimu sendiri.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end carousel-inner -->
                </div>
                <!-- end review carousel -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        
    </script>
@endsection

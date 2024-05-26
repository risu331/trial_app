@extends('layouts.dashboard')

@section('title', 'Home')

@section('css')

@endsection

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Dasbor</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dasbor</a></li>
                    <li class="breadcrumb-item active">Home</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <h5>Halo {{ Auth::user()->name }}, Selamat datang di dasbor</h5>
            </div>
        </div>
    </div><!--end col-->
</div><!--end row-->
@endsection

@section('js')
<script>
</script>
@endsection

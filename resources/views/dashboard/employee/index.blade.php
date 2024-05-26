@extends('layouts.dashboard')

@section('title', 'Karyawan')

@section('css')

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
                    <li class="breadcrumb-item active">Karyawan</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->


<div class="row">
    <div class="col-lg-12">
        <a href="{{ route('dashboard.employee.create') }}" class="btn btn-dark mb-3" style="float: right;"><i class="las la-plus me-1"></i>Tambah</a>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">List Karyawan</h5>
            </div>
            <div class="card-body">
                <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th width="5%">No.</th>
                            <th>Avatar</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($datas as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <a href="{{ $data->avatar }}" class="image-change-1" data-toggle="lightbox" data-caption="Avatar">
                                        <img src="{{ $data->avatar }}" class="img-fluid" id="image-change-1" width="64">
                                    </a>
                                </td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone_number }}</td>
                                <td class="text-end">
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="{{ route('dashboard.employee.edit', $data->id) }}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                            <li>
                                                <button class="dropdown-item remove-item-btn" value="{{ $data->id }}">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Hapus
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!--end col-->
</div><!--end row-->

<div class="modal fade" tabindex="-1" role="dialog" id="delete-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
            <div class="modal-body">
                <p>Tindakan ini akan menghapus data dan data yang dihapus tidak dapat dipulihkan, yakin ingin melanjutkan?</p>
            </div>
            <div class="modal-footer">
                <form action="" method="post" id="delete-form">
                    @csrf
                    @method("DELETE")
                    <button type="button" class="btn btn-light font-weight-bolder" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger font-weight-bolder" id="btn-submit-delete">Iya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
// delete events
    $(document).on("click", ".remove-item-btn", function()
    {
        var id = $(this).val();
        $("#delete-form").attr("action", "{{ route('dashboard.employee.index') }}/" + id);
        $("#delete-modal").modal('show');
    });
</script>
@endsection

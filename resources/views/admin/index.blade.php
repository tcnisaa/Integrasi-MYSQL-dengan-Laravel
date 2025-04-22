@extends('admin.layout')
@section('content')

<h4 class="mt-5">Data Admin</h4>
<a href="{{ route('admin.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>

@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif

<!-- Form Sorting -->
<form method="GET" action="{{ route('admin.index') }}" class="mt-3">
    <div class="row">
        <div class="col-md-4">
            <select name="sort_by" class="form-control">
                <option value="nama_admin" {{ request('sort_by') == 'nama_admin' ? 'selected' : '' }}>Nama</option>
                <option value="alamat" {{ request('sort_by') == 'alamat' ? 'selected' : '' }}>Alamat</option>
                <option value="username" {{ request('sort_by') == 'username' ? 'selected' : '' }}>Username</option>
            </select>
        </div>
        <div class="col-md-4">
            <select name="order" class="form-control">
                <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>Descending</option>
            </select>
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Sort</button>
        </div>
    </div>
</form>

<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Username</th>
            <th>No. Telp</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_admin }}</td>
            <td>{{ $data->nama_admin }}</td>
            <td>{{ $data->alamat }}</td>
            <td>{{ $data->username }}</td>
            <td>{{ $data->no_telp }}</td>
            <td>
                <a href="{{ route('admin.edit', $data->id_admin) }}" type="button"
                    class="btn btn-warning rounded-3">Ubah</a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->id_admin }}">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_admin }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.delete', $data->id_admin) }}">
                                @csrf
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop

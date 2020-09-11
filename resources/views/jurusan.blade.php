@extends('layouts.app')
@section('content')
    <table class="table">
        <thead class="bg-dark white-text">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Jurusan</th>
            <th scope="col">Nama Jurusan</th>
            <th class="col d-flex justify-content-end">
                <button type="button" class="btn indigo text-white btn-md" data-toggle="modal" data-target="#add">
                    <i class="fas fa-plus size-icons"></i>
                </button>
            </th>
          </tr>
        </thead>
        <tbody>
        @foreach($jurusan as $prodi)
            <tr>
                <th scope="row">1</th>
                <td>{{ $prodi->kode_jurusan }}</td>
                <td>{{ $prodi->nama_jurusan }}</td>
                <td class="d-flex justify-content-end">
                    <button type="button" class="btn amber btn-md text-white" data-toggle="modal" data-target="#edit{{$prodi->id}}">
                        <i class="fas fa-edit size-icons"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#delete{{$prodi->id}}">
                        <i class="fas fa-trash size-icons"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- modal --}}
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header indigo">
                <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Jurusan</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="/jurusan/add" method="post">
                @csrf
                <div class="modal-body">
                    <div class="md-form">
                        <input type="text" id="kode_jurusan" class="form-control" name="kode_jurusan">
                        <label for="kode_jurusan">Kode Jurusan</label>
                    </div>
                    <div class="md-form">
                        <input type="text" id="nama_jurusan" class="form-control" name="nama_jurusan">
                        <label for="nama_jurusan">Nama Jurusan</label>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-indigo text-white d-flex justify-content-center btn-md">
                        <i class="fas fa-paper-plane button-icons mx-auto"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- edit --}}
@foreach ($jurusan as $prodi)
<div class="modal fade" id="edit{{$prodi->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header amber">
                <h5 class="modal-title text-white" id="exampleModalLabel">Update Jurusan {{ $prodi->kode_jurusan }}</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="/jurusan/edit/{{ $prodi->id }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $prodi->id }}">
                <div class="modal-body">
                    <div class="md-form">
                        <input type="text" id="kode_jurusan" class="form-control" name="kode_jurusan" value="{{ $prodi->kode_jurusan }}">
                        <label for="kode_jurusan">Kode Jurusan</label>
                    </div>
                    <div class="md-form">
                        <input type="text" id="nama_jurusan" class="form-control" name="nama_jurusan" value="{{ $prodi->nama_jurusan }}">
                        <label for="nama_jurusan">Nama Jurusan</label>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-amber text-white d-flex justify-content-center btn-md">
                        <i class="fas fa-paper-plane button-icons text-center"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="delete{{$prodi->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="exampleModalLabel">Hapus Jurusan {{ $prodi->kode_jurusan }}</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/jurusan/delete/{{ $prodi->id }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>Apakah Anda Yakin Akan Menghapus Data Ini ? </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <p>Kode Jurusan</p>
                        </div>
                        <div class="col-lg-8">
                            <p>: {{ $prodi->kode_jurusan }}</p>
                        </div>
                    </div>
                    <div class="md-form">
                        <div class="row">
                            <div class="col-lg-4">
                                <p>Nama Jurusan</p>
                            </div>
                            <div class="col-lg-8">
                                <p>: {{ $prodi->nama_jurusan }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-danger btn-md">
                        <i class="fas fa-trash button-icons text-center"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection
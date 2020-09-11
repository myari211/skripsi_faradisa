@extends('layouts.app')
@section('content')
    <table class="table">
        <thead class="bg-dark white-text">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Mata Pelajaran</th>
            <th scope="col">Mata Pelajaran</th>
            <th class="col d-flex justify-content-end">
                <button type="button" class="btn indigo text-white btn-md" data-toggle="modal" data-target="#add">
                    <i class="fas fa-plus size-icons"></i>
                </button>
            </th>
          </tr>
        </thead>
        <tbody>
        @foreach($matpel as $pelajaran)
            <tr>
                <th scope="row">1</th>
                <td>{{ $pelajaran->kode_matpel }}</td>
                <td>{{ $pelajaran->nama_matpel }}</td>
                <td class="d-flex justify-content-end">
                    <button type="button" class="btn amber btn-md text-white" data-toggle="modal" data-target="#edit{{$pelajaran->id_matpel}}">
                        <i class="fas fa-edit size-icons"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#delete{{$pelajaran->id_matpel}}">
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
                <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Mata Pelajaran</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="/matpel/add" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row d-flex justify-content-center p-2">
                        <div class="col-lg-12">
                            <label for="kode_matpel">Kode Mata Pelajaran</label>
                            <input type="text" name="kode_matpel" class="form-control" id="kode_matpel">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="nama_matpel">Nama Mata Pelajaran</label>
                            <input type="text" id="nama_matpel" class="form-control" name="nama_matpel">    
                        </div>
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
@foreach ($matpel as $pelajaran)
<div class="modal fade" id="edit{{$pelajaran->id_matpel}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header amber">
                <h5 class="modal-title text-white" id="exampleModalLabel">Update Mata Pelajaran {{ $pelajaran->kode_matpel }}</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="/matpel/update/{{ $pelajaran->id_matpel}}" method="post">
                @csrf
                <input type="hidden" name="id" value={{ $pelajaran->id_matpel}}>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center p-2">
                        <div class="col-lg-12">
                            <label for="kode_matpel">Kode Mata Pelajaran</label>
                            <input type="text" class="form-control" id="kode_matpel" name="kode_matpel" value="{{ $pelajaran->kode_matpel }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="nama_matpel">Nama Mata Pelajaran</label>
                            <input type="text" id="nama_matpel" class="form-control" name="nama_matpel" value={{$pelajaran->nama_matpel}}>    
                        </div>
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

<div class="modal fade" id="delete{{$pelajaran->id_matpel}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="exampleModalLabel">Hapus Mata Pelajaran {{ $pelajaran->kode_matpel }}</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/matpel/delete/{{ $pelajaran->id_matpel }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $pelajaran->id_kelas }}">
                        <div class="col-lg-12">
                            <p>Apakah Anda Yakin Akan Menghapus Data Ini ? </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <p>Kode Matpel :</p>
                        </div>
                        <div class="col-lg-8">
                            <p>: {{ $pelajaran->kode_matpel }}</p>
                        </div>
                    </div>
                    <div class="md-form">
                        <div class="row">
                            <div class="col-lg-4">
                                <p>Mata Pelajaran</p>
                            </div>
                            <div class="col-lg-8">
                                <p>: {{ $pelajaran->nama_matpel }}</p>
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
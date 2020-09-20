@extends('layouts.app')
@section('content')
    <table class="table">
        <thead class="bg-dark white-text">
          <tr>
            <th scope="col">No</th>
            <th scope="col">NIP</th>
            <th scope="col">Nama Guru</th>
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
        @foreach($guru as $no => $pengajar)
            <tr>
                <th scope="row">{{ ++$no }}</th>
                <td>{{ $pengajar->nip }}</td>
                <td>{{ $pengajar->nama_guru }}</td>
                <td>{{ $pengajar->kode_matpel }}</td>
                <td>{{ $pengajar->nama_matpel }}</td>
                <td class="d-flex justify-content-end">
                    <button type="button" class="btn amber btn-md text-white" data-toggle="modal" data-target="#edit{{$pengajar->id}}">
                        <i class="fas fa-edit size-icons"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#delete{{$pengajar->id}}">
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
            <form action="/guru/add" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="nip">Nomor Induk Pegawai</label>
                            <input type="text" name="nip" class="form-control" id="nip">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <label for="nama_guru">Nama Guru</label>
                            <input type="text" name="nama_guru" class="form-control" id="nama_guru">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <label for="matpel">Mata Pelajaran</label>
                            <select name="matpel" id="matpel" class="form-control">
                                @if(count($matpel) > 0))
                                    @foreach($matpel as $pelajaran)
                                        <option value="{{ $pelajaran->id }}">{{ $pelajaran->nama_matpel }}</option>
                                    @endforeach
                                @else
                                    <option>Belum Ada Data</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
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

@foreach($guru as $pengajar)
<div class="modal fade" id="delete{{ $pengajar->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="exampleModalLabel">Delete Guru</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/guru/delete/{{ $pengajar->id }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <p>NIP</p>
                        </div>
                        <div class="col-lg-7">
                            <p>: {{ $pengajar->nip }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <p>Nama Guru</p>
                        </div>
                        <div class="col-lg-7">
                            <p>: {{ $pengajar->nama_guru}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <p>Mata Pelajaran</p>
                        </div>
                        <div class="col-lg-7">
                            <p>: {{ $pengajar->nama_matpel }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <p>Email</p>
                        </div>
                        <div class="col-lg-7">
                            <p>{{ $pengajar->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger text-white d-flex btn-md">
                        <i class="fas fa-trash size-icons"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit{{ $pengajar->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header amber">
                <h5 class="modal-title text-white" id="exampleModalLabel">Edit Guru</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/guru/edit/{{ $pengajar->id }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="nip">Nomor Induk Pegawai</label>
                            <input type="text" name="nip" class="form-control" id="nip" value="{{ $pengajar->nip }}">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <label for="nama_guru">Nama Guru</label>
                            <input type="text" name="nama_guru" class="form-control" id="nama_guru" value="{{ $pengajar->nama_guru }}">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <label for="matpel">Mata Pelajaran</label>
                            <select name="matpel" id="matpel" class="form-control">
                                @foreach($matpel as $pelajaran)
                                    <option value="{{ $pelajaran->id }}">{{ $pelajaran->nama_matpel }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $pengajar->email }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-amber text-white d-flex btn-md">
                        <i class="fas fa-edit size-icons"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endforeach
@endsection
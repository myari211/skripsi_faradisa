@extends('layouts.app')
@section('content')
    <table class="table">
        <thead class="bg-dark white-text">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Kelas</th>
            <th scope="col">Jumlah Siswa</th>
            <th class="col d-flex justify-content-end">
                <button type="button" class="btn indigo text-white btn-md" data-toggle="modal" data-target="#add">
                    <i class="fas fa-plus size-icons"></i>
                </button>
            </th>
          </tr>
        </thead>
        <tbody>
        @foreach($kelas as $class)
            <tr>
                <th scope="row">1</th>
                <td>{{ $class->kode_jurusan }} - {{ $class->nama_jurusan }}</td>
                <td>{{ $class->tingkatan }} - {{ $class->nama_kelas }}</td>
                <td>TBD</td>
                <td class="d-flex justify-content-end">
                    <button type="button" class="btn amber btn-md text-white" data-toggle="modal" data-target="#edit{{$class->id_kelas}}">
                        <i class="fas fa-edit size-icons"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#delete{{$class->id_kelas}}">
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
                <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Kelas</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="/kelas/add" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row d-flex justify-content-center p-2">
                        <div class="col-lg-6 pl-1">
                            <label for="jurusan_id">Jurusan</label>
                            <select class="form-control" name="jurusan_id" id="jurusan_id">
                                @foreach ($jurusan as $prodi)
                                    <option value="{{ $prodi->id }}">{{ $prodi->kode_jurusan}} - {{ $prodi->nama_jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 pr-1">
                            <label for="tingkatan">Tingkat</label>
                            <select class="form-control" name="tingkatan" id="tingkatan">
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>    
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" id="nama_kelas" class="form-control" name="nama_kelas">    
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
@foreach ($kelas as $class)
<div class="modal fade" id="edit{{$class->id_kelas}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header amber">
                <h5 class="modal-title text-white" id="exampleModalLabel">Update Jurusan {{ $class->kode_jurusan }}</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="/jurusan/edit/{{ $class->id_kelas }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row d-flex justify-content-center p-2">
                        <div class="col-lg-6 pl-1">
                            <label for="jurusan_id">Jurusan</label>
                            <select class="form-control" name="jurusan_id" id="jurusan_id">
                                @foreach ($jurusan as $prodi)
                                    <option value="{{ $prodi->id }}">{{ $prodi->kode_jurusan}} - {{ $prodi->nama_jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 pr-1">
                            <label for="tingkatan">Tingkat</label>
                            <select class="form-control" name="tingkatan" id="tingkatan">
                                <option value="X" {{ old('tingkatan') === 'X' ? 'selected' : ''}}>X</option>
                                <option value="XI"{{ old('tingkatan') === 'XI' ? 'selected' : ''}}>XI</option>
                                <option value="XII"{{ old('tingkatan') === 'XII' ? 'selected' : ''}}>XII</option>    
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" id="nama_kelas" class="form-control" name="nama_kelas" value={{$class->nama_kelas}}>    
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

<div class="modal fade" id="delete{{$class->id_kelas}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="exampleModalLabel">Hapus Jurusan {{ $class->kode_jurusan }}</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/kelas/delete/{{ $class->id_kelas }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $class->id_kelas }}">
                        <div class="col-lg-12">
                            <p>Apakah Anda Yakin Akan Menghapus Data Ini ? </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <p>Jurusan</p>
                        </div>
                        <div class="col-lg-8">
                            <p>: {{ $class->kode_jurusan }} - {{ $class->nama_jurusan }}</p>
                        </div>
                    </div>
                    <div class="md-form">
                        <div class="row">
                            <div class="col-lg-4">
                                <p>Kelas</p>
                            </div>
                            <div class="col-lg-8">
                                <p>: {{ $class->tingkatan }} - {{ $class->nama_kelas }}</p>
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
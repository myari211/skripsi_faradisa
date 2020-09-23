@extends('layouts.app')
@section('content')
    <table class="table">
        <thead class="bg-dark white-text">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Nomor Induk</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Kelas</th>
                <th scope="col">Email</th>
                <th class="col d-flex justify-content-end">
                    <button type="button" class="btn indigo text-white btn-md" data-toggle="modal" data-target="#add">
                        <i class="fas fa-plus size-icons"></i>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($siswa as $no => $student)
            <tr>
                <th scope="row">{{ ++$no }}</th>
                <td>{{ $student->nama_siswa }}</td>
                <td>{{ $student->nomor_induk }}</td>
                @if ($student->jenis_kelamin == "L")
                        <td>Laki - Laki</td>
                @else
                        <td>Perempuan</td>
                @endif
                
                <td>{{ $student->nama_kelas }}</td>
                <td>{{ $student->email }}</td>
                <td class="d-flex justify-content-end">
                    <button type="button" class="btn amber btn-md text-white" data-toggle="modal" data-target="#edit{{$student->id}}">
                        <i class="fas fa-edit size-icons"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#delete{{$student->id}}">
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
            <form action="/siswa/add" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" name="nama_siswa" class="form-control" id="nama_siswa">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <label for="nomor_induk">Nomor Induk</label>
                            <input type="number" name="nomor_induk" class="form-control" id="nomor_induk">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-5">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div calss="col-lg-7">
                            <label for="kelas">Kelas</label>
                            <select name="kelas_id" id="kelas" class="form-control">
                                @foreach($kelas as $class)
                                    <option value="{{ $class->id }}">{{ $class->tingkatan }} - {{ $class->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email">
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

@foreach ($siswa as $student)
<div class="modal fade" id="edit{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header amber">
                <h5 class="modal-title text-white" id="exampleModalLabel">Edit Siswa</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/siswa/edit/{{ $student->id }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" value="{{ $student->nama_siswa }}">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <label for="nomor_induk">Nomor Induk</label>
                            <input type="number" name="nomor_induk" class="form-control" id="nomor_induk" value="{{ $student->nomor_induk }}">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-5">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div calss="col-lg-7">
                            <label for="kelas">Kelas</label>
                            <select name="kelas_id" id="kelas" class="form-control">
                                @foreach($kelas as $class)
                                    <option value="{{ $class->id }}">{{ $class->tingkatan }} - {{ $class->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ $student->email }}">
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
<div class="modal fade" id="delete{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="exampleModalLabel">Hapus Siswa</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/siswa/delete/{{ $student->id }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row ml-4">
                        <p>Apakah anda yakin akan menghapus data ini ?</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <p>Nama Siswa</p>
                        </div>
                        <div class="col-lg-7">
                            <p>: {{ $student->nama_siswa }}</p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-5">
                            <p>Nomor Induk</p>
                        </div>
                        <div class="col-lg-7">
                            <p>: {{ $student->nomor_induk }} </p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-5">
                            <p>Jenis Kelamin</p>
                        </div>
                        <div class="col-lg-7">
                            <p>: {{ $student->jenis_kelamin }} </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <p>Kelas</p>
                        </div>
                        <div class="col-lg-7">
                            <p>: {{ $student->nama_kelas }}</p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-5">
                            <p>email</p>
                        </div>
                        <div class="col-lg-7">
                            <p>: {{ $student->email }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-danger text-white d-flex justify-content-center align-items-center btn-md">
                        <i class="fas fa-trash button-icons mx-auto"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach


@endsection
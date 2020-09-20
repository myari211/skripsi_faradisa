@extends('layouts.app')
@section('content')
<table class="table">
    <thead class="bg-dark white-text">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Guru</th>
        <th scope="col">Mata Pelajaran</th>
        <th scope="col">Kelas</th>
        <th class="col d-flex justify-content-end">
            <button type="button" class="btn indigo text-white btn-md" data-toggle="modal" data-target="#add">
                <i class="fas fa-plus size-icons"></i>
            </button>
        </th>
      </tr>
    </thead>
    <tbody>
        @foreach($guru as $no =>$teacher)
        <tr>
            <th scope="row">{{ ++$no }}</th>
            <td>{{ $teacher->nama_guru }}</td>
            <td>{{ $teacher->matpel['nama_matpel'] }}</td>
            <td>
                @if(count($teacher->kelas) > 0)
                <ul>
                    @foreach($teacher->kelas as $class)
                    <li>{{ $class->nama_kelas }}</li>
                    @endforeach
                </ul>
                @else
                    Belum Ada Kelas
                @endif
            </td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header indigo">
                <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Mata Pelajaran</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="/guru_kelas/add" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12">
                            <label for="kode_matpel">Nama Guru</label>
                            <select name="kode_guru" class="form-control" id="kode_matpel">
                                @if(count($guru) > 0)
                                    @foreach($guru as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->nama_guru }}</option>
                                    @endforeach
                                @else
                                    <option>Belum ada Data</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <label for="kode_kelas">Kelas</label>
                            <select name="kode_kelas" class="form-control" id="kode_kelas">
                                @if(count($kelas) > 0)
                                    @foreach($kelas as $class)
                                        <option value="{{ $class->id }}">{{ $class->tingkatan }}&nbsp;-&nbsp;{{ $class->nama_kelas }}</option>
                                    @endforeach
                                @else
                                    <option>Belum Ada Data</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-indigo text-white d-flex justify-content-center btn-md">
                        <i class="fas fa-paper-plane button-icons mx-auto"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
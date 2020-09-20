@extends('layouts.app')
@section('content')
<table class="table">
    <thead class="bg-dark white-text">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Siswa</th>
        <th scope="col">Nomor Induk</th>
        <th class="d-flex justify-content-end mr-3 w-20">
            @foreach ($kelas as $class)
                {{$class->tingkatan}}&nbsp;-&nbsp;{{$class->nama_kelas}}
            @endforeach
        </th>
      </tr>
    </thead>
    <tbody>
    @foreach($siswa as $no => $student)
        <tr>
            <th scope="row">{{ ++$no }}</th>
            <td>{{ $student->nama_siswa}}</td>
            <td>{{ $student->nomor_induk }}</td>
            <td>{{ $student->email }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-end">
    {{$siswa->links()}}
</div>
@endsection
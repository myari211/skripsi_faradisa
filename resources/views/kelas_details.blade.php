@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-2">
        @foreach($kelas as $class)
        <div class="col-lg-6 mt-4">
            <div class="card indigo">
                <div class="card-body">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-4 d-flex justify-content-center">
                            <i class="fas fa-school" style="font-size:80px; opacity:0.2"></i>
                        </div>
                        <div class="col-lg-7 ml-2 text-white">
                            <div class="row">
                                 <h5 class="text-white">{{ $class->tingkatan }} - {{ $class->nama_kelas }}</h5>
                            </div>
                            <div class="row">
                                <h6>{{ $class->nama_jurusan }}</h6>
                            </div>
                            <div class="row">
                                <p>{{ $class->total }}&nbsp;<i class="fas fa-users"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-lg-12 pr-0 d-flex justify-content-end align-items-center">
                        @if($class->total > 0)
                        <button type="button" class="btn btn-primary text-white btn-sm" onClick="window.open('/kelas_details/{{ $class->id }}')">
                            <i class="fas fa-list size-icons"></i>
                        </button>
                        @else
                            <button type="button" class="btn btn-danger size-icons">
                                Belum Ada Siswa
                            </button>
                        @endif
                        <button type="button" class="btn btn-primary text-white btn-sm">
                            <i class="fa fa-book size-icons"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
        <div class="row mt-4 d-flex justify-content-center">
            {{ $kelas->links() }}
        </div>
    </div>
@endsection
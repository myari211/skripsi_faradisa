@extends('layouts.app')
@section('content')
<table class="table">
    <thead class="bg-dark white-text">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Hambatan Belajar</th>
            <th scope="col">link</th>
            <th class="col d-flex justify-content-end">
                <button type="button" class="btn indigo btn-md text-white">
                    <i class="fas fa-plus size-icon"></i>
                </button>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($hambatan as $no => $obstacle)
        <tr>
            <td>{{ ++$no }}</td>
            <td>{{ $obstacle->learning_obstacle }}</td>
            <td>{{ $obstacle->link }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
    
@endsection
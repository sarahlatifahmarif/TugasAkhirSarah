@extends('layouts.app')



@section('content')

    <div class="container">
    @if ($message = Session::get('message'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ $message }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><h5>{{ __('Pertanyaan') }}</h5></div>
                    <div class="card-body">
                        <div class="row col-md-12">
                            <a class="btn btn-primary" href="{{ route('Pertanyaan.create') }}">Tambahkan Pertanyaan</a>
                        </div>
                        <div class="row col-md-12">
                            <table class="table" style="margin-top: 12px">
                                <thead>
                                    <th>No.</th>
                                    <th>Nama Prodi</th>
                                    <th>Nama Kriteria</th>
                                    <th>Pertanyaan</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($pertanyaan as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->nama_prodi}}</td>
                                            <td>{{ $item->nama_kriteria }}</td>
                                            <td>{{ $item->pertanyaan }}</td>
                                            <td>
                                                <form action="{{ route('Pertanyaan.delete', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{route('Pertanyaan.edit', $item->id)}}" class="btn btn-success btn-sm">Edit</a>
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
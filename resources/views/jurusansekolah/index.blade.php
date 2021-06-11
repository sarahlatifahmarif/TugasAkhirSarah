@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><h5>{{ __('Jurusan') }}</h5></div>
                    <div class="card-body">
                        <div class="row col-md-12">
                            <a class="btn btn-primary" href="{{ route('jurusansekolah.create') }}">Tambahkan Jurusan</a>
                        </div>
                        <div class="row col-md-12">
                            <table class="table" style="margin-top: 12px">
                                <thead>
                                    <th>No.</th>
                                    <th>Nama Jurusan</th>
                                    <th>Jumlah Prodi</th>
                                    <th>Dibuat Pada</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($jurusansekolah as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->nama_jurusan }}</td>
                                            <td>{{ $item->pilihan->count() }}</td>
                                            <td>{{ $item->created_at->diffForHumans() }}</td>
                                            <td>
                                                <form action="{{ route('jurusansekolah.delete', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('jurusansekolah.add.prodi', $item->id) }}" class="btn btn-primary btn-sm">Tambah Prodi</a>
                                                    <a href="{{ route('jurusansekolah.edit', $item->id) }}" class="btn btn-success btn-sm">Edit</a>
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

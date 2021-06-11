
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Jurusan Baru') }}</div>
                    <div class="card-body">
                        <form action="{{ route('jurusansekolah.update', $jurusansekolah->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="nama_jurusan" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Nama Jurusan') }}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control" placeholder="{{ __('Masukan Nama Jurusan') }}" value="{{ $jurusansekolah->nama_jurusan }}" required>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Simpan') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

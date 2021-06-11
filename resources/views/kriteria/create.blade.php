@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tambahkan Kriteria') }}</div>
                    <div class="card-body">
                        <form action="{{ route('kriteria.store') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="nama_kriteria" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Nama Kriteria') }}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="nama_kriteria" id="nama_kriteria" class="form-control" placeholder="{{ __('Masukan Nama ') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bobot" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Bobot') }}
                                </label>
                                <div class="col-md-8">
                                <input type="text" name="bobot" id="bobot" class="form-control" placeholder="{{ __('Masukan Bobot ') }}" required>
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
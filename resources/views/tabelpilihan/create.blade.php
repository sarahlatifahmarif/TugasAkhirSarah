@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tambahkan Prodi Pilihan') }}</div>
                    <div class="card-body">
                        <form action="{{ route('tabelpilihan.store') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="id_jurusan_sekolah" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Jurusan Sekolah') }}
                                </label>
                                <div class="col-md-6">
                                <select name="id_jurusan_sekolah" id="id_jurusan_sekolah" class="form-control"> 
                                    @foreach ($jurusansekolahs as $jurusansekolah) 
                                        <option value="{{$jurusansekolah->id}}"> {{$jurusansekolah->nama_jurusan}} </option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="prodi_id" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Prodi') }}
                                </label>
                                <div class="col-md-6">
                                <select name="id_jurusan_sekolah" id="id_jurusan_sekolah" class="form-control"> 
                                    @foreach ($jurusansekolahs as $jurusansekolah) 
                                        <option value="{{$jurusansekolah->id}}"> {{$jurusansekolah->nama_jurusan}} </option>
                                    @endforeach
                                </select>
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
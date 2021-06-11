@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tambahkan Prodi') }}</div>
                    <div class="card-body">
                        <form action="{{ route('prodi.store') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="jurusan_id" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Jurusan') }}
                                </label>
                                <div class="col-md-6">
                                <select name="jurusan_id" id="jurusan_id" class="form-control"> 
                                    @foreach ($jurusans as $jurusan) 
                                        <option value="{{$jurusan->id}}"> {{$jurusan->nama_jurusan}} </option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_prodi" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Nama Prodi') }}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="nama_prodi" id="nama_prodi" class="form-control" placeholder="{{ __('Masukan Nama Prodi') }}" required>
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
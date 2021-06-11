
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Pertanyaan Baru') }}</div>
                    <div class="card-body">
                        <form action="{{ route('Pertanyaan.update', $pertanyaan->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="nama_kriteria" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Nama Prodi') }}
                                </label>
                                <div class="col-md-8">
                                <select name="prodiid" id="prodi_id" class="form-control"> 
                                        <option value="{{$prodis->id}}"> {{$prodis->nama_prodi}} </option>
                                </select>
                            </div>
                            </div>
                            <div class="form-group row">
                                <label for="bobot" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Nama Kriteria') }}
                                </label>
                                <div class="col-md-8">
                                <select name="kriteriaid" id="kriteria_id" class="form-control"> 
                                        <option value="{{$kriterias->id}}"> {{$kriterias->nama_kriteria}} </option>
                                </select>
                            </div>
                            </div>
                            <div class="form-group row">
                                <label for="bobot" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Pertanyaan') }}
                                </label>
                                <div class="col-md-8">
                                <input type="text" name="pertanyaan" id="pertanyaan" class="form-control" placeholder="{{ __('Masukan Pertanyaan ') }}" value="{{ $pertanyaan->pertanyaan }}" required>
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

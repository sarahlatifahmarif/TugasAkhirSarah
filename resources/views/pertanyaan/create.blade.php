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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tambahkan Pertanyaan') }}</div>
                    <div class="card-body">
                        <form action="{{ route('Pertanyaan.store') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="nama_kriteria" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Prodi') }}
                                </label>
                                <div class="col-md-6">
                                <select name="prodiid" id="prodi_id" class="form-control"> 
                                    @foreach ($prodis as $prodi) 
                                        <option value="{{$prodi->id}}"> {{$prodi->nama_prodi}} </option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bobot" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Kriteria') }}
                                </label>
                                <div class="col-md-8">
                                <select name="kriteriaid" id="kriteria_id" class="form-control"> 
                                    @foreach ($kriterias as $kriteria) 
                                        <option value="{{$kriteria->id}}"> {{$kriteria->nama_kriteria}} </option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bobot" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Pertanyaan') }}
                                </label>
                                <div class="col-md-8">
                                <input type="text" name="pertanyaan" id="pertanyaan" class="form-control" placeholder="{{ __('Masukan Pertanyaan ') }}" required>
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
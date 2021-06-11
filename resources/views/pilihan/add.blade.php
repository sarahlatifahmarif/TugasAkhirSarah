@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Perbaharui Jurusan Pilihan')}}</div>
                    <div class="card body">
                        <form action="" method="post" style="margin:1em">
                            @csrf
                            @foreach ($jurusans as $jurusan)
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <h5 class="card-title">{{ $jurusan->nama_jurusan }}</h5>
                                    </div>
                                    <div class="col-md-8">
                                        @foreach ($jurusan->prodi as $prodi)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="pilihan[{{ $arrayIndex++ }}]" value="{{ $prodi->id }}"
                                                    @if (App\Models\TabelPilihan::whereIdJurusanSekolah($idJurusanSekolah)->whereProdiId($prodi->id)->count() != 0)
                                                        {{ 'checked' }}
                                                    @endif
                                                    >
                                                    {{ $prodi->nama_prodi }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

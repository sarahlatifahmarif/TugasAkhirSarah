@extends('layouts/main')

@section('content')
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">
<br><br><br><br>
        <div class="section-title">
          <h2>Team</h2>
          <h3>Our Hardworking <span>Team</span></h3>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

       
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                
                <div class="card-header row">
                  <div class="col-md-4">
                    <div class="">{{__('Program Study')}}</div>
                  </div>
                  <div class="col-md-4">
                    <div class="">{{__('Minat')}}</div>
                  </div>
                  </div>
                    <div class="card body">
                        <form action="" method="post" style="margin:1em">
                            @csrf
                            @php
                                $index = 0;
                                $subIndex = 0;
                            @endphp
                            @foreach ($prodi as $pilih)
                                
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <h5 class="card-title">{{ $prodi[$index]->nama_prodi }}</h5>
                                    </div>
                                    <div class="col-md-8">
                                    @foreach ($kriteria as $kri)
                                            <div class="checkbox">
                                                <label for="customRange3" class="form-label"> {{$kri->nama_kriteria}}</label>
                                                <input type="range" name="data[{{$index}}][{{$subIndex}}]" class="form-range" min="0" id="vol" max="5" step="1" onClick="hey()" id="customRange3">
                                            </div>
                                        @php
                                            $subIndex++;
                                        @endphp
                                    @endforeach
                                    <input type="hidden" name="data[{{$index}}][nama]" value="{{ $prodi[$index]->nama_prodi }}">
                                    </div>

                                </div>

                                <br>
                                <hr>
                                @php
                                    $subIndex = 0;
                                    $index++;
                                @endphp
                            @endforeach
                                <hr>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

      </div>
    </section><!-- End Team Section -->
    @endsection

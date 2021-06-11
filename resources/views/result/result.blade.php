@extends('layouts.main')

@section('content')
    <div class="team section-bg container" data-aos="fade-up">
      @if (env('APP_METHOD_PROCCESS', 'true'))
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">
            <div class="card-header"><h5>{{ __('Kriteria') }}</h5></div>
            <div class="card-body">
              <div class="row col-md-12">
                <table class="table">
                  <thead>
                    <th>Kriteria</th>
                    @for ($i = 0; $i < count($ahp['nama']); $i++)
                        <th>{{ $ahp['nama'][$i] }}</th>
                    @endfor
                  </thead>
                  <tbody>
                    @for ($i = 0; $i < count($ahp['nama']); $i++)
                        <tr>
                          <td><b>{{ $ahp['nama'][$i] }}</b></td>
                          @for ($j = 0; $j < count($ahp['nama']); $j++)
                              <td>{{ $ahp['pairwise'][$i][$j] }}</td>
                          @endfor
                        </tr>
                    @endfor
                  </tbody>
                  <tfoot>
                    <tr>
                      <td><b>Jumlah</b></td>
                      @for ($j = 0; $j < count($ahp['nama']); $j++)
                        <td><b>{{ $ahp['pairwise']['total'][$j] }}</b></td>
                      @endfor
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">
            <div class="card-header"><h5>{{ __('Pencarian Eigen Vektor Normalisasi') }}</h5></div>
            <div class="card-body">
              @for ($i = 0; $i < count($ahp['eigen_vector']); $i++)
                <div class="row">
                  <table class="table">
                    <thead>
                      <th>Kriteria</th>
                      @for ($j = 0; $j < count($ahp['nama']); $j++)
                          <th>{{ $ahp['nama'][$j] }}</th>
                      @endfor
                      <th>Total</th>
                    </thead>
                    <tbody>
                      @for ($j = 0; $j < count($ahp['nama']); $j++)
                        <tr>
                          <th>{{ $ahp['nama'][$i] }}</th>
                          @for ($k = 0; $k < count($ahp['nama']); $k++)
                            <td> {{ $ahp['eigen_vector'][$i][$j][$k] }}</td>
                          @endfor
                          <td> {{ $ahp['eigen_vector'][$i][$j]['total'] }}</td>
                        </tr>
                      @endfor
                    </tbody>
                    <tfoot>
                      <th colspan="{{ count($ahp['nama'])+1 }}">Baris Ke {{ $i+1 }}</th>
                      <th>{{ $ahp['eigen_vector'][$i]['total'] }}</th>
                    </tfoot>
                  </table>
                </div>
                <br>
              @endfor
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">
            <div class="card-header"><h5>{{ __('Pencarian EVN : Eigen Vektor Normalisasi') }}</h5></div>
            <div class="card-body">
              <div class="row col-md-12">
                <table class="table">
                  <thead>
                    <th>Kriteria</th>
                    @for ($i = 0; $i < count($ahp['nama']); $i++)
                        <th>{{ $ahp['nama'][$i] }}</th>
                    @endfor
                    <th>Total</th>
                    <th>EVN</th>
                  </thead>
                  <tbody>
                    @for ($i = 0; $i < count($ahp['nama']); $i++)
                        <tr>
                          <td><b>{{ $ahp['nama'][$i] }}</b></td>
                          @for ($j = 0; $j < count($ahp['nama']); $j++)
                              <td>{{ $ahp['evn_eigen'][$i][$j] }}</td>
                          @endfor
                          <td>{{ $ahp['evn_eigen'][$i]['total'] }}</td>
                          <td>{{ $ahp['evn_eigen'][$i]['evn'] }}</td>
                        </tr>
                    @endfor
                  </tbody>
                  <tfoot>
                    <th colspan="{{ count($ahp['nama'])+1 }}">Total</th>
                    <th>{{ $ahp['evn_eigen']['total'] }}</th>
                    <th></th>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">
            <div class="card-header"><h5>{{ __('Pencarian Rasio Konsistensi') }}</h5></div>
            <div class="card-body">
              <div class="row col-md-12">
                <table class="table">
                  <thead>
                    <th>Kriteria</th>
                    <th>CL</th>
                    <th>CR</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{ $ahp['rasio']['emaks'] }}</td>
                      <td>{{ $ahp['rasio']['cl'] }}</td>
                      <td>{{ $ahp['rasio']['cr'] }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <hr>
      <br>
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">
            <div class="card-header"><h5>{{ __('Data SAW Metoda') }}</h5></div>
            <div class="card-body">
              <div class="row col-md-12">
                <table class="table">
                  <thead>
                    <th>Prodi</th>
                    @for ($i = 0; $i < count($ahp['nama']); $i++)
                        <th>{{ $ahp['nama'][$i] }}</th>
                    @endfor
                  </thead>
                  <tbody>
                    @for ($i = 0; $i < count($saw['data']); $i++)
                        <tr>
                          <td><b>{{ $saw['data'][$i]['nama'] }}</b></td>
                          @for ($j = 0; $j < count($ahp['nama']); $j++)
                              <td>{{ $saw['data'][$i][$j] }}</td>
                          @endfor
                        </tr>
                    @endfor
                  </tbody>
                  <tfoot>
                    <tr>
                      <td><b>Max</b></td>
                      @for ($j = 0; $j < count($saw['max_value']); $j++)
                        <td><b>{{ $saw['max_value'][$j] }}</b></td>
                      @endfor
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <hr>
      <br>
      
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">
            <div class="card-header"><h5>{{ __('Data SAW Metoda next') }}</h5></div>
            <div class="card-body">
              <div class="row col-md-12">
                <table class="table">
                  <thead>
                    <th>Prodi</th>
                    @for ($i = 0; $i < count($ahp['nama']); $i++)
                        <th>{{ $ahp['nama'][$i] }}</th>
                    @endfor
                  </thead>
                  <tbody>
                    @for ($i = 0; $i < count($saw['next']); $i++)
                        <tr>
                          <td><b>{{ $saw['data'][$i]['nama'] }}</b></td>
                          @for ($j = 0; $j < count($saw['next'][$i]); $j++)
                              <td>{{ $saw['next'][$i][$j] }}</td>
                          @endfor
                        </tr>
                    @endfor
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <br>
      <hr>
      <br>
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">
            <div class="card-header"><h5>{{ __('Data SAW Metoda next') }}</h5></div>
            <div class="card-body">
              <div class="row col-md-12">
                <table class="table">
                  <thead>
                    <th>Prodi</th>
                    @for ($i = 0; $i < count($ahp['nama']); $i++)
                        <th>{{ $ahp['nama'][$i] }}</th>
                    @endfor
                    <th>Total</th>
                  </thead>
                  <tbody>
                    @for ($i = 0; $i < count($saw['final']); $i++)
                        <tr @if ($i==0)
                        style="background: rgb(153, 151, 255)";
                        @endif>
                          <td><b>{{ $saw['final'][$i]['nama'] }}</b></td>
                          @for ($j = 0; $j < (count($saw['final'][$i]) - 2); $j++)
                              <td>{{ $saw['final'][$i][$j] }}</td>
                          @endfor
                          <th>{{ $saw['final'][$i]['total'] }}</th>
                        </tr>
                    @endfor
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <hr>
      @else
          <br>
          <br>
          <br>
      @endif
      <br>
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">
            <div class="card-body">
              <div class="row col-md-12">
                <h1>Hello, {{ $saw['name'] }}</h1>
                <h1>Hasil Akhir adalah <span style="color: red">{{ $saw['final'][0]['nama']}}</span></h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
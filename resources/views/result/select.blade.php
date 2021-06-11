@extends('layouts/main')

@section('content')
  <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">
<br><br><br><br>
        <div class="section-title">
          <h2>Pilih Program Studi</h2>
          {{-- <h3>Our Hardworking <span>Team</span></h3> --}}
          <p>Berikut jurusan yang bisa dipilih dari jurusan sekolah {{ $sekolah->nama_jurusan }}</p>
        </div>

        <form action="" method="post">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card body">
                        <form action="" method="post" style="margin:1em">
                            @csrf
                            <table>
                              <head>
                                <thead>
                                  <th>Nama Jurusan</th>
                                  <th>Prodi</th>
                                </thead>
                                <tbody>
                                  @php
                                      $before = '';
                                  @endphp
                                  @foreach ($available as $item)
                                      <tr>
                                        <td>{{ ($item->prodi->jurusan->nama_jurusan != $before) ?$item->prodi->jurusan->nama_jurusan : ''}}</td>
                                        @php
                                            $before = $item->prodi->jurusan->nama_jurusan;
                                        @endphp
                                        <td><div class="checkbox">
                                          <label>
                                              <input type="checkbox" name="id_prodi[]" value="{{$item->prodi_id}}"/>
                                             {{$item->prodi->nama_prodi}}
                                          </label>
                                      </div></td>
                                      </tr>
                                  @endforeach
                                </tbody>
                              </head>
                            </table>
                            {{-- @foreach ($available as $item)
                                <div class="row">
                                  
                                    <div class="col-md-4 form-group">
                                        <h5 class=" card-title">{{ $item->prodi->jurusan->nama_jurusan }}</h5>
                                    </div>
                                    <div class="col-md-8">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="id_prodi[]" value="{{$item->prodi_id}}"/>
                                                   {{$item->prodi->nama_prodi}}
                                                </label>
                                            </div>
                                    </div>
                                </div>
                                <br>
                            @endforeach   --}}
                                <hr>
                            <input type="submit" class="btn btn-primary" value="Proses">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

      </div>
    </section><!-- End Team Section -->
    @endsection
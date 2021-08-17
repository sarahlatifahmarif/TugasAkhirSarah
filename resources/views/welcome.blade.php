@extends('layouts.main')

@section('content')
    

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Welcome to <span>Politeknik Negeri Padang</spa>
      </h1>
      <h2>Berakhlak Mulia, Berpikir Akademis, Bertindak Profesional</h2>
      <div class="d-flex">
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
        <a href="https://www.youtube.com/watch?v=s0A9XZPtlik" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true"> Watch Video <i class="icofont-play-alt-2"></i></a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="https://www.pnp.ac.id/?page_id=838">Administrasi Niaga</a></h4>
              <p class="description">Jurusan Administrasi Niaga memiliki Program Studi D3 Administrasi Bisnis dan D3 Usaha Perjalanan Wisata</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="https://www.pnp.ac.id/?page_id=836">Akuntansi</a></h4>
              <p class="description">Jurusan Akuntansi memiliki Program Studi DIV Akuntansi Perpajakan dan D3 Akuntansi</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="https://www.pnp.ac.id/?page_id=840">Bahasa Inggris</a></h4>
              <p class="description">Sebagai Jurusan Baru, Jurusan Bahasa Inggris memiliki Program Studi D3 Bahasa Inggris</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="https://www.pnp.ac.id/?page_id=21">Teknik Elektro</a></h4>
              <p class="description">Menghasilkan tenaga kerja yang profesional dalam bidang teknik elektro yang sesuai dengan kompetensi yang dibutuhkan</p>
            </div>
          </div>
        </div>
        <br><br>
        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="https://www.pnp.ac.id/?page_id=17">Teknik Mesin</a></h4>
              <p class="description">Menghasilkan tenaga kerja yang profesional dalam bidang permesinan dan tanggap terhadap perkembangan ilmu pengetahuan dan teknologi permesinan khususnya dalam bidang perawatan & perbaikan mesin dan mesin produksi</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="https://www.pnp.ac.id/?page_id=59">Teknik Sipil</a></h4>
              <p class="description">Menciptakan tenaga kerja profesional dalam bidang Teknik Sipil, yang sanggup melaksanakan pembangunan proyek-proyek teknik Sipil di lapangan, berkonsentrasi pada konstruksi bangunan gedung dan Konstruksi Bangunan Sipil.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="https://www.pnp.ac.id/?page_id=818">Teknologi Informasi</a></h4>
              <p class="description">Menghasilkan tenaga professional tingkat ahli madya di bidang Teknologi Informasi, khususnya pengelolaan informasi berbasis komputer sehingga mampu bekerja di berbagai instansi, perkantoran organisasi dan bisnis modern</p>
            </div>
          </div>

          

        

      </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">
      <form action="" method="post">
      @csrf
        <div class="section-title">
          <h2>Cek Program Studi</h2>
          <h3>Cek Jurusan Sekolah Asal<span> </span></h3>
          <p>Membantu menemukan Program Studi yang ada di Politeknik Negeri Padang Berdasarkan Jurusan Sekolah Asal.</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <img src="assets/img/akuntansi-d4.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <h3>Lengkapi Data Dibawah Ini</h3>
            <p class="font-italic">
              Isikan Sesuai Data Anda.
            </p>
            <ul>
              <li>
                <i class="bx bx-store-alt"></i>
                <div class="col form-group">
                <h5>Nama</h5>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan Nama" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
                  <div class="validate"></div>
                </div>
              </li>
              <li>
                <i class="bx bx-images"></i>
                <div>
                  <h5>Asal Jurusan Sekolah</h5>
                  <div class="form-group row">
                                <div class="col-md-6">
                                <select name="jurusansekolah_id" id="jurusansekolah_id" class="form-control"> 
                                    @foreach ($jurusanSekolah as $jurusan) 
                                        <option value="{{$jurusan->id}}"> {{$jurusan->nama_jurusan}} </option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                </div>
               

              </li>
              <div>
                  <div class="form-group row" id="cek">
                                <div class="">
                                <button class="btn btn-get-started" type="submit">Cek Program Studi</button>
                              </div>
                            </div>
                </div>
              <li>
                
              </li>
            </ul>

          </div>
        </div>
        </form>
      </div>
    </section><!-- End About Section -->



    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Struktur</h2>
          <h3>PIMPINAN <span>POLITEKNIK NEGERI PADANG</span></h3>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/Direktur-SurfaYondri-.jpg" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4>Surfa Yondri, ST., SST., M. Kome</h4>
                <span>Direktur</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/Senat-Revalin-1.jpg" class="img-fluid" alt="">
               
              </div>
              <div class="member-info">
                <h4>Revalin Herdianto, ST., M.Sc., Ph.D</h4>
                <span>Wakil Direktur I</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/wadir-2-Anton.jpg" class="img-fluid" alt="">
                
              </div>
              <div class="member-info">
                <h4>Anton., ST. MTn</h4>
                <span>Wakil Direktur II</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/WD-3-junaldi.jpg" class="img-fluid" alt="">
               
              </div>
              <div class="member-info">
                <h4>Junaldi., ST. M. Kom</h4>
                <span>Wakil Direktur III</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kontak</h2>
          <h3><span>Kontak kami</span></h3>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Alamat</h3>
              <p> Jl. Kampus, Limau Manis, Kec. Pauh, Kota Padang, Sumatera Barat 25164</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email</h3>
              <p>info@pnp.ac.id</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Telepon</h3>
              <p>0751-72590</p>
            </div>
          </div>

        </div>

        

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  
@endsection
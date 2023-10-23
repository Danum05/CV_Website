<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">

  <title>Home Personal Website S1</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('home')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="{{asset('home')}}/assets/css/fontawesome.css">
  <link rel="stylesheet" href="{{asset('home')}}/assets/css/templatemo-tale-seo-agency.css">
  <link rel="stylesheet" href="{{asset('home')}}/assets/css/owl.css">
  <link rel="stylesheet" href="{{asset('home')}}/assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <!--

TemplateMo 582 Tale SEO Agency

https://templatemo.com/tm-582-tale-seo-agency

-->
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <div class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="caption header-text">
            <h6>PERSONAL WEBSITE</h6>
            <div class="line-dec"></div>
            <h4>Online <em>Portfolio:</em> Personal <span>Website</span></h4>
            <p>Website Personal Profile ini merupakan proyek yang dibangun oleh kelompok S1, Kelas 3B-D4 Teknik Informatika, sebagai bagian dari tugas ETS mata kuliah Praktikum Pengembangan Web. Website ini dapat menampilkan CV masing-masing anggota.</p>
            <div class="main-button scroll-to-section"><a href="#projects">Discover More</a></div>
            <div class="second-button"><a href="/login">Admin Dashboard</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="projects section" id="projects">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h2>Our Member <em>Personal </em><span>Website</span></h2>
            <div class="line-dec"></div>
            <p>Berikut merupakan <i>Curriculum Vitae</i> masing-masing anggota Kelompok S1</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel">
            @foreach ($identitas as $data)
              <div class="item">
                <div class="image-container">
                  <img src="{{ asset('pas_foto/' . $data->pas_foto) }}" alt="{{ $data->nama }}">
                </div>
                <div class="down-content">
                  <h4>{{ $data->nama }}</h4>
                  <a href="/dashboard/{{ $data->nama }}"><i class="fa fa-link"></i></a>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="infos section" id="infos">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-content">
                    <div class="container-xxl py-5">
                        <div class="container py-5 px-lg-5">
                            <div class="wow fadeInUp" data-wow-delay="0.1s">
                                <h1 class="text-center mb-5">Our Team Members</h1>
                            </div>
                            <div class="owl-carousel">
                                <div class="team-item bg-light rounded">
                                    <!-- Anggota tim ke-1 -->
                                    <div class="text-center border-bottom p-4">
                                        <img class="img-fluid rounded-circle mb-4" src="{{asset('home')}}/assets/images/danu.jpeg" alt="">
                                        <h5>Danu Mahesa</h5>
                                        <span>211524037</span>
                                    </div>
                                </div>
                                <div class="team-item bg-light rounded">
                                    <!-- Anggota tim ke-2 -->
                                    <div class="text-center border-bottom p-4">
                                        <img class="img-fluid rounded-circle mb-4" src="{{asset('home')}}/assets/images/rahma.jpeg" alt="">
                                        <h5>Rahma Alia Latifa</h5>
                                        <span>211524055</span>
                                    </div>
                                </div>
                                <div class="team-item bg-light rounded">
                                    <!-- Anggota tim ke-3 -->
                                    <div class="text-center border-bottom p-4">
                                        <img class="img-fluid rounded-circle mb-4" src="{{asset('home')}}/assets/images/reihan.jpeg" alt="">
                                        <h5>Reihan Hadi Fauzan</h5>
                                        <span>211524058</span>
                                    </div>
                                </div>
                                <div class="team-item bg-light rounded">
                                  <!-- Anggota tim ke-3 -->
                                  <div class="text-center border-bottom p-4">
                                      <img class="img-fluid rounded-circle mb-4" src="{{asset('home')}}/assets/images/yasmin.jpeg" alt="">
                                      <h5>Yasmin Azizah Tuhfah</h5>
                                      <span>211524064</span>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>


  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>      
      $(document).ready(function(){
          $('.owl-carousel').owlCarousel({
              items: 3, // Menampilkan 3 anggota tim sekaligus
              loop: true, // Membuat tampilan berulang
              margin: 10,
              nav: true, // Menampilkan tombol Previous dan Next
              responsiveClass: true,
              responsive: {
                  0: {
                      items: 1 // Untuk layar lebar < 600px, tampilkan 1 anggota tim sekaligus
                  },
                  600: {
                      items: 2 // Untuk layar lebar >= 600px, tampilkan 2 anggota tim sekaligus
                  },
                  1000: {
                      items: 3 // Untuk layar lebar >= 1000px, tampilkan 3 anggota tim sekaligus
                  }
              }
          });
      });
  </script>
  
  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('home')}}/vendor/jquery/jquery.min.js"></script>
  <script src="{{asset('home')}}/vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="{{asset('home')}}/assets/js/isotope.min.js"></script>
  <script src="{{asset('home')}}/assets/js/owl-carousel.js"></script>
  <script src="{{asset('home')}}/assets/js/tabs.js"></script>
  <script src="{{asset('home')}}/assets/js/popup.js"></script>
  <script src="{{asset('home')}}/assets/js/custom.js"></script>


</body>

</html>
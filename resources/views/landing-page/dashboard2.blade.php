<!DOCTYPE html>
<html lang="en">
<head>
	<title>Landing Page 2</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{asset('alt_landing_page')}}/css/animate.css">
	
	<link rel="stylesheet" href="{{asset('alt_landing_page')}}/css/owl.carousel.min.css">
	<link rel="stylesheet" href="{{asset('alt_landing_page')}}/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="{{asset('alt_landing_page')}}/css/magnific-popup.css">
	
	<link rel="stylesheet" href="{{asset('alt_landing_page')}}/css/flaticon.css">
	<link rel="stylesheet" href="{{asset('alt_landing_page')}}/css/style.css">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
	
	
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html">Personal Website<span>.</span></a>
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto">
					<li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
					<li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
					<li class="nav-item"><a href="#skills-section" class="nav-link"><span>Skills</span></a></li>
                    <li class="nav-item"><a href="#education-section" class="nav-link"><span>Education</span></a></li>
					<li class="nav-item"><a href="#organization-section" class="nav-link"><span>Organization</span></a></li>
					<li class="nav-item"><a href="#portofolio-section" class="nav-link"><span>Portofolio</span></a></li>
					<li class="nav-item"><a href="#gallery-section" class="nav-link"><span>Gallery</span></a></li>
					<li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
					<label class="nav-item switch">
						<input type="checkbox">
						<span class="slider round"></span>
					</label>
				</ul>
			</div>
		</div>
	</nav>
	<section id="home-section" class="hero">
		<div class="home-slider owl-carousel">
			<div class="slider-item">
				<div class="overlay"></div>
				<div class="container-fluid px-md-0">
					<div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
						<div class="one-third order-md-last img" style="background-image:url({{asset('alt_landing_page')}}/images/custom_1.jpg);">
							<div class="overlay"></div>
							<div class="overlay-1"></div>
						</div>
						<div class="one-forth d-flex  align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
							<div class="text">
								<span class="subheading">Hello! This is {{ $identitasData->nama }}</span>
								<h1 class="mb-4 mt-3">I am a <span>{{ $identitasData->pekerjaan }}</span></h1>
								<p><a href="{{ url('/convert-pdf/' . $identitasData->nama) }}" class="btn btn-primary btn-outline-primary" id="convertLink" data-name="{{ $identitasData->nama }}">Download CV</a> 
									<a href="{{ route('logout') }}" class="btn btn-primary">Log Out</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="slider-item">
				<div class="overlay"></div>
				<div class="container-fluid px-md-0">
					<div class="row d-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
						<div class="one-third order-md-last img" style="background-image:url({{asset('alt_landing_page')}}/images/custom_2.jpg);">
							<div class="overlay"></div>
							<div class="overlay-1"></div>
						</div>
						<div class="one-forth dflex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
							<div class="text">
								<span class="subheading">Personal Website</span>
								<h1 class="mb-4 mt-3">Hi, I am <span>{{ $identitasData->nama }}</span> This is my personal website.</h1>
								<p>
									<a href="{{ url('/convert-pdf/' . $identitasData->nama) }}" class="btn btn-primary btn-outline-primary" id="convertLink" data-name="{{ $identitasData->nama }}">Download CV</a>
									<a href="{{ route('logout') }}" class="btn btn-primary">Log Out</a>
								</p>
							</div>
						</div>
						
						<script>
							// Ambil nama dari atribut data
							const convertLink = document.getElementById('convertLink');
							const name = convertLink.getAttribute('data-name');
							
							// Jika nama ditemukan dalam atribut data, tautkan ke halaman /convert-pdf/nama
							if (name) {
								convertLink.href = `/convert-pdf/${name}`;
							}
						</script>
						
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-about ftco-section ftco-no-pt ftco-no-pb" id="about-section">
		<div class="container">
			<div class="row d-flex no-gutters">
				<div class="col-md-6 col-lg-5 d-flex">
					<div class="img-about img d-flex align-items-stretch">
						<div class="overlay"></div>
						<div class="img d-flex align-self-stretch align-items-center" style="background-image: url('{{ asset('pas_foto/' . @$identitasData->pas_foto) }}');">
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-7 pl-md-4 pl-lg-5 py-5">
					<div class="py-md-5">
						<div class="row justify-content-start pb-3">
							<div class="col-md-12 heading-section ftco-animate">
								<span class="subheading">My Intro</span>
								<h2 class="mb-4" style="font-size: 34px; text-transform: capitalize;">About Me</h2>
                                <p class="about-info">
									Perkenalkan, saya adalah <span>{{ $identitasData->nama }}</span>, seorang <span>{{ $identitasData->jenis_kelamin }}</span> kelahiran <span>{{ $identitasData->tempat_lahir }}</span> pada tanggal <span>{{ $identitasData->tanggal_lahir }}</span>. Saya memeluk agama <span>{{ $identitasData->agama }}</span>, dan nilai-nilai tersebut telah membimbing saya dalam menjalani kehidupan sehari-hari dengan penuh kesederhanaan dan kebaikan. Meskipun saya adalah warga negara <span>{{ $identitasData->kewarganegaraan }}</span>, saya selalu tertarik untuk memahami berbagai budaya dan bahasa dari seluruh dunia, dan saya berharap bisa menjalin hubungan baik dengan beragam orang dari berbagai latar belakang. Saat ini, saya berstatus <span>{{ $identitasData->status }}</span>, saya percaya bahwa setiap tahap dalam hidup kita memiliki keindahannya sendiri, dan saya berusaha untuk belajar dan tumbuh sepanjang perjalanan ini.
								</p>
							</div>
							<div class="col-md-12">
								<div class="my-interest d-lg-flex w-100">
									<div class="interest-wrap d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="flaticon-listening"></span>
										</div>
										<div class="text">Music</div>
									</div>
									<div class="interest-wrap d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="flaticon-suitcases"></span>
										</div>
										<div class="text">Travel</div>
									</div>
									<div class="interest-wrap d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="flaticon-video-player"></span>
										</div>
										<div class="text">Movie</div>
									</div>
									<div class="interest-wrap d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="flaticon-football"></span>
										</div>
										<div class="text">Sports</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="ftco-section bg-primary" id="skills-section">
		<div class="container">
			<div class="row justify-content-center pb-5">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<span class="subheading" style="color: white;">Skills</span>
					<h2 class="mb-4">My Skills</h2>
				</div>
			</div>
            <div class="row progress-circle mb-5">
                @foreach ($skillData as $skill)
                <div class="col-lg-4 mb-4">
                    <div class="bg-white rounded-lg shadow p-4">
                        <h2 class="h5 font-weight-bold text-center mb-4">{{ $skill->nama_skill }}</h2>

                        <!-- Progress bar -->
                        <div class="progress mx-auto" data-value="{{ $skill->persen_skill }}" style="margin-bottom: 30px;">
                            <span class="progress-left">
                                <span class="progress-bar border-primary"></span>
                            </span>
                            <span class="progress-right">
                                <span class="progress-bar border-primary"></span>
                            </span>
                            <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                <div class="h2 font-weight-bold">{{ $skill->persen_skill }}<sup class="small">%</sup></div>
                            </div>
                        </div>
                        <!-- END -->
                    </div>
                </div>
                @endforeach
            </div>

		</div>
	</section>

    <section class="ftco-section ftco-no-pb bg-light" id="education-section">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Education</span>
                    <h2 class="mb-4">My Education Journey</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="timeline">
                        @foreach($pendidikanData as $index => $pendidikan)
                        <li class="{{ $index % 2 == 0 ? 'timeline-inverted' : '' }}">
                            <div class="timeline-badge"><i class="icon-graduation-cap"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h3 class="timeline-title">{{ $pendidikan->nama_instansi }}</h3>
                                    <span class="company">{{ $pendidikan->tahun_masuk }} - {{ $pendidikan->tahun_lulus }}</span>
                                </div>
                                <div class="timeline-body">
                                    <p>{{ $pendidikan->nama_jurusan }}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section" id="organization-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Organization</span>
                    <h2 class="mb-4">Organization</h2>
                </div>
            </div>

            @php
            $icons = ['flaticon-3d-design', 'flaticon-app-development', 'flaticon-web-programming', 'flaticon-branding'];
            $iconIndex = 0;
            @endphp

            @foreach ($organisasiData as $organisasi)
            @if ($loop->index % 4 == 0)
            <div class="row">
            @endif

            <div class="col-md-6 col-lg-3">
                <div class="media block-6 services d-block bg-white rounded-lg shadow ftco-animate">
                    <div class="icon shadow d-flex align-items-center justify-content-center">
                        <span class="{{ $icons[$iconIndex] }}"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading mb-3">{{ $organisasi->nama_organisasi }}</h3>
                        <span class="mr-2">{{ $organisasi->tahun_awal }} - {{ $organisasi->tahun_akhir }}</span>
                        <p>{{ $organisasi->jabatan }}</p>
                    </div>
                </div>
            </div>

            @php
            $iconIndex = ($iconIndex + 1) % count($icons);
            @endphp

            @if ($loop->index % 4 == 3 || $loop->last)
            </div>
            @endif
            @endforeach

        </div>
    </section>


	<section class="ftco-section ftco-project" id="portofolio-section">
		<div class="container-fluid px-md-4">
			<div class="row justify-content-center pb-5">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<span class="subheading">Portofolio</span>
					<h2 class="mb-4">Portofolio</h2>
				</div>
			</div>
			<div class="row d-flex">
                @foreach($portofolioData as $portofolio)
				<div class="col-md-4 d-flex ftco-animate">
					<div class="blog-entry justify-content-end">
						<div class="block-20" style="background-image: url({{ asset('foto_proyek/' . $portofolio->foto_proyek) }}">
                        </div>
						<div class="text mt-3 float-right d-block">
							<h3 class="heading">{{ $portofolio->nama_proyek }}</h3>
							<p>{{ $portofolio->deskripsi }}</p>
						</div>
					</div>
				</div>
                @endforeach
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-project" id="gallery-section">
		<div class="container-fluid px-md-4">
			<div class="row justify-content-center pb-5">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<span class="subheading">Gallery</span>
					<h2 class="mb-4">My Gallery</h2>
				</div>
			</div>
			<div class="row">
				@foreach ($galeriData as $galeri)
					<div class="col-md-3">
						<div class="project img shadow ftco-animate d-flex justify-content-center align-items-center" style="background-image: url('{{ asset('foto/' . @$galeri->foto) }}');">
							<div class="overlay"></div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>

	<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<span class="subheading">Get In Touch</span>
					<h2 class="mb-4">Contact</h2>
				</div>
			</div>

			<div class="row block-9">
				<div class="col-md-12 d-flex pl-md-5">
					<div class="row">
						<div class="dbox w-100 d-flex">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-map-marker"></span>
							</div>
							<div class="text">
								<p><span>Address:</span> {{ $kontakData->alamat }}</p>
							</div>
						</div>
						<div class="dbox w-100 d-flex">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-phone"></span>
							</div>
							<div class="text">
								<p><span>Phone:</span> <a href="tel://1234567920">{{ $kontakData->no_telepon }}</a></p>
							</div>
						</div>
						<div class="dbox w-100 d-flex">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-paper-plane"></span>
							</div>
							<div class="text">
								<p><span>Email:</span> <a href="mailto:info@yoursite.com">{{ $kontakData->email }}</a></p>
							</div>
						</div>
					</div>
					<!-- <div id="map" class="map"></div> -->
				</div>
			</div>
		</div>
	</section>
	

	<footer class="ftco-footer ftco-section" style="margin-top: 120px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<p>&copy; <script>document.write(new Date().getFullYear());</script> . S1 - 3B/D4 Teknik Informatika</p>
				</div>
			</div>
		</footer>
		
		

		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


		<script src="{{asset('alt_landing_page')}}/js/jquery.min.js"></script>
		<script src="{{asset('alt_landing_page')}}/js/jquery-migrate-3.0.1.min.js"></script>
		<script src="{{asset('alt_landing_page')}}/js/popper.min.js"></script>
		<script src="{{asset('alt_landing_page')}}/js/bootstrap.min.js"></script>
		<script src="{{asset('alt_landing_page')}}/js/jquery.easing.1.3.js"></script>
		<script src="{{asset('alt_landing_page')}}/js/jquery.waypoints.min.js"></script>
		<script src="{{asset('alt_landing_page')}}/js/jquery.stellar.min.js"></script>
		<script src="{{asset('alt_landing_page')}}/js/owl.carousel.min.js"></script>
		<script src="{{asset('alt_landing_page')}}/js/jquery.magnific-popup.min.js"></script>
		<script src="{{asset('alt_landing_page')}}/js/jquery.animateNumber.min.js"></script>
		<script src="{{asset('alt_landing_page')}}/js/scrollax.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
		<script src="{{asset('alt_landing_page')}}/js/google-map.js"></script>
		
		<script src="{{asset('alt_landing_page')}}/js/main.js"></script>

		<script>
			document.addEventListener('DOMContentLoaded', function () {
			  const toggleSwitch = document.querySelector('input[type="checkbox"]');
			  const storageKey = 'landingPageToggleState';
		  
			  // Check if toggle state is stored in local storage
			  const savedToggleState = localStorage.getItem(storageKey);
			  if (savedToggleState === 'true') {
				toggleSwitch.checked = false;
			  }
		  
			  toggleSwitch.addEventListener('change', function () {
				// Update local storage with the toggle state
				localStorage.setItem(storageKey, this.checked);
		  
				// Get the current URL path
				const currentPage = window.location.pathname;
		  
				if (this.checked) {
				  // Landing page 1 is selected
				  // Redirect to /dashboard/{name}
				  const name = extractNameFromPath(currentPage);
				  window.location.href = `/dashboard/${name}`;
				} else {
				  // Landing page 2 is selected
				  // Redirect to /dashboard2/{name}
				  const name = extractNameFromPath(currentPage);
				  window.location.href = `/dashboard2/${name}`;
				}
			  });
		  
			  // Function to extract name from the URL path
			  function extractNameFromPath(path) {
				// Find the last segment of the path (which should be the name)
				const parts = path.split('/');
				return parts[parts.length - 1];
			  }
		  
			  // Additional code to handle toggle state when landing on page 2
			  const currentPage = window.location.pathname;
			  if (currentPage.startsWith('/dashboard/')) {
				toggleSwitch.checked = true; // Set toggle to "on" on page 2
			  }
			});
		  </script>			
	</body>
</html>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Landing Page 1</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('landing_page')}}/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('landing_page')}}/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('landing_page')}}/css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{asset('landing_page')}}/css/flexslider.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="{{asset('landing_page')}}/fonts/flaticon/font/flaticon.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{asset('landing_page')}}/css/owl.carousel.min.css">
	<link rel="stylesheet" href="{{asset('landing_page')}}/css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset('landing_page')}}/css/style.css">

	<!-- Modernizr JS -->
	<script src="{{asset('landing_page')}}/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	<div id="colorlib-page">
		<div class="container-wrap">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="border js-fullheight">
			<div class="text-center">
                <div class="author-img" style="background-image: url('{{ asset('pas_foto/' . @$identitasData->pas_foto) }}');"></div>
				<h1 id="colorlib-logo"><a href="{{asset('landing_page')}}/index.html">{{ $identitasData->nama }}</a></h1>
			</div>
			<nav id="colorlib-main-menu" role="navigation" class="navbar">
				<div id="navbar" class="collapse">
					<ul>
						<li class="active"><a href="#" data-nav-section="home">Home</a></li>
						<li><a href="#" data-nav-section="about">About</a></li>
						<li><a href="#" data-nav-section="skills">Skills</a></li>
						<li><a href="#" data-nav-section="education">Education</a></li>
						<li><a href="#" data-nav-section="organization">Organization</a></li>
						<li><a href="#" data-nav-section="portofolio">Portofolio</a></li>
						<li><a href="#" data-nav-section="contact">Contact</a></li>
						<label class="switch">
							<input type="checkbox">
							<span class="slider round"></span>
						</label>
					</ul>
				</div>
			</nav>

			<div class="colorlib-footer">
				<p><small>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright <script>document.write(new Date().getFullYear());</script> All rights reserved. Made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> </span> <span>Distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a></span> <span>Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash.com</a></span></small></p>
				<ul>
					<li><a href="#"><i class="icon-facebook2"></i></a></li>
					<li><a href="#"><i class="icon-twitter2"></i></a></li>
					<li><a href="#"><i class="icon-instagram"></i></a></li>
					<li><a href="#"><i class="icon-linkedin2"></i></a></li>
				</ul>
			</div>

		</aside>

		<div id="colorlib-main">
			<section id="colorlib-hero" class="js-fullheight" data-section="home">
				<div class="flexslider js-fullheight">
					<ul class="slides">
				   	<li style="background-image: url({{asset('landing_page')}}/images/bg_1.jpg);">
				   		<div class="overlay"></div>
				   		<div class="container-fluid">
				   			<div class="row">
					   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 col-sm-12 col-xs-12 js-fullheight slider-text">
					   				<div class="slider-text-inner js-fullheight">
					   					<div class="desc">
						   					<h1>Hi! <br>I'm {{ $identitasData->nama }}</h1>
						   					<h2>100% html5 bootstrap templates Made by <a href="https://colorlib.com/" target="_blank">colorlib.com</a></h2>
											   <p>
													<a id="convertLink" class="btn btn-primary btn-learn" href="{{ url('/convert-pdf/2') }}">Download CV <i class="icon-download4"></i></a>
												</p>
										</div>
					   				</div>
					   			</div>
					   		</div>
				   		</div>
				   	</li>
				   	<li style="background-image: url({{asset('landing_page')}}/images/bg_2.jpg);">
				   		<div class="overlay"></div>
				   		<div class="container-fluid">
				   			<div class="row">
					   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 col-sm-12 col-xs-12 js-fullheight slider-text">
					   				<div class="slider-text-inner">
					   					<div class="desc">
						   					<h1>I am <br>a {{ $identitasData->pekerjaan }}</h1>
												<h2>100% html5 bootstrap templates Made by <a href="https://colorlib.com/" target="_blank">colorlib.com</a></h2>
												<p><a class="btn btn-primary btn-learn">View Portfolio <i class="icon-briefcase3"></i></a></p>
										</div>
					   				</div>
					   			</div>
					   		</div>
				   		</div>
				   	</li>
				  	</ul>
			  	</div>
			</section>

			<section class="colorlib-about" data-section="about">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-12">
							<div class="row row-bottom-padded-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="col-md-12">
									<div class="about-desc">
										<span class="heading-meta">About Me</span>
										<h2 class="colorlib-heading">Who Am I?</h2>
										<p>
											Perkenalkan, saya adalah <strong>{{ $identitasData->nama }}</strong>, seorang <strong>{{ $identitasData->jenis_kelamin }}</strong> kelahiran <strong>{{ $identitasData->tempat_lahir }}</strong> pada tanggal <strong>{{ $identitasData->tanggal_lahir }}</strong>. Saya memeluk agama <strong>{{ $identitasData->agama }}</strong>, dan nilai-nilai tersebut telah membimbing saya dalam menjalani kehidupan sehari-hari dengan penuh kesederhanaan dan kebaikan. Meskipun saya adalah warga negara <strong>{{ $identitasData->kewarganegaraan }}</strong>, saya selalu tertarik untuk memahami berbagai budaya dan bahasa dari seluruh dunia, dan saya berharap bisa menjalin hubungan baik dengan beragam orang dari berbagai latar belakang. Saat ini, saya masih dalam status <strong>{{ $identitasData->status }}</strong>, namun saya percaya bahwa setiap tahap dalam hidup kita memiliki keindahannya sendiri, dan saya berusaha untuk belajar dan tumbuh sepanjang perjalanan ini.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>


			<section class="colorlib-skills" data-section="skills">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">My Specialty</span>
							<h2 class="colorlib-heading animate-box">My Skills</h2>
						</div>
					</div>
                    <div class="row">
                        @foreach ($skillData as $skill)
                            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                                <div class="progress-wrap">
                                    <h3>{{ $skill->nama_skill }}</h3>
                                    <div class="progress">
                                        <div class="progress-bar color-{{ $loop->index + 1 }}" role="progressbar" aria-valuenow="{{ $skill->persen_skill }}"
                                            aria-valuemin="0" aria-valuemax="100" style="width: {{ $skill->persen_skill }}%">
                                            <span>{{ $skill->persen_skill }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

				</div>
			</section>

			<section class="colorlib-education" data-section="education">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Education</span>
							<h2 class="colorlib-heading animate-box">Education</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="timeline-centered">
								@php
									$colors = ['color-1', 'color-2', 'color-3', 'color-4', 'color-5'];
								@endphp

								@foreach($pendidikanData as $key => $pendidikan)
									@php
										$colorIndex = $key % count($colors);
										$currentColor = $colors[$colorIndex];
									@endphp

									<article class="timeline-entry animate-box" data-animate-effect="fadeInLeft">
										<div class="timeline-entry-inner">
											<div class="timeline-icon {{ $currentColor }}">
												<i class="icon-pen2"></i>
											</div>
											<div class="timeline-label">
												<h2>{{ $pendidikan->nama_instansi }} <span>{{ $pendidikan->tahun_masuk }} - {{ $pendidikan->tahun_lulus }}</span></h2>
												<p>{{ $pendidikan->nama_jurusan }}</p>
											</div>
										</div>
									</article>
								@endforeach

								<article class="timeline-entry begin animate-box" data-animate-effect="fadeInBottom">
									<div class="timeline-entry-inner">
										<div class="timeline-icon color-none">
										</div>
									</div>
								</article>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="colorlib-experience" data-section="organization">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Organization</span>
							<h2 class="colorlib-heading animate-box">Organization</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
							<div class="fancy-collapse-panel">
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									@foreach($organisasiData as $organisasi)
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="heading{{ $organisasi->id }}">
												<h4 class="panel-title">
													<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $organisasi->id }}" aria-expanded="false" aria-controls="collapse{{ $organisasi->id }}">{{ $organisasi->nama_organisasi }}
													</a>
												</h4>
											</div>
											<div id="collapse{{ $organisasi->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $organisasi->id }}">
												<div class="panel-body">
													<p><strong>{{ $organisasi->jabatan }}</strong> <span>{{ $organisasi->tahun_awal }} - {{ $organisasi->tahun_akhir }}</span></p>
												</div>
											</div>
										</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="colorlib-blog" data-section="portofolio">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Portofolio</span>
							<h2 class="colorlib-heading">Portofolio</h2>
						</div>
					</div>
					<div class="row">
						@foreach($portofolioData as $portofolio)
						<div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
							<div class="blog-entry">
								<a href="blog.html" class="blog-img">
									<img src="{{ asset('foto_proyek/' . $portofolio->foto_proyek) }}" class="img-responsive" alt="{{ $portofolio->nama_proyek }}">
								</a>
								<div class="desc">
									<h3><a href="blog.html">{{ $portofolio->nama_proyek }}</a></h3>
									<p>{{ $portofolio->deskripsi }}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</section>

			<section class="colorlib-contact" data-section="contact">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Get in Touch</span>
							<h2 class="colorlib-heading">Contact</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="colorlib-icon">
									<i class="icon-globe-outline"></i>
								</div>
								<div class="colorlib-text">
									<p><a href="#">{{ $kontakData->email }}</a></p>
								</div>
							</div>

							<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="colorlib-icon">
									<i class="icon-map"></i>
								</div>
								<div class="colorlib-text">
									<p>{{ $kontakData->alamat }}</p>
								</div>
							</div>

							<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="colorlib-icon">
									<i class="icon-phone"></i>
								</div>
								<div class="colorlib-text">
									<p><a href="tel://">{{ $kontakData->no_telepon }}</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

		</div><!-- end:colorlib-main -->
	</div><!-- end:container-wrap -->
	</div><!-- end:colorlib-page -->

	<!-- jQuery -->
	<script src="{{asset('landing_page')}}/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('landing_page')}}/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="{{asset('landing_page')}}/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="{{asset('landing_page')}}/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="{{asset('landing_page')}}/js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="{{asset('landing_page')}}/js/owl.carousel.min.js"></script>
	<!-- Counters -->
	<script src="{{asset('landing_page')}}/js/jquery.countTo.js"></script>
	
	
	<!-- MAIN JS -->
	<script src="{{asset('landing_page')}}/js/main.js"></script>

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
					// Landing page 2 is selected
					// Redirect to /rahma-dashboard2/{identitas_id}
					const identitas_id = extractIdentitasIdFromPath(currentPage);
					window.location.href = `/rahma-dashboard2/2`;
				} else {
					// Landing page 1 is selected
					// Redirect to /rahma-dashboard
					window.location.href = `/rahma-dashboard/2`;
				}
			});

			// Function to extract identitas_id from the URL path
			function extractIdentitasIdFromPath(path) {
				const parts = path.split('/');
				const identitas_idIndex = parts.indexOf('rahma-dashboard') + 1;
				return parts[identitas_idIndex];
			}

			// Additional code to handle toggle state when landing on page 2
			// const currentPage = window.location.pathname;
			// if (currentPage === '/rahma-dashboard2') {
			// 	toggleSwitch.checked = true; // Set toggle to "on" on page 2
			// }
		});
	</script>

	</body>
</html>


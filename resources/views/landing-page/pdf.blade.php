<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	<head>
    <style>
        body {
				background-image:url();
				background-size: auto;
				background-color: #f0f0f0;
				background-size: contain;
				background-repeat: no-repeat;
				background-position: -232px 232px;
				background-attachment: fixed;
				width: 95%;
			}
			#colspan{
			background-color: #416ea6;
			background-position: center center;
			box-shadow: 0 0 25px;
			width: 30%;
			height: 1300px;
			text-align: justify;
			float: left;
			padding: 0 8px;
			padding-right: 16px;
            color: white;
			
			}
			.container-padding {
			box-shadow: 0 0 25px;
			width: 70%;
			height: 1300px;
			background-color: rgb(255, 255, 255);
			box-sizing: border-box;
			color: rgb(0, 0, 0);
			font-family: "Roboto", sans-serif;
			font-size: 15px;
			line-height: 22.5px;
			margin-left: 34%;
			padding-bottom: 0.15px;
			padding-left: 16px;
			padding-top: 0.15px;
			}
			
			.padding { 
				text-align: left;
			}
			.padding-bottom {
			box-shadow: 0 0 25px;
			width: 70%;
			position: bottom;
			height: 588.2px;
			background-color: rgb(255, 255, 255);
			box-sizing: border-box;
			color: rgb(0, 0, 0);
			font-family: "Roboto", sans-serif;
			font-size: 15px;
			line-height: 22.5px;
			margin-left: 34%;
			padding-bottom: 0.15px;
			padding-left: 16px;
			padding-top: 0.15px;
			margin-top: 16px;
			}
			
			
			
			.load {
			background-color: rgb(241, 241, 241);
			border-bottom-left-radius: 16px;
			border-bottom-right-radius: 16px;
			border-top-left-radius: 16px;
			border-top-right-radius: 16px;
			box-sizing: border-box;
			color: rgb(0, 0, 0);
			font-family: "Roboto", sans-serif;
			font-size: 12px;
			line-height: 18px;
			}
			.progress {
			background-color:  #ed951a !important;
			border-bottom-left-radius: 13px;
			border-bottom-right-radius: 16px;
			border-top-left-radius: 16px;
			border-top-right-radius: 16px;
			box-sizing: border-box;
			color: rgb(0, 0, 0);
			font-family: "Roboto", sans-serif;
			font-size: 12px;
			line-height: 18px;
			color:  #ffff !important;
			text-align: center;
			}
			.load2 {
				background-color: rgb(241, 241, 241);
				border-bottom-left-radius: 16px;
				border-bottom-right-radius: 16px;
				border-top-left-radius: 16px;
				border-top-right-radius: 16px;
				box-sizing: border-box;
				color: rgb(0, 0, 0);
				font-family: "Roboto", sans-serif;
				font-size: 12px;
				line-height: 18px;
			}
			
			
			.progress2 {
			background-color:  #009688 !important;
			border-bottom-left-radius: 16px;
			border-bottom-right-radius: 16px;
			border-top-left-radius: 16px;
			border-top-right-radius: 16px;
			box-sizing: border-box;
			color: rgb(0, 0, 0);
			font-family: "Roboto", sans-serif;
			font-size: 12px;
			line-height: 18px;
			color:  #ffff !important;
			text-align: center;
			}
			.load3 {
				background-color: rgb(241, 241, 241);
				border-bottom-left-radius: 16px;
				border-bottom-right-radius: 16px;
				border-top-left-radius: 16px;
				border-top-right-radius: 16px;
				box-sizing: border-box;
				color: rgb(0, 0, 0);
				line-height: 18px;
			}
			.progress3 {
				background-color: #009688 !important;
				border-bottom-left-radius: 16px;
				border-bottom-right-radius: 16px;
				border-top-left-radius: 16px;
				border-top-right-radius: 16px;
				color: #fff !important;
				text-align: center;
				line-height: 18px;
				font-size: 12px;
				
			}
			.load4 {
				background-color: rgb(241, 241, 241);
				border-bottom-left-radius: 16px;
				border-bottom-right-radius: 16px;
				border-top-left-radius: 16px;
				border-top-right-radius: 16px;
				box-sizing: border-box;
				color: rgb(0, 0, 0);
				line-height: 18px;
			}
			.progress4 {
				background-color: #009688 !important;
				border-bottom-left-radius: 16px;
				border-bottom-right-radius: 16px;
				border-top-left-radius: 16px;
				border-top-right-radius: 16px;
				color: #fff !important;
				text-align: center;
				line-height: 18px;
				font-size: 12px;
			}
			.content1 { 
				padding: 0px;
                margin-left:10px;
			}
			.content2 {
				padding: 14px;
			}
			.content3 {
				padding: 10px;
			}
			.content4 {
				padding: 16px;
			}
			.content5 {
				padding: 16px;
			}
			.content6 {
				padding: 16px;
			}
			img  {
				size: cover;
				width: 100%;
				height: 225px;
				line-height: 1.5px;
                margin-top:10px;
			}
			
				
			h4{
				color: white;
				padding: 15px;
				text-align: left;
				margin-top: -10px;
			}
			i {
				padding: 5px;
				color: #b2b2b2 !important;
			}
			hr {
				border: -1px solid gray;
			}
			
    </style>
<body>
    
            <?php
            $host = env('DB_HOST', '127.0.0.1');
            $username = env('DB_USERNAME', 'root');
            $password = env('DB_PASSWORD', '');
            $database = env('DB_DATABASE', 'laravel');

            // Koneksi ke database
            $conn = new mysqli($host, $username, $password, $database);

            // Periksa koneksi
            if ($conn->connect_error) {
                die("Koneksi ke database gagal: " . $conn->connect_error);
            }

            $identitasData = App\Models\identitas::where('id', $id)->first();

            if ($identitasData) {
                $nama = $identitasData->nama;
                $tempat_lahir = $identitasData->tempat_lahir;
                $pekerjaan = $identitasData->pekerjaan;
                $tanggal_lahir = $identitasData->tanggal_lahir;
                $jenis_kelamin = $identitasData->jenis_kelamin;
                $agama = $identitasData->agama;
                $kewarganegaraan = $identitasData->kewarganegaraan;
                $status = $identitasData->status;
                
                
  $imageData = $identitasData->pas_foto;
//   $encodeimageurl = base64_encode(public_path('/pas_Foto/').$imageData);
// $imageFolder = file_get_contents('pasfoto/'.$imageData); 
// $imagepath = "data:image/jpg;base64";
// $imageanu = base64_encode(@file_get_contents(url('http://127.0.0.1:8000/pas_foto/231017023914.jpg')));
// $fullpath = $imagepath.",".$imageanu;

// // Encode the filename to make it safer
// $encodedImageName = base64_encode($imageData);

// $imageSrc = $imageFolder . $encodedImageName;
// var_dump($imageSrc);
            }
               
            
            // $kontak = App\Models\kontak::where('id', $id)->first();

            // if ($kontak) {
            //     $email = $kontak->email;
            //     $alamat = $kontak->alamat;
            //     $no_telepon = $kontak->no_telepon;
            
                
            //     // Tampilkan gambar profil              
            // } else {
            //     echo "Tidak ada data identitas.";
            // }

			// Mengambil data pendidikan
            $queryKontak = "SELECT * FROM kontak WHERE identitas_id = $id";
            $resultKontak = $conn->query($queryKontak);
            $kontak = [];

            if ($resultKontak->num_rows > 0) {
                while ($rowKontak = $resultKontak->fetch_assoc()) {
                    $kontak[] = $rowKontak;
                }
            } else {
                echo "Tidak ada data kontak.";
            }
            

            // Mengambil data pendidikan
            $queryPendidikan = "SELECT * FROM pendidikan WHERE identitas_id = $id";
            $resultPendidikan = $conn->query($queryPendidikan);
            $pendidikan = [];

            if ($resultPendidikan->num_rows > 0) {
                while ($rowPendidikan = $resultPendidikan->fetch_assoc()) {
                    $pendidikan[] = $rowPendidikan;
                }
            } else {
                echo "Tidak ada data pendidikan.";
            }

            // Mengambil data organisasi
            $queryOrganisasi = "SELECT * FROM organisasi WHERE identitas_id = $id";
            $resultOrganisasi = $conn->query($queryOrganisasi);
            $organisasi = [];

            if ($resultOrganisasi->num_rows > 0) {
                while ($rowOrganisasi = $resultOrganisasi->fetch_assoc()) {
                    $organisasi[] = $rowOrganisasi;
                }
            } else {
                echo "Tidak ada data pendidikan.";
            }

            // Mengambil data skill
            $querySkill = "SELECT * FROM skill WHERE identitas_id = $id";
            $resultSkill = $conn->query($querySkill);
            $skill = [];

            if ($resultSkill->num_rows > 0) {
                while ($rowSkill = $resultSkill->fetch_assoc()) {
                    $skill[] = $rowSkill;
                }
            } else {
                echo "Tidak ada data skill.";
            }

            // Mengambil data portofolio
            $queryPortofolio = "SELECT * FROM portofolio WHERE identitas_id = $id";
            $resultPortofolio = $conn->query($queryPortofolio);
            $portofolio = [];

            if ($resultPortofolio->num_rows > 0) {
                while ($rowPortofolio = $resultPortofolio->fetch_assoc()) {
                    $portofolio[] = $rowPortofolio;
                }
            } else {
                echo "Tidak ada data portofolio.";
            }
            ?>
    <!-- Container -->
        <div class="container">
            <div id="colspan">
                <img src="<?= public_path('/pas_Foto/').$imageData; ?>">
                <h4><?php echo $nama; ?></h4>
                <p><i class="fa fa-briefcase fa-fw large"></i><?php echo $pekerjaan; ?></p>
                <div class="Kontak" >
                    <?php foreach ($kontak as $kontak): ?>
                    <div class="left-skill"style="margin-top:-12px;">
                        <p><i class="fa fa-envelope fa-fw large"></i><?php echo $kontak['email']; ?></p>
                        <p><i class="fa fa-home fa-fw large"></i><?php echo $kontak['alamat']; ?></p>
                        <p><i class="fa fa-phone fa-fw large"></i><?php echo $kontak['no_telepon']; ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
                <hr>
                  <h3><i class="fa fa-user large"></i>Personal Information</h3>
                <p><i class="fa fa-calendar-o large"></i><?php echo $tempat_lahir . ", " . $tanggal_lahir; ?></p>
                <p><i class="fa fa-mars-stroke large"></i><?php echo $jenis_kelamin; ?></p>
                <p><i class="fa fa-male large"></i> <?php echo $agama; ?></p>
                <p><i class="fa fa-flag large"></i><?php echo $kewarganegaraan; ?></p>
                <p><i class="fa fa-heart large"></i><?php echo $status; ?></p>
                
                <hr>
                <h3><i class="fa fa-linux fa-fw large"></i>Skills</h3>
                <div class="skill" >
                    <?php foreach ($skill as $skl): ?>
                    <div class="left-skill"style="margin-top:-12px;">
                    <div style="color:white; display: flex; align-items: center;">
                        <span><?php echo $skl['nama_skill']; ?></span>
                        <progress value="<?php echo $skl['persen_skill']; ?>" max="100" style="background: black; margin-left: 10px;"></progress>
                        <span><?php echo $skl['persen_skill'] . '%'; ?></span>
                    </div>
                    </div>
                   
                    <?php endforeach; ?>
                </div>
  
                <!-- <hr> -->
              
                <!-- <h3><i class="fa fa-globe fa-fw large"></i>Social Media</h3>
                <a href="https://www.facebook.com/Rifkipaniktingkatdewa"><i class="fa fa-facebook fa-fw large"></i></a>
                <a href="https://www.instagram.com/rifkiloen/?hl=id"><i class="fa fa-instagram fa-fw large"></i></a>
                <a href="#"><i class="fa fa-twitter fa-fw large"></i></a>
                <a href="https://github.com/rifkiamalun"><i class="fa fa-github fa-fw large"></i></a>
                <a href="#"><i class="fa fa-git fa-fw large"></i></a> -->
            </div>
          <div class="container-padding">
        <div class="padding">
                <div class="content1">
            <h2 style="margin-top:-5px;"><i class="fa fa-briefcase fa-fw large"></i>Education</h2>
               <?php foreach ($pendidikan as $edu): ?>
            <h3><?php echo $edu['nama_instansi']; ?></h3>
            <p><i class="fa fa-calendar fa-fw large"></i><?php echo $edu['tahun_masuk'] . ' - ' . $edu['tahun_lulus']; ?></p>
            <p><?php echo $edu['nama_jurusan']; ?>
            </p>
            <hr>
             <?php endforeach; ?>
            </div>
               
            <!-- <hr> -->
             <!-- <div class="bottom"> -->
                 <h2><i class="fa fa-briefcase fa-fw large"></i>Portofolio :</h2>
                    <?php foreach ($portofolio as $prt): ?>
                 <div class="content1">

            <h3><?php echo $prt['nama_proyek']; ?></h3>
            <p><?php echo $prt['deskripsi']; ?></p>
            <hr>
            </div>
             <?php endforeach; ?>
                <!-- <div class="padding"> -->
                <div class="content1">
            <h2><i class="fa fa-briefcase fa-fw large"></i>Organisasi</h2>
                       <?php foreach ($organisasi as $org): ?>
            <h3><?php echo $org['nama_organisasi']; ?></h3>
            <p><i class="fa fa-calendar fa-fw large"></i><?php echo $org['tahun_awal'] . ' - ' . $org['tahun_akhir']; ?></p>
            <p><?php echo $org['jabatan']; ?>
            </p>
            <hr>
             <?php endforeach; ?>
            <!-- </div>  -->
            </div>
            </div>
            </div>
            </div>
          <!-- <div class="padding-bottom">
                <div class="bottom">
                 <div class="content1">
            <h2><i class="fa fa-briefcase fa-fw large"></i>Pengalaman :</h2>
            <h3>Sebagai Staff IT Telkom Indonesia</h3>
            <p><i class="fa fa-calendar fa-fw large"></i>2007-2012</p>
            </div>
            <hr>
                <div class="content2">
            <h3>Sekolah Menengah Pertama Negeri 13 Tangsel</h3>
            <p><i class="fa fa-calendar fa-fw large"></i>2012-2015</p>
 
           
            </div>
            <hr>
                <div class="content3"> 
            <h3>Sekolah Menengah Kejuruan Letris 1 Indonesia</h3>
            <p><i class="fa fa-calendar fa-fw large"></i>2015-2018</p>
                        </div>
            </div>
        </div> -->
    </body>
</html>
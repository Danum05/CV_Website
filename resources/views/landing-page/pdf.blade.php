<?php
use App\Models\Identitas;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Curriculum Vitae</title>
    <style>
    @page {
      size: A4; /* Atur ukuran kertas ke A4 */
      margin: 20mm; /* Atur margin ke 20mm (atau sesuai kebutuhan Anda) */
    }
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0; /* Warna latar belakang halaman */
    }

    @media print {
        .profile-pic {
            display: none; /* Sembunyikan gambar profil saat mencetak */
        }
    }

    .cv {
        max-width: 100%;
        margin: 0 auto;
        background-color: #fff; /* Warna latar belakang CV */
    }

    .section {
        margin-bottom: 20px;
        text-align: justify;
        padding: 20px;
        background-color: #f9f9f9; /* Warna latar belakang setiap bagian */
        border-radius: 5px; /* Sudut bulat pada setiap bagian */
        background-color: #f4f4f4;
    }

    .section p {
        margin: 0;
        font-size: 14px; /* Ukuran font yang lebih kecil */
    }

    .section h2 {
        font-size: 18px; /* Ukuran font yang lebih kecil */
        color: #007acc; /* Warna judul bagian */
    }

    .section ul {
        padding-left: 20px;
        list-style-type: disc;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px; 
    }

    table th, table td {
        border: 1px solid #ddd;
        padding: 6px; /* Padding yang lebih kecil */
        font-size: 14px; /* Ukuran font yang lebih kecil */
        text-align: left;
    }

    h1 {
        text-align: center;
        color: #007acc; /* Warna judul halaman */
        margin-bottom: 10px; /* Margin bawah yang lebih kecil */
    }

    ul {
        list-style-type: none;
    }

    ul li {
        margin-bottom: 8px; /* Margin bawah yang lebih kecil */
    }

    table {
        max-width: 80%; 
        margin: 0 auto; 
        border-collapse: collapse;
    }

    table th {
        background-color: #f2f2f2; 
        text-align: center;
    }

    table th, table td {
        border: 1px solid #ddd;
        padding: 6px; /* Padding yang lebih kecil */
        font-size: 14px; /* Ukuran font yang lebih kecil */
        text-align: left;
    }

    /* CSS untuk menengahkan progress bar */
    ul li p {
        text-align: center;
        margin-bottom: 5px;
    }

    progress {
        max-width: 150px; /* Sesuaikan dengan lebar maksimum yang Anda inginkan */
        width: 100%;
        height: 12px; /* Ukuran progress bar yang lebih kecil */
        display: block;
        margin: 0 auto;
    }

    /* CSS untuk menyesuaikan tampilan progress bar */
    progress::-webkit-progress-bar {
        background-color: #ccc; /* Warna latar belakang progress bar */
    }

    progress::-webkit-progress-value {
        background-color: #007acc; /* Warna progress bar */
    }

    /* Gaya tambahan untuk kolom skill */
    .section ul li p progress {
        max-width: 150px; /* Lebar maksimum progress bar skill */
        height: 8px; /* Ukuran progress bar yang lebih kecil */
        margin-top: 5px;
        border: none;
        border-radius: 5px;
    }

    /* Gaya tambahan untuk kolom portofolio */
    .section table {
        margin-top: 10px; /* Margin atas yang lebih kecil */
    }

    .section table th {
        background-color: #007acc; /* Warna latar belakang judul tabel */
        color: #fff; /* Warna teks judul tabel */
    }

    .section table th, .section table td {
        border: 1px solid #ddd;
        padding: 6px; /* Padding yang lebih kecil */
        font-size: 14px; /* Ukuran font yang lebih kecil */
        text-align: left;
    }

    /* Gaya tambahan untuk CV secara keseluruhan */
    h1 {
        font-size: 26px; /* Ukuran font yang lebih kecil */
        color: #007acc; /* Warna judul halaman */
        margin-bottom: 10px; /* Margin bawah yang lebih kecil */
    }

    /* Gaya tambahan untuk identitas */
    .identitas-detail p {
        font-size: 16px; /* Ukuran font yang lebih kecil */
    }

    /* Gaya tambahan untuk gambar profil */
    .profile-pic {
        max-width: 150px; /* Ukuran gambar yang lebih kecil */
        border-radius: 50%; /* Untuk membuat gambar profil menjadi bundar */
    }

    /* Gaya tambahan untuk judul-judul bagian */
    .section h2 {
        font-size: 18px; /* Ukuran font yang lebih kecil */
        color: #007acc; /* Warna judul bagian */
        text-align: center; /* Perataan judul di tengah */
        overflow: hidden; /* Mengatasi teks yang terlalu panjang */
        white-space: nowrap; /* Menghindari pemutusan kata */
        text-overflow: ellipsis; /* Menampilkan tanda elipsis (...) jika teks terlalu panjang */
        margin: 0; /* Menghapus margin atas bawah default */
        padding: 10px 0; /* Memberikan sedikit padding untuk penampilan yang lebih baik */
    }

    .horizontal-skills {
        list-style: none;
        padding: 0;
    }

    .horizontal-skills li {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .skill-info {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
    }

    .skill-name {
        flex: 1;
        text-align: right;
    }

    .progress-bar {
        flex: 1;
    }

    .skill-percent {
        flex: 1;
        text-align: left;
    }
</style>

</head>
<body>
    <div class="cv">
        <?php
        $host = env('DB_HOST', '127.0.0.1');
        $username = env('DB_USERNAME', 'root');
        $password = env('DB_PASSWORD', '');
        $database = env('DB_DATABASE', 'website');

        // Koneksi ke database
        $conn = new mysqli($host, $username, $password, $database);

        // Periksa koneksi
        if ($conn->connect_error) {
            die("Koneksi ke database gagal: " . $conn->connect_error);
        }

        $identitasData = Identitas::where('id', $id)->first();

        if ($identitasData) {
            $nama = $identitasData->nama;
            $tempat_lahir = $identitasData->tempat_lahir;
            $tanggal_lahir = $identitasData->tanggal_lahir;
            $jenis_kelamin = $identitasData->jenis_kelamin;
            $agama = $identitasData->agama;
            $kewarganegaraan = $identitasData->kewarganegaraan;
            $status = $identitasData->status;
            
            // Tampilkan gambar profil
            $imageData = $identitasData->pas_foto;
            $base64Image = base64_encode($imageData);
            $imageSrc = "data:image/jpeg;base64," . $base64Image;
            echo '<img src="' . $imageSrc . '" alt="profile_pic">';
        } else {
            echo "Tidak ada data identitas.";
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

        <h1>Curriculum Vitae</h1>
        <div class="section">
            <h2>Identitas</h2>
                <div class="identitas-detail">
                    <p>Nama: <?php echo $nama; ?></p>
                    <p>Tempat, Tanggal Lahir: <?php echo $tempat_lahir . ", " . $tanggal_lahir; ?></p>
                    <p>Jenis Kelamin: <?php echo $jenis_kelamin; ?></p>
                    <p>Agama: <?php echo $agama; ?></p>
                    <p>Kewarganegaraan: <?php echo $kewarganegaraan; ?></p>
                    <p>Status: <?php echo $status; ?></p>
                </div>
            </div>
        </div>

        <div class="section">
            <h2>Pendidikan</h2>
            <table>
                <tr>
                    <th>Nama Instansi</th>
                    <th>Jurusan</th>
                    <th>Periode</th>
                </tr>
                <?php foreach ($pendidikan as $edu): ?>
                    <tr>
                        <td><?php echo $edu['nama_instansi']; ?></td>
                        <td><?php echo $edu['nama_jurusan']; ?></td>
                        <td><?php echo $edu['tahun_masuk'] . ' - ' . $edu['tahun_lulus']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>


        <div class="section">
            <h2>Organisasi</h2>
            <table>
                <tr>
                    <th>Nama Organisasi</th>
                    <th>Jabatan</th>
                    <th>Periode</th>
                </tr>
                <?php foreach ($organisasi as $org): ?>
                    <tr>
                        <td><?php echo $org['nama_organisasi']; ?></td>
                        <td><?php echo $org['jabatan']; ?></td>
                        <td><?php echo $org['tahun_awal'] . ' - ' . $org['tahun_akhir']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="section">
            <h2>Skill</h2>
            <ul class="horizontal-skills">
                <?php foreach ($skill as $skl): ?>
                    <li>
                        <div class="skill-info">
                            <p class="skill-name"><?php echo $skl['nama']; ?></p>
                            <div class="progress-bar">
                                <progress value="<?php echo $skl['persentase']; ?>" max="100"></progress>
                            </div>
                            <p class="skill-percent"><?php echo $skl['persentase'] . '%'; ?></p>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="section">
            <h2>Portofolio</h2>
            <table>
                <tr>
                    <th>Nama Proyek</th>
                    <th>Deskripsi</th>
                </tr>
                <?php foreach ($portofolio as $prt): ?>
                    <tr>
                        <td><?php echo $prt['nama_proyek']; ?></td>
                        <td><?php echo $prt['deskripsi']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>
</html>

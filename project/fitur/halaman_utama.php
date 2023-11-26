<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="home.css">
    <script src="https://kit.fontawesome.com/ac8548371f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <aside>
			<center class="logo">
					<svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#179299}</style><path d="M312 32c-13.3 0-24 10.7-24 24s10.7 24 24 24h16c98.7 0 180.6 71.4 197 165.4c-9-3.5-18.8-5.4-29-5.4H431.8l-41.8-97.5c-3.4-7.9-10.8-13.4-19.3-14.4s-17 2.7-22.1 9.6l-40.9 55.5-21.7-50.7c-3.3-7.8-10.5-13.2-18.9-14.3s-16.7 2.3-22 8.9l-240 304c-8.2 10.4-6.4 25.5 4 33.7s25.5 6.4 33.7-4l79.4-100.5 43 16.4-40.5 55c-7.9 10.7-5.6 25.7 5.1 33.6s25.7 5.6 33.6-5.1L215.1 400h74.5l-29.3 42.3c-7.5 10.9-4.8 25.8 6.1 33.4s25.8 4.8 33.4-6.1L348 400h80.4l38.8 67.9c6.6 11.5 21.2 15.5 32.7 8.9s15.5-21.2 8.9-32.7L483.6 400H496c44.1 0 79.8-35.7 80-79.7c0-.1 0-.2 0-.3V280C576 143 465 32 328 32H312zm50.5 168l17.1 40H333l29.5-40zm-87.7 38.1l-1.4 1.9H225.1l32.7-41.5 16.9 39.5zM88.8 240C57.4 240 32 265.4 32 296.8c0 15.5 6.3 30 16.9 40.4L126.7 240H88.8zM496 288a16 16 0 1 1 0 32 16 16 0 1 1 0-32z"/></svg><span style="font-size:17px;position:relative;top: -9px"> Kecorp</span>
				</center>
    <div class="pilihan">
				
        <div class="selected">
          <p><i class="fa-solid fa-house" style="color: teal;"></i><a href="halaman_utama.php"> halaman utama</a></p>
        </div>
				<hr style="border-color: rgba(255, 255, 255 ,0.2);">
        <p><i class="fa-solid fa-database"></i><a href="database.php">database</a></p>
        <p><i class="fa-regular fa-square-plus"></i><a href="menambah.php">menambah</a></p>
        <p><i class="fa-solid fa-clock-rotate-left"></i><a href="mengubah.php">mengubah</a></p>
        <p><i class="fa-solid fa-delete-left"></i><a href="menghapus.php">menghapus</a></p>
        <p><i class="fa-solid fa-magnifying-glass"></i><a href="mencari.php">mencari</a></p>
        <p><i class="fa-regular fa-eye"></i><a href="tampilkan.php">tampilkan</a></p>
        <p><i class="fa-solid fa-sack-dollar"></i><a href="gaji.php">gaji</a></p>
				<hr style="border-color:rgba(255,255,255,0.2);">
				<p><i class="fa-solid fa-arrow-right-from-bracket" style="color: #ff5252;"></i><a href="../index.php"> Log Out</a></p>
      </div>
    </aside>
    <main>
      <h1>
        selamat datang
        <span class="merah">
        <?php
        /* memanggil data ussername dari file user.txt yang sudah ditulis pada saat login agar dapat dimunculkan dalam halaman_utama */
        $user=fopen("user.txt","r");
        $username=fgets($user);
        fclose($user);
        echo $username;
        ?>
        </span>
      </h1>
     <hr>
     <p>ini adalah mini project mata kuliah praktikum algoritma dan pemrograman</p>
     <p>kami dari kelompok 2 dengan anggota kelompok :</p>
     <ol>
      <li>Ego Irfandi (230202007)</li>
      <li>Rina Nur Rohmah (230102021)</li>
      <li>Yonan Prasetyo (230102023)</li>
      <li>Yovi Tito Budianto (230202024)</li>
     </ol>
     <p>untuk perhitungan gaji kami buat perbulan</p>
     <p>artinya untuk jam kerja yang 40jam/minggu menjadi 160jam/minggu (belum termasuk lembur)</p>
     <p>dan jumlah masuk/bulan maksimal 24 hari</p><hr>
     <p>tambahan untuk fitur di database terdapat fitur untuk membuat database baru</p>
     <p>jadi user bebas untuk membuat database(file .txt) sebanyak-banyaknya, tidak hanya <span class="merah">pegawai.txt</span></p>
     <p>kami membuat contoh terdapat 5 database yaitu pegawai.txt, pegawai2.txt pegawai3.txt, pegawai4.txt, pegawai5.txt</p>
    </main>
</body>
</html>

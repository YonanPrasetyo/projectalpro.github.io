<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <script src="https://kit.fontawesome.com/ac8548371f.js" crossorigin="anonymous"></script>
    <title>membuat database</title>
</head>
    <body>
    <aside>
     <center class="logo">
			<svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#179299}</style><path d="M312 32c-13.3 0-24 10.7-24 24s10.7 24 24 24h16c98.7 0 180.6 71.4 197 165.4c-9-3.5-18.8-5.4-29-5.4H431.8l-41.8-97.5c-3.4-7.9-10.8-13.4-19.3-14.4s-17 2.7-22.1 9.6l-40.9 55.5-21.7-50.7c-3.3-7.8-10.5-13.2-18.9-14.3s-16.7 2.3-22 8.9l-240 304c-8.2 10.4-6.4 25.5 4 33.7s25.5 6.4 33.7-4l79.4-100.5 43 16.4-40.5 55c-7.9 10.7-5.6 25.7 5.1 33.6s25.7 5.6 33.6-5.1L215.1 400h74.5l-29.3 42.3c-7.5 10.9-4.8 25.8 6.1 33.4s25.8 4.8 33.4-6.1L348 400h80.4l38.8 67.9c6.6 11.5 21.2 15.5 32.7 8.9s15.5-21.2 8.9-32.7L483.6 400H496c44.1 0 79.8-35.7 80-79.7c0-.1 0-.2 0-.3V280C576 143 465 32 328 32H312zm50.5 168l17.1 40H333l29.5-40zm-87.7 38.1l-1.4 1.9H225.1l32.7-41.5 16.9 39.5zM88.8 240C57.4 240 32 265.4 32 296.8c0 15.5 6.3 30 16.9 40.4L126.7 240H88.8zM496 288a16 16 0 1 1 0 32 16 16 0 1 1 0-32z"/></svg><span style="font-size:17px;position:relative;top: -9px"> Kecorp</span>
	  	</center>
     <div class="pilihan">
        <p><i class="fa-solid fa-house" style="color: teal;"></i><a href="halaman_utama.php"> halaman utama</a></p>
        <hr style="border-color: rgba(255, 255, 255 ,0.2);">
        <div class="selected">
          <p><i class="fa-solid fa-database"></i><a href="database.php">database</a></p>
        </div>
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
    <div class="kanan">
      <!-- menyediakan user untuk membuat database baru sesuai keiginan mereka -->
      <h1>Membuat Database Baru</h1><hr>
    <form method="post">
        <label for="database">Masukan Nama Database Baru</label><br>
        <input type="text" name="database" id="database" required><br>
        <button type="submit" value="submit" name="submit">Buat</button>
    </form><hr>
    <?php
    if(isset($_POST['submit'])){
      $database=$_POST['database'];

        /* jika nama file belum ada maka file berhasil dibuat */
        if (!file_exists($database.".txt")){
            $file=fopen($database.".txt","w");
            echo "<span class='merah'>berhasil membuat database baru</span><hr>";
            /* memasukan nama database ke dalam file database.txt (file yang berisi database yang pernah dibuat user) */
            $data=fopen("database.txt","a");
            fputs($data, $database."\n");
            fclose($data);
           }
           /* jika nama file sudah ada maka file gagal dibuat */
           else {
            echo "<span class='merah'>file sudah ada</span><hr>";
           }
    }
    ?>
    <!-- menyediakan pilihan bagi user untuk memilih database yang ingin mereka edit -->
    <form method="post">
      <label for="pilih">pilih database lain yang ingin anda edit</label><br>
      <select name="pilih" id="pilih">
        <?php
          $data=fopen("database.txt","r");
          $z=0;
          while (!feof($data)) {
          $arr[$z]=trim(fgets($data));
          $z++;
          }
          fclose($data);
          for ($i=0; $i <= count($arr)-2; $i++) { 
            echo "<option value='".$arr[$i]."'>".$arr[$i]."</option>";
          }
        ?>
      </select><br>
      <button name="memilih">pilih database</button>
    </form>
    <?php
    if(isset($_POST['memilih'])){
      $pilih=$_POST['pilih'];

      /* jika user sudah memilih, data nama database yang dipilih akan masuk ke dalam file databasepilihan.txt untuk diintegrasikan dengan file php lainnya */
      $data=fopen("databasepilihan.txt","w");
      fwrite($data,$pilih);
      fclose($data);
    }
    ?><hr>
    <!-- menunjukan database yang sedang dipilih -->
    <p>anda saat ini sedang memilih database <span class="merah">
      <?php
      $data=fopen("databasepilihan.txt","r");
      $database=trim(fgets($data));
      fclose($data);
      echo $database.".txt</span></p><hr>";

      $data=fopen("database.txt","r");
      $z=0;
      while (!feof($data)) {
          $arr[$z]=trim(fgets($data));
          $z++;
      }
      fclose($data);

      /* menunjukan jumlah database yang pernah dibuat */
      $jumlahdatabase=count($arr)-1;
      echo "jumlah database saat ini adalah ".$jumlahdatabase."<hr>";

      /* menunjukan seluruh database yang pernah dibuat oleh user */
      echo "Database yang tersedia saat ini adalah:<br>";
      for ($j=0; $j <= $jumlahdatabase-1; $j++) { 
        echo $j+1 .". ".$arr[$j]."<br>";
      }
      ?>
    
    </div>
</body>
</html>

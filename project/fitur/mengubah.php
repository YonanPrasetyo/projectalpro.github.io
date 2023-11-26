<!DOCTYPE html>
<html lang="en">
<head>
</head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <script src="https://kit.fontawesome.com/ac8548371f.js" crossorigin="anonymous"></script>
    <title>Mengubah Database</title>
</head>
<body>
<aside>
    <center class="logo">
	    <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#179299}</style><path d="M312 32c-13.3 0-24 10.7-24 24s10.7 24 24 24h16c98.7 0 180.6 71.4 197 165.4c-9-3.5-18.8-5.4-29-5.4H431.8l-41.8-97.5c-3.4-7.9-10.8-13.4-19.3-14.4s-17 2.7-22.1 9.6l-40.9 55.5-21.7-50.7c-3.3-7.8-10.5-13.2-18.9-14.3s-16.7 2.3-22 8.9l-240 304c-8.2 10.4-6.4 25.5 4 33.7s25.5 6.4 33.7-4l79.4-100.5 43 16.4-40.5 55c-7.9 10.7-5.6 25.7 5.1 33.6s25.7 5.6 33.6-5.1L215.1 400h74.5l-29.3 42.3c-7.5 10.9-4.8 25.8 6.1 33.4s25.8 4.8 33.4-6.1L348 400h80.4l38.8 67.9c6.6 11.5 21.2 15.5 32.7 8.9s15.5-21.2 8.9-32.7L483.6 400H496c44.1 0 79.8-35.7 80-79.7c0-.1 0-.2 0-.3V280C576 143 465 32 328 32H312zm50.5 168l17.1 40H333l29.5-40zm-87.7 38.1l-1.4 1.9H225.1l32.7-41.5 16.9 39.5zM88.8 240C57.4 240 32 265.4 32 296.8c0 15.5 6.3 30 16.9 40.4L126.7 240H88.8zM496 288a16 16 0 1 1 0 32 16 16 0 1 1 0-32z"/></svg><span style="font-size:17px;position:relative;top: -9px"> Kecorp</span>
    </center>
    <div class="pilihan">
     <p><i class="fa-solid fa-house" style="color: teal;"></i><a href="halaman_utama.php"> halaman utama</a></p>
     <hr style="border-color: rgba(255, 255, 255 ,0.2);">
     <p><i class="fa-solid fa-database"></i><a href="database.php">database</a></p>
     <p><i class="fa-regular fa-square-plus"></i><a href="menambah.php">menambah</a></p>
     <div class="selected">
         <p><i class="fa-solid fa-clock-rotate-left"></i><a href="mengubah.php">mengubah</a></p>
     </div>
     <p><i class="fa-solid fa-delete-left"></i><a href="menghapus.php">menghapus</a></p>
     <p><i class="fa-solid fa-magnifying-glass"></i><a href="mencari.php">mencari</a></p>
     <p><i class="fa-regular fa-eye"></i><a href="tampilkan.php">tampilkan</a></p>
     <p><i class="fa-solid fa-sack-dollar"></i><a href="gaji.php">gaji</a></p>
	 <hr style="border-color:rgba(255,255,255,0.2">
	 <p><i class="fa-solid fa-arrow-right-from-bracket" style="color: #ff5252;"></i><a href="../index.php"> Log Out</a></p>
  </div>
    </aside>
    <div class="kanan">
        <h1>Mengubah Data Karyawan</h1><hr>
        <p>anda saat ini akan mengubah data pada database <span class="merah">
        <?php
        $data=fopen("databasepilihan.txt","r");
        $database=trim(fgets($data));
        fclose($data);
        echo $database;
        ?>
        .txt</span></p><hr>
    <form method="post">
        <label for="diganti">masukan NIK data yang akan diganti</label><br>
        <input type="number" name="diganti" id="diganti"><br>
        <button name="mengganti">Cari</button>
				
    </form>
    <?php
    $database=fopen("databasepilihan.txt","r");
    $databasepilihan=trim(fgets($database));
    fclose($database);

    $file=fopen($databasepilihan.".txt","r");
    
    $z=0;
    while (!feof($file)) {
        $arr[$z]=trim(fgets($file));
        $z++;
    }
    
    /* memecah array agar nik, nama, alamat, dll memiliki variabel array masing-masing */
    $i=0;
    for ($j=0; $j < count($arr)-1; $j++) { 
        if ($j % 9 == 0) {
         $nikArr[$j/9]=$arr[$j];
        }
        elseif ($j % 9 == 1) {
         $namaArr[($j-1)/9]=$arr[$j];
        }
        elseif ($j % 9 == 2) {
         $alamatArr[($j-2)/9]=$arr[$j];
        }
        elseif ($j % 9 == 3) {
         $unitArr[($j-3)/9]=$arr[$j];
        }
        elseif ($j % 9 == 4) {
         $golonganArr[($j-4)/9]=$arr[$j];
        }
        elseif ($j % 9 == 5) {
         $anakArr[($j-5)/9]=$arr[$j];
        }
        elseif ($j % 9 == 6) {
         $hariArr[($j-6)/9]=$arr[$j];
        }
        elseif ($j % 9 == 7) {
         $jam_kerjaArr[($j-7)/9]=$arr[$j];
        }
       }
    
    fclose($file);
        if(isset($_POST['mengganti'])){
            $nikdiganti=$_POST['diganti'];

            /* mencari apakah nik yang dimasukan user terdapat dalam database */
            $verif=false;
            for ($i=0; $i <= count($nikArr)-1; $i++) { 
                /* jika terdapat nik database maka akan menampilkan form untuk pergantian data */
                if ($nikdiganti==$nikArr[$i]) {
                    echo "<hr><form method='post'>";
                    echo "<table>";
                        echo "<tr>";
                            echo "<td>NIK</td>";
                            echo "<td>:</td>";
                            echo "<td>".$nikArr[$i]."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Masukan NIK Baru</td>";
                            echo "<td>:</td>";
                            echo "<td><input type='number' name='nik' value='".$nikArr[$i]."' required></td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Nama</td>";
                            echo "<td>:</td>";
                            echo "<td>".$namaArr[$i]."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Masukan Nama Baru</td>";
                            echo "<td>:</td>";
                            echo "<td><input type='text' name='nama' value='".$namaArr[$i]."' required></td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Alamat</td>";
                            echo "<td>:</td>";
                            echo "<td>".$alamatArr[$i]."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Masukan Alamat Baru</td>";
                            echo "<td>:</td>";
                            echo "<td><input type='text' name='alamat' value='".$alamatArr[$i]."' required></td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Unit</td>";
                            echo "<td>:</td>";
                            echo "<td>".$unitArr[$i]."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Masukan Unit Baru</td>";
                            echo "<td>:</td>";
                            echo "<td><input type='text' name='unit' value='".$unitArr[$i]."' required></td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Golongan</td>";
                            echo "<td>:</td>";
                            echo "<td>".$golonganArr[$i]."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Masukan Golongan Baru</td>";
                            echo "<td>:</td>";
                            echo "<td><select name='golongan' id='golongan'>
                            <option value='IV-A'".($golonganArr[$i] == 'IV-A' ? ' selected' : '').">IV-A</option>
                            <option value='IV-B'".($golonganArr[$i] == 'IV-B' ? ' selected' : '').">IV-B</option>
                            <option value='IV-C'".($golonganArr[$i] == 'IV-C' ? ' selected' : '').">IV-C</option>
                            <option value='III-A'".($golonganArr[$i] == 'III-A' ? ' selected' : '').">III-A</option>
                            <option value='III-B'".($golonganArr[$i] == 'III-B' ? ' selected' : '').">III-B</option>
                            <option value='III-C'".($golonganArr[$i] == 'III-C' ? ' selected' : '').">III-C</option>
                        </select></td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Jumlah Anak</td>";
                            echo "<td>:</td>";
                            echo "<td>".$anakArr[$i]."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Masukan Jumlah Anak Baru</td>";
                            echo "<td>:</td>";
                            echo "<td><input type='number' name='anak' value='".$anakArr[$i]."' required min='0'></td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Masuk(Hari)/Bulan</td>";
                            echo "<td>:</td>";
                            echo "<td>".$hariArr[$i]."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Masukan Masuk(Hari)/Bulan Baru</td>";
                            echo "<td>:</td>";
                            echo "<td><input type='number' name='hari' value='".$hariArr[$i]."' required min='0' max='24'></td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Jam Kerja/Bulan</td>";
                            echo "<td>:</td>";
                            echo "<td>".$jam_kerjaArr[$i]."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Masukan Jam Kerja/Bulan Baru</td>";
                            echo "<td>:</td>";
                            echo "<td><input type='number' name='jam_kerja' value='".$jam_kerjaArr[$i]."' required min='0' max='200'></td>";
                        echo "</tr>";
                        echo "<input type='number' name='i' value='".$i."' class='hilangkan'>";
                        echo "<tr>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td><button name='rubah'>Rubah</button></td>";
                        echo "</tr>";
                    echo "</table>";
                    echo "</form>";
                    $verif=true;
                    break;
                }
            }
            /* proses jika nik yang dimasukan user tidak ditemukan maka */
            if ($verif==false) {
                echo "<hr>data dengan NIK ".$nikdiganti." tidak ditemukan";
            }
                
        }
        if(isset($_POST['rubah'])){
            $i=$_POST['i'];
            $nik=$_POST['nik'];

            $verif=false;
        for ($k=0; $k < count($nikArr); $k++) { 
            /* diproses jika nik nya tidak mengalami perubahan */
            if ($nikArr[$i]==$_POST['nik']) {
                $nikArr[$i]=$_POST['nik'];
                $namaArr[$i]=$_POST['nama'];
                $alamatArr[$i]=$_POST['alamat'];
                $unitArr[$i]=$_POST['unit'];
                $golonganArr[$i]=$_POST['golongan'];
                $anakArr[$i]=$_POST['anak'];
                $hariArr[$i]=$_POST['hari'];
                $jam_kerjaArr[$i]=$_POST['jam_kerja'];
                
                $file=fopen($databasepilihan.".txt","w");

                for ($j=0; $j <= count($nikArr)-1; $j++) { 
                    fputs($file, $nikArr[$j]."\n");
                    fputs($file, $namaArr[$j]."\n");
                    fputs($file, $alamatArr[$j]."\n");
                    fputs($file, $unitArr[$j]."\n");
                    fputs($file, $golonganArr[$j]."\n");
                    fputs($file, $anakArr[$j]."\n");
                    fputs($file, $hariArr[$j]."\n");
                    fputs($file, $jam_kerjaArr[$j]."\n");
                    fwrite($file, "----------\n");
                }

                echo "<hr>Data Berhasil Dirubah 1";

                fclose($file);
                $verif=true;
                break;
            }
            /* diproses jika nik baru memiliki persamaan dengan data yang lain untuk mengatisipasi nik yang serupa */
            elseif ($nik==$nikArr[$k]) {
                echo "<hr><p>NIK sudah pernah dipakai<br>";
                echo "silakan pilih NIK lainnya</p>";
                $verif=true;
                break;
            }
        }
        
            /* diproses jika niknya berubah dan tidak memiliki persamaan dengan nik data lainnya */
          if ($verif==false) {   
            $nikArr[$i]=$_POST['nik'];
            $namaArr[$i]=$_POST['nama'];
            $alamatArr[$i]=$_POST['alamat'];
            $unitArr[$i]=$_POST['unit'];
            $golonganArr[$i]=$_POST['golongan'];
            $anakArr[$i]=$_POST['anak'];
            $hariArr[$i]=$_POST['hari'];
            $jam_kerjaArr[$i]=$_POST['jam_kerja'];
            
            $file=fopen($databasepilihan.".txt","w");

            for ($j=0; $j <= count($nikArr)-1; $j++) { 
                fputs($file, $nikArr[$j]."\n");
                fputs($file, $namaArr[$j]."\n");
                fputs($file, $alamatArr[$j]."\n");
                fputs($file, $unitArr[$j]."\n");
                fputs($file, $golonganArr[$j]."\n");
                fputs($file, $anakArr[$j]."\n");
                fputs($file, $hariArr[$j]."\n");
                fputs($file, $jam_kerjaArr[$j]."\n");
                fwrite($file, "----------\n");
            }

            echo "<hr>Data Berhasil Dirubah";

            fclose($file);
          }

        }
        ?>
    </div>
</body>
</html>

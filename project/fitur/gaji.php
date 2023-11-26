<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ac8548371f.js" crossorigin="anonymous"></script>
    <title>Menghapus Data</title>
    <link rel="stylesheet" href="home.css">
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
     <p><i class="fa-solid fa-clock-rotate-left"></i><a href="mengubah.php">mengubah</a></p>
     <p><i class="fa-solid fa-delete-left"></i><a href="menghapus.php">menghapus</a></p>
     <p><i class="fa-solid fa-magnifying-glass"></i><a href="mencari.php">mencari</a></p>
     <p><i class="fa-regular fa-eye"></i><a href="tampilkan.php">tampilkan</a></p>
     <div class="selected">
         <p><i class="fa-solid fa-sack-dollar"></i><a href="gaji.php">gaji</a></p>
     </div>
	 <hr style="border-color:rgba(255,255,255,0.2);">
	 <p><i class="fa-solid fa-arrow-right-from-bracket" style="color: #ff5252;"></i><a href="../index.php"> Log Out</a></p>
</div>
</aside>
<div class="kanan">
        <h1>Gaji Karyawan</h1><hr>
        <p>anda saat ini akan melihat data gaji karyawan dari database <span class="merah">
          <?php
          $data=fopen("databasepilihan.txt","r");
          $database=trim(fgets($data));
          fclose($data);
          echo $database;
          ?>
        .txt</span></p><hr>
    <form method="post">
        <label for="gaji">masukan NIK Karyawan yang ingin anda lihat gajinya</label><br>
        <input type="number" name="gaji" id="gaji" required><br>

        <button name="lihat">Lihat</button>
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

    if(isset($_POST['lihat'])){
        $nikdihapus=$_POST['gaji'];

        $verif=false;
        for ($i=0; $i <= count($nikArr)-1; $i++) { 
            if ($nikdihapus==$nikArr[$i]) {
                
                $golonganHitung=$golonganArr[$i];
                $jam_kerjaHitung=$jam_kerjaArr[$i];
                $anakHitung=$anakArr[$i];
                $hariHitung=$hariArr[$i];

                /* fungsi untuk menghitung gaji pokok */
                function menghitung_gaji_pokok($golonganHitung){
                    if ($golonganHitung=="IV-A") {
                        $gaji_pokok = 3250000;
                    }
                    elseif ($golonganHitung=="IV-B") {
                        $gaji_pokok = 3000000;
                    }
                    elseif ($golonganHitung=="IV-C") {
                        $gaji_pokok = 2750000;
                    }
                    elseif ($golonganHitung=="III-A") {
                        $gaji_pokok = 2500000;
                    }
                    elseif ($golonganHitung=="III-B") {
                        $gaji_pokok = 2250000;
                    }
                    elseif ($golonganHitung=="III-C") {
                        $gaji_pokok = 2000000;
                    }

                    return $gaji_pokok;
                }

                /* fungsi untuk menghitung gaji lembur */
                function menghitung_gaji_lembur($jam_kerjaHitung){
                    if ($jam_kerjaHitung<=160) {
                        $gaji_lembur=0;
                    }
                    else {
                        $gaji_lembur=35000*($jam_kerjaHitung-160);
                    }

                    return $gaji_lembur;
                }

                /* fungsi untuk menghitung tunjangan anak */
                function menghitung_tunjangan_anak($anakHitung){
                    if ($anakHitung<=0) {
                        $tunjanggan_anak=0;
                    }
                    elseif ($anakHitung<=2) {
                        $tunjanggan_anak=250000*$anakHitung;
                    }
                    else {
                        $tunjanggan_anak=500000;
                    }

                    return $tunjanggan_anak;
                }

                /* fungsi untuk menghitung uang makan */
                function menghitung_uang_makan($hariHitung){
                    $uang_makan=25000*$hariHitung;

                    return $uang_makan;
                }

                $gaji_pokok=menghitung_gaji_pokok($golonganHitung);
                $gaji_lembur=menghitung_gaji_lembur($jam_kerjaHitung);
                $tunjanggan_anak=menghitung_tunjangan_anak($anakHitung);
                $uang_makan=menghitung_uang_makan($hariHitung);

                /* menghitung seluruh total gaji */
                $gaji=$gaji_pokok+$gaji_lembur+$tunjanggan_anak+$uang_makan;

                echo "<hr><table>";
                        echo "<tr>";
                            echo "<td>NIK</td>";
                            echo "<td>:</td>";
                            echo "<td>".$nikArr[$i]."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Nama</td>";
                            echo "<td>:</td>";
                            echo "<td>".$namaArr[$i]."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Alamat</td>";
                            echo "<td>:</td>";
                            echo "<td>".$alamatArr[$i]."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Unit</td>";
                            echo "<td>:</td>";
                            echo "<td>".$unitArr[$i]."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Golongan</td>";
                            echo "<td>:</td>";
                            echo "<td>".$golonganArr[$i]."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Jumlah Anak</td>";
                            echo "<td>:</td>";
                            echo "<td>".$anakArr[$i]."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Masuk(Hari)/Bulan</td>";
                            echo "<td>:</td>";
                            echo "<td>".$hariArr[$i]." hari</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Jam Kerja/Bulan</td>";
                            echo "<td>:</td>";
                            echo "<td>".$jam_kerjaArr[$i]." jam</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Gaji Pokok</td>";
                            echo "<td>:</td>";
                            echo "<td>Rp. ".$gaji_pokok."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Gaji Lembur</td>";
                            echo "<td>:</td>";
                            echo "<td>Rp. ".$gaji_lembur."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Tunjangan Anak</td>";
                            echo "<td>:</td>";
                            echo "<td>Rp. ".$tunjanggan_anak."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Uang Makan</td>";
                            echo "<td>:</td>";
                            echo "<td>Rp. ".$uang_makan."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Total Gaji</td>";
                            echo "<td>:</td>";
                            echo "<td>Rp. ".$gaji."</td>";
                        echo "</tr>";
                    echo "</table>";

                $verif=true;
                break;
            }
        }
        if ($verif==false) {
            echo "<hr>data dengan NIK ".$nikdihapus." tidak ditemukan";
        }
    }
    ?>
</div>
</body>
</html>

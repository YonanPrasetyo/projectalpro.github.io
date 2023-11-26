<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>APLIKASI GAJI KARYAWAN</h1>
    <div class="container">
        <h2>Login</h2>
        <div class="signUp">
             <p class="tanda">Login</p>
             <p class="insignup"><a href="daftar.php">Daftar</a></p>
        </div>
        <div class="form">
            <form method="post">
                <label for="username" class="labeluser">Username :</label><br>
                <input type="text" name="username" class="namauser" required autocomplete="off"><br><br>
                <label class="labelpassword" for="password">Password :</label><br>
                <input type="password" name="password" required autocomplete="off"><br>
                
                <button name="login">Login</button>
            </form>
						<svg xmlns="http://www.w3.org/2000/svg" height="100%" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#179299}</style><path d="M312 32c-13.3 0-24 10.7-24 24s10.7 24 24 24h16c98.7 0 180.6 71.4 197 165.4c-9-3.5-18.8-5.4-29-5.4H431.8l-41.8-97.5c-3.4-7.9-10.8-13.4-19.3-14.4s-17 2.7-22.1 9.6l-40.9 55.5-21.7-50.7c-3.3-7.8-10.5-13.2-18.9-14.3s-16.7 2.3-22 8.9l-240 304c-8.2 10.4-6.4 25.5 4 33.7s25.5 6.4 33.7-4l79.4-100.5 43 16.4-40.5 55c-7.9 10.7-5.6 25.7 5.1 33.6s25.7 5.6 33.6-5.1L215.1 400h74.5l-29.3 42.3c-7.5 10.9-4.8 25.8 6.1 33.4s25.8 4.8 33.4-6.1L348 400h80.4l38.8 67.9c6.6 11.5 21.2 15.5 32.7 8.9s15.5-21.2 8.9-32.7L483.6 400H496c44.1 0 79.8-35.7 80-79.7c0-.1 0-.2 0-.3V280C576 143 465 32 328 32H312zm50.5 168l17.1 40H333l29.5-40zm-87.7 38.1l-1.4 1.9H225.1l32.7-41.5 16.9 39.5zM88.8 240C57.4 240 32 265.4 32 296.8c0 15.5 6.3 30 16.9 40.4L126.7 240H88.8zM496 288a16 16 0 1 1 0 32 16 16 0 1 1 0-32z"/></svg>
        </div>
        <?php
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
           
            /* membuka file pengguna.txt */
            $file = fopen("pengguna.txt","r");
           
            /* menjadikan data di file pengguna.txt menjadi array */
            $i=0;
            while (!feof($file)) {
             $arr[$i]=trim(fgets($file));
             $i++;
            }
        
            fclose($file);

            /* memecah array nama dan password agar memiliki variable array masing-masing namun memiliki index yang sama pada setiap data */
            for ($j=0; $j < count($arr)-1; $j++) { 
             if ($j % 3 == 0) {
              $usernameArr[$j/3]=$arr[$j];
             }
             elseif ($j % 3 == 1) {
              $passwordArr[($j-1)/3]=$arr[$j];
             }
            }

            /* mengecek apakah data yang dimasukan user sudah benar atau belum */
            $verif=false;
            for ($k=0; $k < count($usernameArr); $k++) { 
                /* jika sudah benar akan masuk ke dalam halaman_utama.php */
             if ($username==$usernameArr[$k] && $password==$passwordArr[$k]) {
                header("Location: fitur/halaman_utama.php");
                $verif=true;

                /* data username dimasukan ke dalam file user.txt agar ussername dapat muncul di halaman utama */
                $user = fopen("fitur/user.txt","w");
                fputs($user, $username);
                fclose($user);
              break;
             }
            }

            /* jika salah maka akan ditampilkan bahwa ussername atau passwordnya salah */
            if ($verif==false) {
             echo "<p class='info'>username atau password anda salah<br>";
             echo "silakan ulangi lagi</p>";
            }
        }
        ?>
    </div>
</body>
</html>

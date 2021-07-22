<?php 

    require 'fungsi.php'; 

    if ( isset($_POST["submit"])) {
        
        if ( tambah2 ($_POST) > 0) {
            echo "
                <script>
                    alert('data berhasil ditambahakan!');
                    document.location.href ='jabatan.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('data gagal ditambahakan!');
                    document.location.href ='index2.php';
                </script>
            ";
        }

    }

 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>FORMULIR PENDAFTARAN</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    </head>
    <body>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #e3f2fd;">
            <a class="navbar-brand" href="#" style="margin-right: 110px; font-size: 15px; font-family: sans-serif; margin-left: 20px;"><h1>Rekam Data Kepegawaian</h1></a>
              <div class="collapse navbar-collapse" id="navbarNavDropdown" >
                <ul class="navbar-nav">
                  <li class="nav-item" style="margin-right: 30px;">
                    <a class="nav-link btn-dark" href="dashbord.php"style="color: white;">Dashboard</a>
                  </li>
                  <div class="dropdown" style="margin-right: 30px;">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            KARYAWAN
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="index1.php">Tambah karyawan</a></li>
                            <li><a class="dropdown-item" href="karyawan.php">data karyawan</a></li>
                        </ul>
                    </div>
                  <div class="dropdown" style="margin-right: 30px;" >
                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            JABATAN
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="index2.php">tambah jabatan</a></li>
                            <li><a class="dropdown-item" href="jabatan.php">Data Jabatan</a></li>
                        </ul>
                    </div>  
                    <div class="dropdown" style="margin-right: 30px;">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            GOLONGAN
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="index3.php">Tambah golongan</a></li>
                            <li><a class="dropdown-item" href="golongan.php">data golongan</a></li>
                        </ul>
                    </div> 
                    <div class="dropdown" style="margin-right: 30px;">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            GAJI POKOK
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="index4.php">Tambah gapok</a></li>
                            <li><a class="dropdown-item" href="gopak.php">data gapok</a></li>
                        </ul>
                    </div>
                  <li class="nav-item" style="margin-right: 30px;">
                    <a class="nav-link btn-danger" href="logout.php"style="color: white;">LogOut</a>
                  </li>
                </ul>
              </div>
        </nav>
        <br><br>
        <!-- form input -->
        <form action="" method="POST" autocomplete="off">
            <div style="margin-left: 25px; margin-right: 25px; margin-top: 30px;" ><br><br>
                <!-- kode jurusan -->
                <div>
                    <label for="kd_jabatan" class="form-label">kode jabatan :</label>
                    <input type="text" name="kd_jabatan" id="kd_jabatan" class="form-control" placeholder="kode jabatan" required>
                </div>
                <br>
                <!-- nama_jabatan  -->
                <div>
                    <label for="nama_jabatan" class="form-label">nama jabatan :</label>
                    <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" placeholder="nama_jabatan">
                </div>
                <br>
                 <!-- Tunjangan  -->
                <div>
                    <label for="tunjangan_jabatan" class="form-label">Tunjangan :</label>
                    <input type="text" name="tunjangan_jabatan" id="tunjangan_jabatan" class="form-control" placeholder="tunjangan">
                </div>
                <br>
                <!-- submit -->
                <div class="col-12" >
                    <a href="">
                        <button type="submit" name="submit" onclick="return confirm('apakah data anda sudah Lengkap?')" class="btn btn-dark btn-lg btn-block">Tambah Data!</button>
                    </a>
                </div>
            </div>
        </form>
        <footer class="site-footer fixed-bottom" >
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12" style="background-color: #e3f2fd;">
            <div class="border-top pt-3" >
              <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> | Dzaky Abiyyu Thariq &nbsp<i class="icon-heart text-danger" aria-hidden="true">uas-genap-2021</i> 
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        
            </div>
          </div>
          
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>
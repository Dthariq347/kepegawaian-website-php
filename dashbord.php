<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}

require "fungsi.php";
     
?>

<!DOCTYPE html>
<html>
    <head>
        <title>result data</title>
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
        <!-- keluaran hasil dari index1.php -->
        <table class="table table-striped table-bordered table-hover table-dark" style="margin-top: 10px" >
            <br><br>
            <form action="dashbord.php" method="get">
            
                <input type="text" class="" name="keyword" size="30px" autofocus placeholder="cari data Kepegawaian..." autocomplete="off" style="margin-right: 10px; margin-left: 10px">
                <button type="submit" class="btn btn-primary" name="cari"> Cari!! </button>

            </form>
            <thead>
                <tr>
                    <th>No</th>
                    <th>nip</th>
                    <th>nama</th>
                    <th>alamat</th>
                    <th>kota</th>
                    <th>jenis kelamin</th>
                    <th>nama jabatan</th>
                    <th>golongan</th>
                    <th>total tunjangan</th>
                    <th>gaji pokok</th>
                    <th>gaji keseluruhan</th>
                </tr>
            </thead>  
            <tbody>
                <?php 
                    $no = 1;
                    $query = "SELECT * FROM karyawan 
                        INNER JOIN jabatan ON karyawan.kd_jabatan = jabatan.kd_jabatan
                        INNER JOIN golongan ON karyawan.gol = golongan.gol
                        INNER JOIN gopak ON golongan.gol = gopak.gol AND jabatan.kd_jabatan = gopak.kd_jabatan
                    ";
                    
                    $sql_kn = mysqli_query($conn, $query) or die (mysqli_error($conn));
                    while ($data = mysqli_fetch_array($sql_kn)) { ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data ['nip']; ?></td>
                        <td><?php echo $data ['nama']; ?></td>
                        <td><?php echo $data ['alamat']; ?></td>
                        <td><?php echo $data ['kota']; ?></td>
                        <td><?php echo $data ['jk']; ?></td>
                        <td><?php echo $data["nama_jabatan"];?></td>
                        <td><?php echo $data ['gol']; ?></td>
                        <td><?php echo $data["tj_keluarga"] + $data["tj_transportasi"] + $data["tj_makan"] + $data["tunjangan_jabatan"]; ?></td> 
                        <td><?php echo $data["gaji_pokok"];?></td>
                        <td><?php echo $data["tj_keluarga"] + $data["tj_transportasi"] + $data["tj_makan"] + $data["tunjangan_jabatan"] + $data["gaji_pokok"]; ?></td> 
                    </tr>

                <?php } ?>
            </tbody>
        </table>

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
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>
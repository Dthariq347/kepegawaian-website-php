<?php 
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}
    require 'fungsi.php';

    //ambil data url 
    $kd_jabatan = $_GET["kd_jabatan"];
    $gol = $_GET["gol"];
    //query data 
    $barang = query("SELECT * FROM gopak WHERE kd_jabatan = '$kd_jabatan' and gol = '$gol' ")[0];


    if ( isset($_POST["submit"])) {
        
        if ( edit4 ($_POST) > 0) {
            echo "
                <script>
                    alert('data berhasil di ubah!');
                    document.location.href ='gopak.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('data gagal di ubah!');
                    document.location.href ='edit4.php';
                </script>
            ";
        }
    }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>tambah data kendaraan</title>
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
        <!-- form edit -->
        <form action="" method="POST" autocomplete="off">
            <div style="margin-left: 25px; margin-right: 25px; margin-top: 30px;" >
                <!-- id -->
                <div>
                    <input type="hidden" name="id" value=" <?php echo $barang['id']; ?>">
                </div>
                <!-- kode jabatan -->
                <div>
                    <label for="kd_jabatan" class="form-label">Kode Jabatan</label>
                    <select name="kd_jabatan" id="kd_jabatan" value ="<?php echo $barang["kd_jabatan"]; ?>" class="form-select" aria-label="Default select example" >
                    <!-- relasi kode jurusan -->
                    <?php
                        global $conn;
                    $sql = "SELECT * FROM jabatan";
                    $query = mysqli_query($conn, $sql);
                     while($data = mysqli_fetch_array($query)){
                    ?>
                     <option value='<?php echo $data['kd_jabatan']; ?>' > <?php echo
                    $data['nama_jabatan']; ?></option>
                    <?php
                    }
                     ?>

                    </select>
                </div>
                <br>
                <!-- golongan -->
                <div>
                    <label for="gol" class="form-label">Kode Jabatan</label>
                    <select name="gol" id="gol" value ="<?php echo $barang["gol"]; ?>" class="form-select" aria-label="Default select example" >
                    <!-- relasi kode jurusan -->
                    <?php
                        global $conn;
                    $sql = "SELECT * FROM golongan";
                    $query = mysqli_query($conn, $sql);
                     while($data = mysqli_fetch_array($query)){
                    ?>
                     <option value='<?php echo $data['gol']; ?>' > <?php echo
                    $data['gol']; ?></option>
                    <?php
                    }
                     ?>

                    </select>
                </div>
                <br>
                <!-- Tunjangan Keluarga -->
                <div>
                    <label for="gaji_pokok" class="form-label">Tunjangan Keluarga :</label>
                    <input type="text" name="gaji_pokok" id="gaji_pokok" class="form-control" placeholder="Tunjangan Keluarga" value="<?php echo $barang['gaji_pokok']; ?>">
                </div>
                <br>
                <!-- submit -->
                <div class="col-12" >
                    <a href="">
                        <button type="submit" name="submit" onclick="return confirm('apakah Update barang anda sudah Lengkap?')" class="btn btn-dark btn-lg btn-block">Update gaji pokok!</button>
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
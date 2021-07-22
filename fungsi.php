<?php 
// koneksi database
    $conn = mysqli_connect("localhost", "root", "", "db_uas_thariq");

// function querynya
    function query($query) {
        global $conn;
    $form = mysqli_query($conn, $query);
    $tambah = [];
    //mengambil hasil data 
    while($formulir = mysqli_fetch_assoc($form)){
        $tambah[] = $formulir;
    }
    return $tambah;
}

// tambah karyawan
    function tambah1 ($data) {

    global $conn;

    $nip = ($data["nip"]);
    $nama = ($data["nama"]);
    $alamat = ($data["alamat"]);
    $kota = ($data["kota"]);
    $jk = ($data["jk"]);
    $kd_jabatan = ($data["kd_jabatan"]);
    $gol = ($data["gol"]);
 
    $query = "INSERT INTO karyawan
                         VALUES
                   ('$nip','$nama','$alamat','$kota','$jk','$kd_jabatan','$gol')
                ";

    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);

          
    }

// hapus karyawan
    function hapus1 ($nip) {
        global $conn;
        mysqli_query($conn, "DELETE FROM karyawan WHERE nip = '$nip' " );
        return mysqli_affected_rows($conn);
    }
// edit karyawan

 function edit1 ($data) {

        global $conn;

        $nip = htmlspecialchars ($data["nip"]);
        $nama = htmlspecialchars ($data["nama"]);
        $alamat = htmlspecialchars ($data["alamat"]);       
        $kota = htmlspecialchars ($data["kota"]);  
        $jk = htmlspecialchars ($data["jk"]); 
        $kd_jabatan = htmlspecialchars ($data["kd_jabatan"]); 
        $gol = htmlspecialchars ($data["gol"]);    

        $query = "UPDATE karyawan SET
                    nip = '$nip',
                    nama = '$nama',
                    alamat = '$alamat', 
                    kota = '$kota',
                    jk = '$jk',
                    kd_jabatan = '$kd_jabatan',
                    gol = '$gol'

                    WHERE nip = $nip

                    ";

        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    
}

    

// tambah jabatan
    function tambah2 ($data) {

    global $conn;

    $kd_jabatan = ($data["kd_jabatan"]);
    $nama_jabatan = ($data["nama_jabatan"]);
    $tunjangan_jabatan = ($data["tunjangan_jabatan"]);
 
    $query = "INSERT INTO jabatan
                         VALUES
                   ('$kd_jabatan','$nama_jabatan','$tunjangan_jabatan')
                ";

    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
    }

// hapus jabatan
    function hapus2 ($kd_jabatan) {
        global $conn;
        mysqli_query($conn, "DELETE FROM jabatan WHERE kd_jabatan = $kd_jabatan " );
        return mysqli_affected_rows($conn);
    }
// edit jabatan
function edit2 ($data) {

        global $conn;

        $kd_jabatan = htmlspecialchars ($data["kd_jabatan"]);
        $nama_jabatan = htmlspecialchars ($data["nama_jabatan"]);
        $tunjangan_jabatan = htmlspecialchars ($data["tunjangan_jabatan"]);   

        $query = "UPDATE jabatan SET
                    kd_jabatan = '$kd_jabatan',
                    nama_jabatan = '$nama_jabatan',
                    tunjangan_jabatan = '$tunjangan_jabatan'

                    WHERE kd_jabatan = '$kd_jabatan'

                    ";

        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    
}

// tambah golongan
 function tambah3 ($data) {

    global $conn;

    $gol = ($data["gol"]);
    $tj_keluarga = ($data["tj_keluarga"]);
    $tj_transportasi = ($data["tj_transportasi"]);
    $tj_makan = ($data["tj_makan"]);
    $query = "INSERT INTO golongan
                         VALUES
                   ('$gol','$tj_keluarga','$tj_transportasi','$tj_makan')
                ";

    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
    }

// hapus golongan
    function hapus3 ($gol) {
        global $conn;
        mysqli_query($conn, "DELETE FROM golongan WHERE gol = '$gol' " );
        return mysqli_affected_rows($conn);
    }


function edit3 ($data) {

        global $conn;

        $gol = htmlspecialchars ($data["gol"]);
        $tj_keluarga = htmlspecialchars ($data["tj_keluarga"]);
        $tj_transportasi = htmlspecialchars ($data["tj_transportasi"]);       
        $tj_makan = htmlspecialchars ($data["tj_makan"]);     

        $query = "UPDATE golongan SET
                    gol = '$gol',
                    tj_keluarga = '$tj_keluarga',
                    tj_transportasi = '$tj_transportasi', 
                    tj_makan = '$tj_makan'
                    WHERE gol = '$gol'

                    ";

        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    
}

// tambah gopak

    function tambah4 ($data) {

    global $conn;
    
    $kd_jabatan = ($data["kd_jabatan"]);
    $gol = ($data["gol"]);
    $gaji_pokok = ($data["gaji_pokok"]);
 
    $query = "INSERT INTO gopak
                         VALUES
                   ('$kd_jabatan','$gol','$gaji_pokok')
                ";

    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
    }
// hapus gopak
function hapus4 ($kd_jabatan, $gol) {
        global $conn;
        mysqli_query($conn, "DELETE FROM gopak WHERE kd_jabatan = '$kd_jabatan' and gol = '$gol' " );
        return mysqli_affected_rows($conn);
    }

function edit4 ($data) {

        global $conn;

        $kd_jabatan = htmlspecialchars ($data["kd_jabatan"]);
        $gol = htmlspecialchars ($data["gol"]);
        $gaji_pokok = htmlspecialchars ($data["gaji_pokok"]);    

        $query = "UPDATE gopak SET
                    kd_jabatan = '$kd_jabatan',
                    gol = '$gol',
                    gaji_pokok = '$gaji_pokok'

                    WHERE  kd_jabatan= '$kd_jabatan' and gol = '$gol'

                    ";

        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    
}

    function registrasi ($data){
        global $conn;

        $username = strtolower(stripcslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);

        // cek username yang sudah ada atau belum 
        $register = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");

        if (mysqli_fetch_assoc($register)) {
            echo "  <script>
                        alert('username yang anda masukan sudah ada !')
                    </script>";
            return false;
        }

        // untuk konfirmasi password
        if( $password !== $password2) {
            echo "  <script> 
                        alert('konfirmasi password tidak sesuai!');
                    </script>";
                return false;
        }

        // enkripsi password 
        $password = password_hash($password, PASSWORD_DEFAULT);


        // menambhkan user baru ke db

        mysqli_query($conn, "INSERT INTO user VALUES ('','$username','$password')");

        return mysqli_affected_rows($conn);


    }
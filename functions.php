<?php 
// koneksi ke database
$db = mysqli_connect("localhost", "root", "","disarpuskkr");
 

function query($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}
function tambahUu(){
    global $db;
    // ambil data dari tiap element dalam form
    $namaFile = htmlspecialchars($data["namafile"]);
    $undang = htmlspecialchars($data["undang"]);

    // upload file
    $file = upload();
    if (!$file) {
        return false;

    }

    // query insert data
    $query = "INSERT INTO data_file VALUES
    ('','$namaFile', '$undang')";
    mysqli_query($db,$query);

    return mysqli_affected_rows($db);

}

function tambah($data) {
    global $db;
    // ambil data dari tiap element dalam form
    $perusahaan = htmlspecialchars($data["perusahaan"]);
    $merek = htmlspecialchars($data["merek"]);
    $speed = htmlspecialchars($data["speed"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $harga = htmlspecialchars($data["harga"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    
    // query insert data
    $query = "INSERT INTO data_mobil VALUES 
    ('','$perusahaan','$merek', '$speed','$tahun','$harga','$gambar')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if( $error === 4 ) {
        echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower (end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>
        alert('yang anda upload bukan gambar!');
        </script>";
        return false;
    }

    // cek jika ukuran gambar terlalu besar
    if ($ukuranFile > 5000000) {
        echo "<script>
        alert('ukuran gambar terlalu besar!');
        </script>";
        return false;
    } 

    // lolos pengecekan, ga,bar siap diupload
    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/'.$namaFileBaru );
    return $namaFileBaru;

}


function hapus($id) {
    global $db;
    mysqli_query($db, "DELETE FROM data_mobil WHERE id = $id");

    return mysqli_affected_rows($db);
}

function boked($data) {
    global $db;

    $id = $data["id"];
    $perusahaan = htmlspecialchars($data["perusahaan"]);
    $merek = htmlspecialchars($data["merek"]);
    $speed = htmlspecialchars($data["speed"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $harga = htmlspecialchars($data["harga"]);

    $query = "UPDATE data_mobil SET  
            perusahaan = '$perusahaan',
            merek = '$merek', 
            speed = '$speed',
            tahun = '$tahun',
            harga = '$harga'
        WHERE id = $id
    ";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


function ubah($data) {
    global $db;

    $id = $data["id"];
    $perusahaan = htmlspecialchars($data["perusahaan"]);
    $merek = htmlspecialchars($data["merek"]);
    $speed = htmlspecialchars($data["speed"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $harga = htmlspecialchars($data["harga"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    

    $query = "UPDATE data_mobil SET  
            perusahaan = '$perusahaan',
            merek = '$merek', 
            speed = '$speed',
            tahun = '$tahun',
            harga = '$harga',
            gambar = '$gambar'
        WHERE id = $id
    ";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}


function cari($keyword) {
    $query = " SELECT * FROM data_mobil WHERE
    perusahaan LIKE '%$keyword%' OR 
    merek LIKE '%$keyword%' OR
    speed LIKE '%$keyword%' OR
    tahun LIKE '%$keyword%' OR
    harga LIKE '%$keyword%'
    ";
    return query($query);
}

function cari_user($keyword) {
    $query = " SELECT * FROM user WHERE
    nama_user LIKE '%$keyword%' OR
    alamat LIKE '%$keyword%' OR
    email LIKE '%$keyword%'
    ";
    return query($query);
}

function registrasi_admin($data) {
    global $db;
    
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);
    $nama_admin = strtolower(stripslashes($data["nama_admin"]));
    $jabatan = strtolower(stripslashes($data["jabatan"]));


    // cek username sudah ada atau belum
    $result = mysqli_query($db, "SELECT username FROM admin WHERE username = '$username'");

    if(mysqli_fetch_assoc($result) ) {
        echo "<script>
        alert('username sudah terdaftar!')
        </script>";
        return false;
    }


    // cek konfirmasi password
    if($password !== $password2) {
        echo "<script>
        alert('konfirmasi password tidak sesuai!');
        </script>";

        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    // tambahkan admin ke database
    mysqli_query($db, "INSERT INTO admin VALUES('', '$username', '$password', '$nama_admin', '$jabatan')");

    return mysqli_affected_rows($db);

}

function registrasi_user($data) {
    global $db;
    
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);
    $nama_user = htmlspecialchars(stripslashes($data["nama_user"]));
    $alamat = htmlspecialchars(stripslashes($data["alamat"]));


    // cek username sudah ada atau belum
    $result = mysqli_query($db, "SELECT username FROM user WHERE username = '$username'");

    if(mysqli_fetch_assoc($result) ) {
        echo "<script>
        alert('username sudah terdaftar!')
        </script>";
        return false;
    }


    // cek konfirmasi password
    if($password !== $password2) {
        echo "<script>
        alert('konfirmasi password tidak sesuai!');
        </script>";

        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    // tambahkan user ke database
    mysqli_query($db, "INSERT INTO user VALUES('', '$username', '$password', '$nama_user', '$alamat')");

    return mysqli_affected_rows($db);


    // kearsipan
    function upload() {
        $namaFile = $_FILES['name undang-undang'];
        $upload = $_FILES{'data'};
        
      
    
        // cek apakah tidak ada gambar yang di upload
        if( $upload === 4 ) {
            echo "<script>
            alert('pilih file dahulu!');
            </script>";
            return false;
        }
    
        // cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['file'];
        $ekstensiGambar = explode('.',$namaFile);
        $ekstensiGambar = strtolower (end($ekstensiGambar));
        if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
            echo "<script>
            alert('yang anda upload bukan gambar!');
            </script>";
            return false;
        }
    
        // cek jika ukuran gambar terlalu besar
        if ($ukuranFile > 5000000) {
            echo "<script>
            alert('ukuran gambar terlalu besar!');
            </script>";
            return false;
        } 
    
        // lolos pengecekan, ga,bar siap diupload
        // generate nama file baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
    
        move_uploaded_file($tmpName, 'img/'.$namaFileBaru );
        return $namaFileBaru;
    
    }
    

}


?>
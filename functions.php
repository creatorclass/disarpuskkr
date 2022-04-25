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

// Arsip
function tambahArsip($data)
{
    global $db;
  
    $skpd = htmlspecialchars ($data["skpd"]);
    $nomor_boks = htmlspecialchars ($data["nomor_boks"]);
    $nomor_arsip = htmlspecialchars ($data["nomor_arsip"]);
    $kode_klarifikasi = htmlspecialchars ($data["kode_klarifikasi"]);
    $uraian = htmlspecialchars ($data["uraian"]);
    $kurun_waktu = htmlspecialchars ($data["kurun_waktu"]);
    $jumlah = htmlspecialchars ($data["jumlah"]);
    $tingkat_perkembangan = htmlspecialchars ($data["tingkat_perkembangan"]);
    $letak = htmlspecialchars ($data["letak"]);


    // upload gambar

    $query = "INSERT INTO arsip VALUES ('','$skpd','$nomor_boks','$nomor_arsip','$kode_klarifikasi','$uraian','$kurun_waktu','$jumlah','$tingkat_perkembangan','$letak')";
    mysqli_query($db,$query);


    

    return mysqli_affected_rows($db);
}

function hapusArsip($id){
    global $db;
    mysqli_query($db, "DELETE FROM arsip WHERE id = $id");

    return mysqli_affected_rows($db);
}
// Arsip


// uu
function tambahUu($data) {

    global $db;
    // Ambill data dar tiap element Form

    // $title = htmlspecialchars ($data["title"]);
    $title = $data["title"];
    $deskripsi = htmlspecialchars ($data["deskripsi"]);


    // upload gambar
    $pdf = upload();
    if ( !$pdf ) {
        return false;
    }

    $query = "INSERT INTO layanan VALUES ('','$title','$deskripsi','$pdf')";
    mysqli_query($db,$query);


    

    return mysqli_affected_rows($db);
    
}

function upload(){
    

    $namaFile = $_FILES["uu"]["name"];
    $ukuranFile = $_FILES["uu"]["size"];
    $error = $_FILES["uu"]["error"];
    $tmpName = $_FILES["uu"]["tmp_name"];

    // cek upload
    if ( $error === 4 ) {
        echo "<script>
                alert('pilih file terlebihdahulu!')
            </script>";
            return false;
    }

    // cek upload gambar 
    $ekstensiPdfValid = ['pdf'];
    $ekstensiPdf = explode('.', $namaFile);
    $ekstensiPdf = strtolower (end($ekstensiPdf));
    if ( !in_array($ekstensiPdf, $ekstensiPdfValid) ) {
        echo "<script>
                alert('yang anda upload bukan file!')
            </script>";
        return false;
    }
    if ( $ukuranFile > 100000000 ) {
        echo "<script>
        alert('Ukuran file terlalu besar')
            </script>";
        return false;
    }


    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiPdf;
    // var_dump($namaFileBaru); die;

    move_uploaded_file($tmpName, 'asset/' . $namaFileBaru);
    return $namaFileBaru;


}

function hapusUu($id){
    global $db;
    mysqli_query($db, "DELETE FROM layanan WHERE id = $id");

    return mysqli_affected_rows($db);
}




?>
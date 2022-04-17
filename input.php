<?php
//cek button    
    if ($_POST['Submit'] == "Submit") {
    
    $nama            = $_POST['nama'];
    $deskripsi        = $_POST['deskripsi'];
    $undang             = $_POST['undang'];
    
    //validasi data data kosong
    if (empty($_POST['nama'])||empty($_POST['deskripsi'])||empty($_POST['undang'])) {
        ?>
            <script language="JavaScript">
                alert('Data Harap Dilengkapi!');
                document.location='download-script-form-input-data.php';
            </script>
        <?php
    }
    else {
    include "../../koneksi-tutor.php";
    //cek NIM di database
    $cek=mysql_num_rows (mysql_query("SELECT nama FROM perundangan WHERE nama='$_POST[nama]'"));
    if ($cek > 0) {
    ?>
        <script language="JavaScript">
        alert('NIM sudah dipakai!, silahkan ganti NIM yang lain');
        document.location='download-script-form-input-data.php';
        </script>
    <?php
    }
    //Masukan data ke Table
    $input    ="INSERT INTO mahasiswa (nama,deskripsi,undang,) VALUES ('$nama','$deskripsi','$undang')";
    $query_input =mysql_query($input);
    if ($query_input) {
    //Jika Sukses
    ?>
        <script language="JavaScript">
        alert('Input Data Mahasiswa Berhasil');
        document.location='layanan.php';
        </script>
    <?php
    }
    else {
    //Jika Gagal
    echo "Input Data Mahasiswa Gagal!, Silahkan diulangi!";
    }
//Tutup koneksi engine MySQL
    mysql_close($Open);
    }
}
?>
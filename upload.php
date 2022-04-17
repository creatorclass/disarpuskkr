<?php 
require 'functions.php';

if(isset($_POST["upload.php"]) ) {
	
	if ( upload($_POST) > 0 ) {
        echo "<script>
        alert('data tersimpan!');
        </script>";
        echo "<script>
        location = layanan.php';
        </script>";
    } else {
        echo mysqli_error($db);
    }
}

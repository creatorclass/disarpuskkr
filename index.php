<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- My Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="styleutama.css"> -->
	<style>
		/* Navbar */

        .navbar {
            position: relative;
            z-index: 1;
        }
        .navbar-brand {
            font-family: viga;
            font-size: 32px;
        }

        /* Jumbotron */
        .jumbotron {
            background-image: url(img/jumb1.jpg);
            background-size: cover;
            height: 540px;
            text-align: center; 
            position: relative;
        }

        .jumbotron .container {
            z-index: 1;
            position: relative;
        }

        .jumbotron::after {
            content: '';
            display: block;
            width: 100%;
            height: 110%;
            background-image: linear-gradient(to top, rgba(0,0,0,1), rgba(0,0,0,0));
            position: absolute;
            bottom: 0;
        }

        .jumbotron .display-4{
            color: white;
            margin-top: 150px;
            font-weight: 600;
            text-shadow: 1px 1px 1px rgb(0, 0, 0, 0.7);
            font-size: 25px;
            margin-bottom: 30px;
        }

        /* infopanel */
        .info-panel {
            box-shadow: 0 3px 20px rgba(0,0,0,0.5);
            border-radius: 12px;
            margin-top: -100px;
            background-color: white;
            padding: 30px;
        }

        .info-panel img {
            width: 80px;
            height: 80px;
            margin-right: 20px;
            margin-bottom: 20px;
        }

        .info-panel h4 {
            font-size: 16px;
            text-transform: uppercase;
            font-weight: bold;
            margin-top: 5px;
        }

        .info-panel p {
            font-size: 14px;
            color: #ACACAC;
            margin-top: -5px;
            font-weight: 200;
        }

        /* Workingspace */
        .workingspace {
            margin-top: 120px;
            text-align: center;
        }

        .workingspace h3 {
            font-size: 52px;
            font-weight: 200;
            text-transform: uppercase;
            margin-top: 30px;
        }

        .workingspace h3 span {
            font-weight: 500;
        }

        .workingspace p {
            font-size: 18px;
            color: #ACACAC;
            font-weight: 200;
            margin: 40px 0;
        }


        /* Testimonial */
        .testimonial {
            margin-top: 100px;
        }

        .testimonial h5 {
            text-align: center;
            font-weight: 200;
            font-style: italic;
            font-size: 24px;
        }

        .testimonial figure img {
            width: 70px;
            height: 70px;
            margin-top: 20px;
        }

        .testimonial figure h5 {
            font-size: 16px;
            font-weight: bold;
            font-style: normal;
            color: #1C2C5D;
        }

        .testimonial figure p {
            font-size: 12px;
            color: #ACACAC;
            margin-top: -5px !important;
        }

        .testimonial figcaption {
            text-align: center;
        }

        /* footer */
        .footer {
            margin-top: 100px;
        }
        .footer p{
            color: #acacac;
            font-size: 18px;
        }

        /* utility */
        .tombol {
            text-transform: uppercase;
            border-radius: 40px;
        }
        /* DESKTOP Version */
        @media (min-width: 992px)  {  
            .navbar-brand, .nav-link {
                color: white !important;
                text-shadow: 1px 1px 1px rgb(0, 0, 0, 0.7);
            }
            .nav-link {
                text-transform: uppercase;
                margin-right: 20px;
            }

            .nav-link:hover::after {
                content: '';
                display: block;
                border-bottom: 3px solid #0B63DC;
                width: 50%;
                margin: auto;
                padding-bottom: 5px;
                margin-bottom: -8px;
            }
            .jumbotron {
                margin-top: -75px;
                height: 640px;
            }

            .jumbotron .display-4 {
                font-size: 42px;
            }

            .workingspace {
                text-align: left;
            }

            .testimonial h5 {
                font-size: 32px;
            }
            
        }
	</style>

    <title>DISARPUSKKR</title>
  </head>
  <body>
<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light">
		<div class="container">
			<a class="navbar-brand" href="#" >DISARPUSKKR</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav ml-auto">
					<a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
					<a class="nav-item nav-link" href="profile.php">Profile</a>
					<a class="nav-item nav-link" href="perpustakaan.php">Perpustakaan</a>
                  

                <div class="dropdown show">
                    <a class="nav-item nav-link" href="kearsipan.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Kearsipan
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="layanan.php">Layanan</a>
                    <a class="dropdown-item" href="publikasi.php">Publikasi</a>
                
                    </div>
                </div>
 

					<a class="nav-item nav-link" href="gallery.php">Gallery</a>
					<a class="nav-item nav-link" href="kontak.php">Kontak</a>
					<a class="nav-item btn btn-primary tombol" href="login.php" >LOGIN</a>
				</div>
			</div>
		</div>
	</nav>
<!-- Akhir Navbar -->

<!--Jumbotron -->
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Selamat Datang Di Website Dinas Kearsipan dan Perpustakaan Kabupaten Kubu Raya</h1>
			<a href="register_user.php" class="btn btn-primary tombol">BUAT AKUN</a>
		</div>
	</div>
<!--Akhir Jumbotron -->

<!-- Container -->
<div class="container">
	<!-- info pnael -->
	<div class="row justify-content-center">
		<div class="col-10 info-panel">
			<div class="row">
				<div class="col-lg">
					<img src="img/employee.png" alt="employee" class="float-left">
					<h4>24 Hours</h4>
					<p>Lorem ipsum dolor sit amet consectetur</p>
				</div>
				<div class="col-lg">
					<img src="img/hires.png" alt="hires" class="float-left">
					<h4>High-Res</h4>
					<p>Lorem ipsum dolor sit amet consectetur</p>
				</div>
				<div class="col-lg">
					<img src="img/security.png" alt="security" class="float-left">
					<h4>Security</h4>
					<p>Lorem ipsum dolor sit amet consectetur</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Akhir info panel -->

	<!-- Workingspace -->
	<div class="row workingspace">
		<div class="col-lg-6">
			<img src="img/workingspace.png" alt="workingspace" class="img-fluid">
		</div>
		<div class="col-lg-6">
			<h3>Books are a <span>source</span> of <span>knowledge</span></h3>
			<p>Membaca dengan hati dan pikiran yang tenang 
				serta mempelajari hal baru setiap harinya.</p>
				<a href="gallery.php" class="btn btn-primary tombol">Gallery</a>
		</div>
	</div>
	<!-- Akhir Workingspace -->

	<!-- Testimonial -->
	<section class="testimonial">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<h5>"Membaca dengan hati dan pikiran yang tenang 
				serta mempelajari hal baru setiap harinya."</h5>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-6 justify-content-center d-flex">
				<figure class="figure">
					<img src="img/jumb5.jpg" class="figure-img img-fluid rounded-circle" alt="testi 1">
					<figcaption class="figure-caption">
						<h5>DISARPUS</h5>
						<p>Disarpuskkr</p>
					</figcaption>
				</figure>
			</div>
		</div>
	</section>
	<!-- Akhir Testimonial -->
</div>
<!-- Akhir container -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  </body>

</html>
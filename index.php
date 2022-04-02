<?php

//memulai session
session_start();

//jika ada session, maka akan diarahkan ke halaman dashboard admin
if (isset($_SESSION['id_user'])) {

	//mengarahkan ke halaman dashboard admin
	header("Location: ./admin.php");
	die();
}

//mengincludekan koneksi database
include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Mie Level Huuhaah </title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
	<!-- End of boostrap link -->

	<link rel="stylesheet" type="text/css" href="./css/index.css">
</head>

<body>

	<div class="limiter">

		<?php

		//apabila tombol login di klik akan menjalankan skript dibawah ini
		if (isset($_REQUEST['login'])) {

			var_dump($_REQUEST['login']);
			var_dump($password);

			//mendeklarasikan data yang akan dimasukkan ke dalam database
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];



			//script query ke insert data ke dalam database
			$sql = mysqli_query($koneksi, "SELECT id_user, username, nama, level FROM user WHERE username='$username' AND password=MD5('$password')");

			//jika skript query benar maka akan membuat session
			if ($sql) {
				list($id_user, $username, $nama, $level) = mysqli_fetch_array($sql);

				//membuat session
				$_SESSION['id_user'] = $id_user;
				$_SESSION['username'] = $username;
				$_SESSION['nama'] = $nama;
				$_SESSION['level'] = $level;

				header("Location: ./admin.php");
				die();
			} else {

				$_SESSION['err'] = '<strong>ERROR!</strong> Username dan Password tidak ditemukan.';
				header('Location: ./');
				die();
			}
		} else {
		?>

			<div class="login">

				<div class="kotak_login shadow ">
					<h4 style="text-align: center; margin: 20px auto; text-transform: uppercase;">Login Akun</h4>
					<div class="container-form p-5">
						<form method="post">

							<?php
							if (isset($_SESSION['err'])) {
								$err = $_SESSION['err'];
								echo '<div class="alert alert-warning alert-message">' . $err . '</div>';
								unset($_SESSION['err']);
							}
							?>
							<label>Username</label>
							<input type="text" name="username" class="form_login" placeholder="Username .." required>

							<label>Password</label>
							<input type="password" name="password" class="form_login" placeholder="Password .." required>

							<input type="submit" name="login" class=" btn btn-primary tombol_login">
						</form>
					</div>
				</div>
			</div>
			<!-- sdsdadkjasdjlkasjldasjdlas -->




		<?php
		}
		?>

	</div>


</body>


</html>
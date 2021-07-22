<?php 
	session_start();

	if (isset($_SESSION["login"])) {
		header("Location: dashbord.php");
	}
	require 'fungsi.php';

	global $conn;

	if (isset($_POST["login"])) {
		
		$username = $_POST["username"];
		$password = $_POST["password"];

		$login = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");

		// cek username 
		if (mysqli_num_rows($login) === 1) {
			
			// cek password
			$row = mysqli_fetch_assoc($login);
			if (password_verify($password, $row["password"])) {

				$_SESSION["login"] = true;

				header("Location: dashbord.php");
				exit;
			}
		}

		$error = true;
	}


 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Halaman Login</title>
		<style type="text/css">:root {
  --input-padding-x: 1.5rem;
  --input-padding-y: 0.75rem;
}

.login,

.image {
  min-height: 100vh;
}

.bg-image {
  background-image: url('gambar.jpg');
  background-size: 100%;
  background-position: center;
}

.login-heading {
  font-weight: 300;
}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
  border-radius: 2rem;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group>input,
.form-label-group>label {
  padding: var(--input-padding-y) var(--input-padding-x);
  height: auto;
  border-radius: 2rem;
}

.form-label-group>label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0;

  line-height: 1.5;
  color: #495057;
  cursor: text;

  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown)~label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}
p {
	color: red;
	font-style: italic;
}


</style>
<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	</head>
	<body>
		
		<form action="" method="POST" >
			<div class="container-fluid">
			  <div class="row no-gutter">
			    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
			    <div class="col-md-8 col-lg-6">
			      <div class="login d-flex align-items-center py-5">
			        <div class="container">
			          <div class="row">
			            <div class="col-md-9 col-lg-8 mx-auto">
			              <h3 class="login-heading mb-4">Welcome back!</h3>
			              <form>
			              	<?php if (isset($error)) : ?>
			              		<p>Username / Password Anda Salah :(</p>
			              	<?php endif; ?>
			                <div class="form-label-group">
			                  <input type="text" id="username" class="form-control" name="username" placeholder="username anda" required autofocus>
			                  <label for="username">username anda</label>
			                </div>

			                <div class="form-label-group">
			                  <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
			                  <label for="password">Password</label>
			                </div>

			                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" name="login">login</button>

			                <div class="text-center">
			                  <a class="small" href="registrasi.php">Anda Ingin Registrasi?</a></div>
			               	</div>
			              </form>
			            </div>
			          </div>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
		</form>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</html>
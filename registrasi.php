<?php 

    require 'fungsi.php'; 

    if ( isset($_POST["register"])) {
        
        if ( registrasi ($_POST) > 0) {
            echo "
                <script>
                    alert('User Baru Berhasil di tambah!');
                    document.location.href ='index.php';
                </script>
            ";
        } else {
            echo mysqli_error($conn);
            ;
        }

    }

 ?>


<!DOCTYPE html>
<html>
	<head>
		<title>Halaman Registrasi</title>
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
  /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  cursor: text;
  /* Match the input under the label */
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


</style>
<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	</head>
	<body>
		<form action="" method="POST" autocomplete="">
			<div class="container-fluid">
			  <div class="row no-gutter">
			    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
			    <div class="col-md-8 col-lg-6">
			      <div class="login d-flex align-items-center py-5">
			        <div class="container">
			          <div class="row">
			            <div class="col-md-9 col-lg-8 mx-auto">
			              <h3 class="login-heading mb-4">Registrasi Data Anda</h3>
			              <form>
			                <div class="form-label-group">
			                  <input type="text" id="username" class="form-control" name="username" placeholder="Nama Anda" required autofocus>
			                  <label for="username">Nama Anda</label>
			                </div>

			                <div class="form-label-group">
			                  <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
			                  <label for="password">Password</label>
			                </div>

			                <div class="form-label-group">
			                  <input type="password" id="password2" name="password2" class="form-control" placeholder="konfirmasi Password" required>
			                  <label for="password2">konfirmasi Password</label>
			                </div>

			                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" name="register">Register !</button>
			                <div class="text-center">
			                  
			               
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
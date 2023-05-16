<?php
session_start();
error_reporting(0);
include("config.php");
if(isset($_POST['submit']))
{
$uname=$_POST['username'];
$upassword=$_POST['password'];

$ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$uname' and password='$upassword'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
header("location:manage-toko.php");

}
else
{
$_SESSION['errmsg']="Password dan username salah";

}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin login</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<style>
body {
    background-image: url(minimarket.jpg);
    color: white;
    background-size: cover;
    background-repeat: no-repeat;
}

.card-header {
    background-color: green;
}

.login {
    margin-top: 5%;
}

h2, h3, legend, p, a{
    color: white;
}

label{
    color: black;
}

button a{
    text-decoration: none;
}

</style>

<body>
    <nav class="navbar navbar-light bg-success">
        <div class="container">
            <a class="navbar-brand"><h3>TOKO ONLINE HARIS</h3></a>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <div class="login">
        <div class="container mt-3 justify-content-sm-center">
            <div class="row justify-content-sm-center">
                <!-- col -->
                <div class="col-6">
                    <!-- card -->
                    <div class="card">
                        <!-- card header -->
                        <div class="card-header" align="center">
                            <br>
                            <h2>ADMIN LOGIN</h2>
                            <div class="card-body">
                                <form method="post" style="justify-content:center; display: flex;">
                                    <fieldset>
                                        <legend>
                                            Hanya untuk karyawan Kantor
                                        </legend>
                                        <p>
                                            Masukkan username dan password dahulu
											<br>
                                            <span
                                                style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
                                        </p>
                                        <br>
                                        <div class="form-floating mb-1">
                                            <input style="margin-bottom:10px;" type="text" class="form-control"
                                                name="username" placeholder="Username" required>
                                            <label for="">Username</label>
                                        </div>

                                        <div class="form-floating mb-2">
                                            <input style="margin-bottom:10px;" type="password" class="form-control"
                                                name="password" placeholder="Password" required>
                                            <label for="">Password</label>
                                        </div>
                                        <br>
                                        <p>
                                            Karyawan baru? Hubungi pemilik toko, <a href="login.php">Klik Disini</a>
                                        </p>
                                        <br>
										<br>
                                        <button type="submit" class="btn btn-dark" name="submit">
                                            LOGIN
                                        </button>
                                    </fieldset>
									<br>
                                </form>

                            </div>
                        </div>
                    </div>
</body>

</html>
<?php
session_start();
error_reporting(0);
include('config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:index.php');
  } else{

$tokoid=intval($_GET['id']);// get id
if(isset($_POST['submit']))
{
$nama_barang=$_POST['nama_barang'];
$satuan=$_POST['satuan'];
$stok=$_POST['stok'];
$harga=$_POST['harga'];
$sql=mysqli_query($con,"Update barang set nama_barang='$nama_barang',satuan='$satuan',stok='$stok',harga='$harga' where id='$tokoid'");
if($sql)
{
// $msg="Data barang Berhasil Diperbaharui";
$_SESSION['msg']="Data Nama Barang Berhasil Diperbaharui !";
echo "<script>window.location.href ='manage-toko.php'</script>";

}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit nama_barang</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<style>
body {
    background-image: url("minimarket.jpg");
    color: drak;
    background-size: cover;
    background-repeat: no-repeat;
}

h1 {
    color: green;
    margin-top: 10%;
}

button {
    margin-left: 50%;
}
</style>

<body>
    <br>
    <br>
    <div class="container">
        <section>
            <div class="row">
                <div class="col-sm-8">
                    <h1>EDIT DATA</h1>
                </div>
            </div>
        </section>
        <br>
        <div class="container-fluid bg-white p-3">
            <div class="row">
                <div class="col-md-12">
                    <h5 style="color: green; font-size:18px; ">
                        <?php if($msg) { echo htmlentities($msg);}?>
                    </h5>
                    <div class="row">
                        <div class="col-sm-8 col-md-12">
                            <?php $sql=mysqli_query($con,"select * from barang where id='$tokoid'");
								while($data=mysqli_fetch_array($sql))
								{
								?>
                            <form role="form" method="post" action="">
                                <div class="row">
                                    <label>
                                        Nama Barang
                                    </label>
                                    <input type="text" name="nama_barang" class="form-control" required="required"
                                        value="<?php echo htmlentities($data['nama_barang']);?>">
                                </div>
                                <div class="row">
                                    <label>
                                        Satuan
                                    </label>
                                    <input type="text" name="satuan" class="form-control" required="required"
                                        value="<?php echo htmlentities($data['satuan']);?>">
                                </div>
                                <div class="row">
                                    <label>
                                        Stock
                                    </label>
                                    <input type="text" name="stok" class="form-control" required="required"
                                        value="<?php echo htmlentities($data['stok']);?>">
                                </div>
                                <div class="row">
                                    <label>
                                        Harga
                                    </label>
                                    <input type="text" name="harga" class="form-control" required="required"
                                        value="<?php echo htmlentities($data['harga']);?>">
                                </div>
                                <?php } ?>
                                <button style="margin-top:10px;" type="submit" name="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php } ?>
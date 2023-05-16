<?php
session_start();
error_reporting(0);
include('config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:index.php');
  } else{

if(isset($_POST['submit']))
{	$namaBarang=$_POST['namaBarang'];
$satuan=$_POST['satuan'];
$url=$_POST['url'];
$stok=$_POST['stok'];
$harga=$_POST['harga'];
$sql=mysqli_query($con,"insert into barang(nama_barang,url,satuan,stok,harga) values('$namaBarang','$url','$satuan','$stok','$harga')");
if($sql)
{
echo "<script>alert('Barang Berhasil ditambahkan');</script>";
echo "<script>window.location.href ='manage-toko.php'</script>";
$_SESSION['msg']="data ditambah !";

}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<style>
.container {
    margin-top: 5%;
    margin-left: 20%;
}

body {
    background-image: url(minimarket.jpg);
    color: dark;
    background-size: cover;
    background-repeat: no-repeat;
}

h1 {
    color: green;
}
</style>

<body>
    <br>
    <br>
    <div class="container">
        <section>
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle"><b>TAMBAH BARANG</b></h1>
                </div>
            </div>
        </section>
        <br>
        <div class="container-fluid bg-white p-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-sm-8 col-md-12">
                        <form role="form" name="adddoc" method="post">
                            <center>
                                <div class="row">
                                    <label>
                                        Nama Barang
                                    </label>
                                    <input type="text" name="namaBarang" class="form-control"
                                        placeholder="Masukkan Nama Barang" required="true">
                                </div>
                                <div class="row">
                                    <label>
                                        url gambar
                                    </label>
                                    <input type="text" name="url" class="form-control" placeholder="Masukkan url gambar"
                                        required="true">
                                </div>
                                <div class="row">
                                    <label>
                                        Satuan
                                    </label>
                                    <input type="text" name="satuan" class="form-control" placeholder="Masukkan Satuan"
                                        required="true">
                                </div>
                                <div class="row">
                                    <label>
                                        Stok
                                    </label>
                                    <input type="text" name="stok" class="form-control"
                                        placeholder="Masukkan Jumlah Stok" required="true">
                                </div>
                                <div class="row">
                                    <label>
                                        Harga
                                    </label>
                                    <input type="text" name="harga" class="form-control"
                                        placeholder="Masukkan Harga Barang" required="true">
                                </div>
                                <button style="margin-top:10px;" type="submit" name="submit" id="submit"
                                    class="btn btn-o btn-primary">
                                    Submit
                                </button> 
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php } ?>
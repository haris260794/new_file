<?php
session_start();
error_reporting(0);
include('config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:index.php');
  } else{


if(isset($_GET['del']))
		  {
		  	$tokoid=$_GET['id'];
		          mysqli_query($con,"delete from barang where id ='$tokoid'");
                  $_SESSION['msg']="data dihapus !";
		  }
?>
<!DOCTYPE html>
<html lang="en">
<br>
<br>

<head>
    <title>Manage Toko</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.css">
</head>
<style>
body {
    background-image: url("minimarket.jpg");
    color: white;
    background-size: cover;
    background-repeat: no-repeat;
}

h1 {
    color: green;
}

button {
    margin-left: 50%;
}

</style>

<body>
    <br>
    <br>
    <div class="main-content">
        <div class="wrap-content container">
            <section>
                <div class="row">
                    <div class="col-sm-8">
                        <h1><b>MANAGEMEN TOKO</b></h1>
                    </div>
                </div>
            </section>
            <br>
            <div class="container-fluid bg-light">
                <div class="row">
                    <div class="col-md-12">
                        <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
                            <?php echo htmlentities($_SESSION['msg']="");?></p>
                        <br>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th> 
                                    <th>gambar</th>
                                    <th>Satuan</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
		$sql=mysqli_query($con,"select * from barang");
		$cnt=1;
		while($row=mysqli_fetch_array($sql))
		{
		?>

                                <tr>
                                    <td><?php echo $cnt;?>.</td>
                                    <td><?php echo $row['nama_barang'];?></td>
                                    <td>
                                        <img src="<?php echo $row['url'];?>" alt="" width="10%">
                                    </td>

                                    <td><?php echo $row['satuan'];?></td>
                                    <td><?php echo $row['stok'];?></td>
                                    <td><?php echo $row['harga'];?></td>
                                    <td>
                                        <div>
                                            <a href="edit-barang.php?id=<?php echo $row['id'];?>" class="btn"><i
                                                    class="fa-sharp fa-solid fa-pen-to-square"></i></a>

                                            <a href="manage-toko.php?id=<?php echo $row['id']?>&del=delete"
                                                onClick="return confirm('Are you sure you want to delete?')"
                                                class="btn"><i class="fa fa-times fa fa-white"></i></a>
                                        </div>
                                    </td>
                                </tr>

                                <?php 
		$cnt=$cnt+1;
									 }?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row text-end">
                    <a href="tambah-barang.php" class="btn">
                        <i class="fa-solid fa-circle-plus fa-2xl"></i>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <a href="index.php"><button type="submit" class="btn btn-dark" name="submit">
                LOGOUT
            </button></a>
    </div>
</body>

</html>
<?php } ?>
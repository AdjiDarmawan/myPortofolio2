<?php 
include 'controller/connection.php';

session_start();

$levelEditorID = $_SESSION['id'];
if (isset($_POST['simpan'])) {

    $namaTempat = $_POST['nama_tempat'];
    $alamat = $_POST['alamat'];
    $jenisPerkerjaan =$_POST['jenis_perkerjaan'];
    $deskripsi =$_POST['deskripsi'];
    $tahunMasuk =$_POST['tahun_masuk'];
    $tahunKeluar =$_POST['tahun_keluar'];

    $tambah = mysqli_query($connection, "INSERT INTO pengalaman(nama_tempat, alamat, jenis_perkerjaan, deskripsi, tahun_masuk, tahun_keluar) VALUES ('$namaTempat','$alamat','$jenisPerkerjaan','$deskripsi','$tahunMasuk','$tahunKeluar')");
    
    $tambah = mysqli_query($connection, "INSERT INTO pengalaman(nama_tempat, alamat, jenis_perkerjaan, deskripsi, tahun_masuk, tahun_keluar) VALUES ('$namaTempat','$alamat','$jenisPerkerjaan','$deskripsi','$tahunMasuk','$tahunKeluar')");
    
    header('location:pengalamanKerja.php');

}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($connection, "SELECT * FROM pengalaman WHERE id ='$id'");
$rowEdit = mysqli_fetch_assoc($queryEdit);


// jika button edit di klik
if (isset($_POST['edit'])) {
    $namaTempat = $_POST['nama_tempat'];
    $alamat = $_POST['alamat'];
    $jenisPerkerjaan =$_POST['jenis_perkerjaan'];
    $deskripsi =$_POST['deskripsi'];
    $tahunMasuk =$_POST['tahun_masuk'];
    $tahunKeluar =$_POST['tahun_keluar'];

    
        $update = mysqli_query($connection, "UPDATE pengalaman SET nama_tempat='$namaTempat',alamat='$alamat',jenis_perkerjaan='$jenisPerkerjaan',deskripsi='$deskripsi', tahun_masuk = '$tahunMasuk', tahun_keluar = '$tahunKeluar' WHERE id='$id'");
        header("location:pengalamanKerja.php?ubah=berhasil");

}

       if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $querydelete = mysqli_query($connection, "DELETE FROM pengalaman WHERE id='$id'");
        header('location:pengalamanKerja.php?deleted-berhasil');
       }


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | Home Editor</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include'inc/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include'inc/topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Home Editor</h1>
                    <p class="mb-4">This is the section where you can edit the home section of your portfolio website.</p>

                    <!-- Content Row -->
                    <!-- Area Chart -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Home of Your Portofolio</h6>
                        </div>
                        <div class="card-body">
                           <form action="" method="post">
                            <div class="form-group">
                                <label for="">Nama Tempat</label>
                                <input type="text" class="form-control" name="nama_tempat" placeholder="masukkan nama tempat anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_tempat'] : '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="masukkan alamat anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['alamat'] : '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Perkerjaan</label>
                                <input type="text" class="form-control" name="jenis_perkerjaan" placeholder="masukkan jenis perkerjaan anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['jenis_perkerjaan'] : '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi" placeholder="masukkan deskripsi anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['deskripsi'] : '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Tahun Masuk</label>
                                <input type="text" class="form-control" name="tahun_masuk" placeholder="masukkan jenis perkerjaan anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['tahun_masuk'] : '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Tahun Keluar</label>
                                <input type="text" class="form-control" name="tahun_keluar" placeholder="masukkan tahun keluar anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['tahun_keluar'] : '' ?>">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>" type="submit"><?php echo isset($_GET['edit']) ? "Edit" : 'Simpan'?></button>
                            </div>
                           </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>

</body>

</html>
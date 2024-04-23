<?php
  include'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="icon" href="./assets/images/logoundipa.png"/>
    <title>Clustering Bidang Keilmuan Dosen Undipa</title>
    <link href="assets/css/lia.css" rel="stylesheet"/>
    <link href="assets/css/general.css" rel="stylesheet"/>
    <link href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="assets/css/sweet/sweetalert.css"> 
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/css/sweet/sweetalert.min.js"></script>
    <script type="text/javascript" src="assets/css/sweet/sweetalert-dev.js"></script>    
  </head>
  <body background="./assets/images/background.png">
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img src="./assets/images/LogoUndipa.png" width="43px" height="43px" alt="logo" class="pull-left"/>
          <a class="navbar-brand" href="index.php"><b>Clustering Bidang Ilmu Dosen UNDIP Fuzzy C-Means</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <?php if($_SESSION['login']):?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-th-list"></span> UNDIPA <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="?m=bidangilmu"><span class="glyphicon glyphicon-list-alt"></span> Bidang Ilmu</a></li>
                    <li><a href="?m=prodi"><span class="glyphicon glyphicon-calendar"></span> Prodi </a></li>
                </ul>
            </li>
            <li>
              <a href="?m=kriteria">
                <span class="glyphicon glyphicon-list-alt"></span> Kriteria Penilaian
              </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Dosen <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                      <a href="?m=dosen">
                        <span class="glyphicon glyphicon-user"></span> Data Dosen
                      </a>
                    </li>
                    <li>
                      <a href="?m=rel_dosen">
                        <span class="glyphicon glyphicon-briefcase"></span> Nilai Kriteria Dosen
                      </a>
                    </li>
                    <li>
                      <a href="?m=cluster">
                        <span class="glyphicon glyphicon-retweet"></span> Hasil Clustering
                      </a>
                    </li>
                </ul>
            </li>
            <li>
              <a href="?m=hitung">
                <span class="glyphicon glyphicon-hourglass"></span> Perhitungan
              </a>
            </li>    
            <li>
              <a href="?m=password">
                <span class="glyphicon glyphicon-lock"></span> Password
              </a>
            </li>
            <li>
              <a class="notif-keluar" href="aksi.php?act=logout">
                <span class="glyphicon glyphicon-log-out"></span> Logout
              </a>
            </li>
            <?php else:?>
                    <li>
                      <a href="?m=login">
                        <span class="glyphicon glyphicon-user"></span> Login Admin
                      </a>
                    </li>
            <?php endif?>                         
          </ul>          
        </div>
    </nav>
    <div class="container">
    <?php
        if(!in_array($mod, array('login', 'login_siswa', 'registrasi_sukses', 'siswa_gambar', 'registasi_sukses_cetak')) && !$_SESSION['login'] && !$_SESSION['loginsiswa'])
          $mod='home';
        if(file_exists($mod.'.php'))
            include $mod.'.php';
        else
            include 'home.php';
    ?>
    </div>
    <footer class="footer bg-primary">
      <div class="container">
        <div class="container">
          <center><p>Copyright &copy; <?=date('Y')?> 202003 HARMAN & 202252 SYARIF ABDULLAH</p></center>
        </div>     
      </div>
    </footer>
  
  <script type="text/javascript">
      jQuery(document).ready(function($){
          $('.notif-hapus').on('click',function(){
              var getLink = $(this).attr('href');
              swal({
                      title: "Notification!",
                      text: 'Apakah Anda Yakin Ingin Menghapus Data Ini?',
                      type: "warning",
                      html: true,
                      confirmButtonColor: "#DD6B55",
                      showCancelButton: true,
                      },function(){
                      window.location.href = getLink
                  });
              return false;
          });
          $('.notif-keluar').on('click',function(){
              var getLink = $(this).attr('href');
              swal({
                      title: "Anda Ingin Keluar?",
                      text: 'Klik YA untuk keluar dari sistem',
                      type: "info",
                      html: true,
                      confirmButtonColor: "#DD6B55",
                      showCancelButton: true,
                      },function(){
                      window.location.href = getLink
                  });
              return false;
          });
        });

      function readURL(input) { // Mulai membaca inputan gambar
        if (input.files && input.files[0]) {
        var reader = new FileReader(); // Membuat variabel reader untuk API FileReader
        
        reader.onload = function (e) { // Mulai pembacaan file
        $('#preview_gambar') // Tampilkan gambar yang dibaca ke area id #preview_gambar
        .attr('src', e.target.result)
        .width(200); // Menentukan lebar gambar preview (dalam pixel)
        //.height(200); // Jika ingin menentukan lebar gambar silahkan aktifkan perintah pada baris ini
        };
        
        reader.readAsDataURL(input.files[0]);
        }
      }
  </script>  
  <script src="assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/plugins/datatables/dataTables.responsive.min.js" type="text/javascript"></script>
  <script src="assets/plugins/datatables/responsive.bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
  <script>
      CKEDITOR.replace( 'editor1' );
      CKEDITOR.replace( 'editor2' );
  </script>
  <script type="text/javascript">
    $(function () {
    $("#tabel1").DataTable();
    $('#tabel2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": true
      });
      });
  </script>
</html>
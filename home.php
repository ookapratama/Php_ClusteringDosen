<?php 
    if($_SESSION['login']) {
?>
<div class="row">
  <div class="col-md-6">
    <div class="btn-group btn-group-justified">
      <a href="?m=bidangilmu" class="btn btn-default">
        Bidang Keilmuan
        <span class="badge">
        <?php 
          $rows = $db->query("SELECT * FROM tb_bidangilmu");
          echo $rows;
        ?>  
        </span>
      </a>
      <a href="?m=prodi" class="btn btn-default">
        Prodi
        <span class="badge">
        <?php 
          $rows = $db->query("SELECT * FROM tb_prodi");
          echo $rows;
        ?>  
        </span>
      </a>
    </div>
    <div class="btn-group btn-group-justified">
      <a href="?m=kriteria" class="btn btn-default">
        Kriteria
        <span class="badge">
        <?php 
          $rows = $db->query("SELECT * FROM tb_kriteria");
          echo $rows;
        ?>  
        </span>
      </a>
      <a href="?m=dosen" class="btn btn-default">
        Dosen
        <span class="badge">
        <?php 
          $rows = $db->query("SELECT * FROM tb_dosen");
          echo $rows;
        ?>
        </span>
      </a>
      <a href="?m=rel_dosen" class="btn btn-default">
        Nilai Dosen
      </a>
    </div>
  </div>
</div>

<?php
  } elseif($_SESSION['loginsiswa']) {
      include "siswa_detail.php";
    } else {

  if($rows = $db->get_results("SELECT * FROM tb_prodi WHERE status='aktif'")){
  foreach($rows as $row):
?>

<div class="panel panel-primary">
  <h2 class="text-center">CLUSTERING BIDANG ILMU DOSEN</h2>
  <div class="page-header">
      <h2 class="text-center">UNIVERSITAS DIPA MAKASSAR</h2>
  </div>
</div>

<?php 
  endforeach;
  } else {
?>

<?php }; } ?>
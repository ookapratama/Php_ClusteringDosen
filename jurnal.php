<?php
$prodi = $_REQUEST['prodi_id'];

$id_dosen = $_GET['ID'];

session_start();
$_SESSION['id_dosen_global'] = $_GET['ID'];
$_SESSION['prodi_dosen_global'] = $_GET['prodi_id'];

// $rows = $db->get_results("SELECT a.id_dosen, ra.id_kriteria, ra.nilai, a.hitung           
//         FROM tb_rel_dosen ra 
//         	INNER JOIN tb_dosen a ON a.id_dosen = ra.id_dosen
//             WHERE a.prodi_id='$prodi'
//         ORDER BY ra.id_dosen, ra.id_kriteria");

// $rows = $db->get_results("SELECT a.id_dosen, ra.id_kriteria, ra.nilai, a.hitung           
//         FROM tb_rel_dosen ra 
//         	INNER JOIN tb_dosen a ON a.id_dosen = ra.id_dosen
//         ORDER BY ra.id_dosen, ra.id_kriteria");

$rows = $db->get_results("SELECT a.id, a.judul_jurnal, a.mata_kuliah, a.nidn, a.tahunJurnal, a.judulBimbingan, b.nama_dosen, b.nidn, b.id_dosen, b.prodi_id, c.nama_kriteria, c.id_kriteria, d.nama_prodi
        FROM tb_penelitian a 
        INNER JOIN tb_dosen b ON a.nidn = b.id_dosen
        INNER JOIN tb_kriteria c ON a.bidang_ilmu = c.id_kriteria
        INNER JOIN tb_prodi d ON b.prodi_id = d.prodi_id
        WHERE a.nidn = $id_dosen
        ");


$data = array();

$get_dosen = $db->get_row("SELECT * FROM tb_dosen WHERE id_dosen='$_GET[ID]'");


// foreach ($rows as $row) {
//   $data[$row->id_dosen][$row->id_kriteria]  = $row->nilai;
// }
?>
<div class="page-header">
  <h1>Bidang  Dosen &raquo; <small><?= $get_dosen->nama_dosen ?></h1>
</div>
<div class="panel panel-default">
  <div class="panel">
    <div class="row">
      <div class="col-sm-12">
        <form method="POST">
          <center>
            <div class="row">
              <div class="form-group pull-left col-md-1">
                <?php
                $status = get_prodi_status();
                if ($status) :
                  echo '<a class="btn btn-success" href="?m=jurnal_tambah"><span class="glyphicon glyphicon-pencil"></span> Tambah Data</a>';
                endif
                ?>
              </div>
              <div class="form-group pull-left col-md-2">
                <?php
                $status = get_prodi_status();
                if ($status) :
                  echo '<a class="btn btn-danger" href="?m=rel_dosen"> Kembali </a>';
                endif
                ?>
              </div>
              <!-- <div class="form-group pull-right col-md-3 col-md-offset-1">
                            <select class="form-control" name="prodi_id" onchange="form.submit()">
                                <option readonly="readonly">-- Pilih Prodi --</option>
                                <?= get_prodiview_option(set_value('prodi_id')) ?>
                            </select>
                        </div> -->
            </div>
            <!-- <div class="row">
                        <div class="form-group pull-right col-md-3 col-md-offset-1">
                            <select class="form-control" name="prodi_id" onchange="form.submit()">
                                <option readonly="readonly">-- Pilih Prodi --</option>
                                <?= get_prodiview_option(set_value('prodi_id')) ?>
                            </select>
                        </div>
                    </div> -->
          </center>
        </form>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table id="tabel1" class="table table-bordered " width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Jurnal yang diterbitkan</th>
          <th>Mata Kuliah yang diajarkan</th>
          <th>Judul Bimbingan Mahasiswa</th>
          <th>Bidang Ilmu</th>
          <th>Tahun</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($rows as $key => $val) : ?>
          <tr>

            <td><?= isset($val->judul_jurnal) ? $val->judul_jurnal : '-' ?></td>
            <td><?= isset($val->mata_kuliah) ? $val->mata_kuliah : '-' ?></td>
            <td><?= isset($val->judulBimbingan) ? $val->judulBimbingan : '-' ?></td>
            <td><?= isset($val->nama_kriteria) ? $val->nama_kriteria : '-' ?></td>
            <td><?= isset($val->tahunJurnal) ? $val->tahunJurnal : '-' ?></td>

            <td class="text-center">
              <!-- <a class="btn btn-xs btn-warning" href="?m=jurnal_ubah.php&ID=<?= $val->id ?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a> -->
              <a class="btn btn-xs btn-danger notif-hapus" href="aksi.php?act=jurnal_hapus&ID=<?= $val->id ?>&nidn=<?= $val->id_dosen ?>&id_kriteria=<?= $val->id_kriteria ?>"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
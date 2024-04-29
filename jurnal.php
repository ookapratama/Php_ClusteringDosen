<?php
$prodi = $_REQUEST['prodi_id'];
// $rows = $db->get_results("SELECT a.id_dosen, ra.id_kriteria, ra.nilai, a.hitung           
//         FROM tb_rel_dosen ra 
//         	INNER JOIN tb_dosen a ON a.id_dosen = ra.id_dosen
//             WHERE a.prodi_id='$prodi'
//         ORDER BY ra.id_dosen, ra.id_kriteria");

// $rows = $db->get_results("SELECT a.id_dosen, ra.id_kriteria, ra.nilai, a.hitung           
//         FROM tb_rel_dosen ra 
//         	INNER JOIN tb_dosen a ON a.id_dosen = ra.id_dosen
//         ORDER BY ra.id_dosen, ra.id_kriteria");

$rows = $db->get_results("SELECT a.id, a.judul_jurnal, b.nama_dosen, b.kode_dosen, c.nama_bidangilmu 
        FROM tb_penelitian a 
        INNER JOIN tb_dosen b ON a.kode_dosen = b.id_dosen
        INNER JOIN tb_bidangilmu c ON a.bidang_ilmu = c.id_bidangilmu
        ");

$data = array();

$get_dosen = $db->get_row("SELECT * FROM tb_dosen WHERE id_dosen='$_GET[ID]'");


foreach ($rows as $row) {
  $data[$row->id_dosen][$row->id_kriteria]  = $row->nilai;
}
?>
<div class="page-header">
  <h1>Jurnal Penelitian Dosen &raquo; <small><?= $get_dosen->nama_dosen ?></h1>
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
                  echo '<a class="btn btn-success" href="?m=dosen_tambah"><span class="glyphicon glyphicon-pencil"></span> Tambah Data</a>';
                endif
                ?>
              </div>
              <div class="form-group pull-right col-md-2">
                <?php
                $status = get_prodi_status();
                if ($status) :
                  echo '<a class="btn btn-danger" href="?m=rel_dosen"><span class="glyphicon glyphicon-pencil"></span> Kembali</a>';
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
    <table id="tabel1" class="table table-bordered table-hover table-striped dt-responsive nowrap" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Kode</th>
          <th>Nama Dosen</th>
          <th>Judul Jurnal</th>
          <th>Bidang Ilmu</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($rows as $key => $val) : ?>
          <tr>
            <td><?= $val->kode_dosen ?></td>
            <td><?= $val->nama_dosen ?></td>
            <td><?= $val->judul_jurnal ?></td>
            <td><?= $val->nama_bidangilmu ?></td>

            <td class="text-center">
              <a class="btn btn-xs btn-warning" href="?m=jurnal_ubah.php&ID=<?= $val->id ?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
              <a class="btn btn-xs btn-danger notif-hapus" href="aksi.php?act=jurnal_hapus&ID=<?= $val->id ?>"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
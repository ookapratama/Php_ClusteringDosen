<?php

$prodi = $_REQUEST['prodi_id'];
$rows = $db->get_results("SELECT a.id_dosen, ra.id_kriteria, ra.nilai, ra.penelitian, ra.pengajaran, 
                        ra.bimbingan, a.hitung, a.prodi_id, c.kode_kriteria, c.nama_kriteria    
                        FROM tb_rel_dosen ra 
                            INNER JOIN tb_dosen a ON a.id_dosen = ra.id_dosen
                            INNER JOIN tb_kriteria c ON c.id_kriteria = ra.id_kriteria
                        ORDER BY ra.id_dosen, ra.id_kriteria DESC
                        ");

$data = array();
$criteria = array();

foreach ($rows as $row) {
    $data[$row->id_dosen][$row->id_kriteria]  = array(
        'nilai'         => $row->penelitian + $row->pengajaran + $row->bimbingan,
        'penelitian'    => $row->penelitian,
        'pengajaran'    => $row->pengajaran,
        'bimbingan'     => $row->bimbingan,
        'id_kriteria'   => $row->id_kriteria,
        'kode_kriteria' => $row->kode_kriteria,
        'nama_kriteria' => $row->nama_kriteria,
    );
    $criteria[$row->id_kriteria] = $row->nama_kriteria;
}
?>
<div class="page-header">
    <h1>Hasil Clustering</h1>
</div>
<div class="panel panel-default">
    <div class="panel">
        <div class="row">
            <div class="col-sm-12">
                <form method="POST">
                    <center>
                        <div class="row">
                            <?php if (($_REQUEST['prodi_id']) == !0) { ?>
                                <div class="form-group col-md-1 col-xs-12">
                                    <a class="btn btn-success" href="cluster_cetak.php?m=cluster&prodi=<?= $_REQUEST['prodi_id']; ?>"><span class="glyphicon glyphicon-download-alt"></span> Download Hasil Clustering</a>
                                </div>
                            <?php } ?>
                        </div>
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
                    <th>Bidang Ilmu / Cluster</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $val) : ?>
                    <tr>
                        <td><?= $ALTERNATIF[$key]->kode_dosen ?></td>
                        <td><?= $ALTERNATIF[$key]->nama_dosen ?></td>
                        <td>
                            <?php
                            // Determine the cluster/class based on the dominant criterion
                            $maxKey = null;
                            $maxValue = null;

                            foreach ($criteria as $id => $name) {
                                if (isset($val[$id]) && ($maxValue === null || $val[$id]['nilai'] > $maxValue)) {
                                    $maxValue = $val[$id]['nilai'];
                                    $maxKey = $id;
                                }
                            }

                            if ($maxKey !== null) {
                                $kelas = '';
                                switch ($criteria[$maxKey]) {
                                    case 'Komputer':
                                        $kelas = 'K1';
                                        break;
                                    case 'Sistem Informasi':
                                        $kelas = 'K2';
                                        break;
                                    case 'Elektro':
                                        $kelas = 'K3';
                                        break;
                                    case 'Manajemen Bisnis':
                                        $kelas = 'K4';
                                        break;
                                    case 'Sains':
                                        $kelas = 'K5';
                                        break;
                                    default:
                                        $kelas = 'Tidak ada';
                                        break;
                                }
                                echo $criteria[$maxKey] . ' (' .  $kelas . ')';
                            } else {
                                echo 'Tidak ada';
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
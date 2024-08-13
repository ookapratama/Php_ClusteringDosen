<?php
if ($_SESSION['login']) {
    // Ambil data dosen berdasarkan ID yang diterima dari parameter
    $dosen_id = $_GET['ID'];
    $dosen_row = $db->get_row("SELECT * FROM tb_dosen WHERE id_dosen='$dosen_id'");

    // Ambil data prodi berdasarkan prodi_id dari data dosen
    $prodi_id = $dosen_row->prodi_id; // Asumsi ada kolom 'prodi_id' di tabel 'tb_dosen'
    $prodi_row = $db->get_row("SELECT * FROM tb_prodi WHERE prodi_id='$prodi_id'");

    // Jika prodi tidak ditemukan, berikan nilai default
    $prodi_nama = $prodi_row ? $prodi_row->nama_prodi : 'Tidak Diketahui';
?>
<div class="panel panel-primary">
    <div class="panel-header">
        <h2 class="text-center">Detail Dosen</h2><hr/>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="col-xs-4">Nidn</td>
                            <td class="col-xs-8 text-bold"><?= $dosen_row->nidn ?></td>
                        </tr>
                        <tr>
                            <td>Nama Dosen</td>
                            <td><?= $dosen_row->nama_dosen ?></td>
                        </tr>
                        <tr>
                            <td>Prodi</td>
                            <td>
                                <?= $prodi_nama ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Pendidikan S1</td>
                            <td><?= $dosen_row->pendidikan_s1 ?></td>
                        </tr>
                        <tr>
                            <td>Pendidikan S2</td>
                            <td><?= $dosen_row->pendidikan_s2 ?></td>
                        </tr>
                        <tr>
                            <td>Pendidikan S3</td>
                            <td><?= $dosen_row->pendidikan_s3 ?></td>
                        </tr>
                        <tr>
                            <td>Cluster</td>
                            <td><?= $dosen_row->nama_bidangilmu ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 text-center">
                <a class="btn btn-success btn-xs" href="dosen_formulir_cetak.php?m=dosen_detail&ID=<?= $dosen_row->id_dosen ?>"><span class="glyphicon glyphicon-download-alt"></span> Download</a>
                <a class="btn btn-danger btn-xs" href="?m=dosen"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>
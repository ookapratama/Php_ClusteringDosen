<?php
    if($_SESSION['login']) {
    $row = $db->get_row("SELECT * FROM tb_dosen WHERE id_dosen='$_GET[ID]'"); 
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
                            <td class="col-xs-4">Kode</td>
                            <td class="col-xs-8 text-bold"><?=$row->kode_dosen?></td>
                        </tr>
                        <tr>
                            <td>Nama Dosen</td>
                            <td><?=$row->nama_dosen?></td>
                        </tr>
                        <tr>
                            <td>NIDN</td>
                            <td><?=$row->nidn?></td>
                        </tr>
                        <!-- <tr>
                            <td>NODOS</td>
                            <td><?=$row->nodos?></td>
                        </tr> -->
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><?=$row->jenis_kelamin?></td>
                        </tr>
                        <!-- <tr>
                            <td>Foto</td>
                            <td>
                            <?php if (($row->gambar)==null) { echo "Foto tidak tersedia"; } else { ?>
                            <p class="helper-block">
                                <img class="thumbnail" src="assets/images/dosen/<?=$row->gambar?>" height="200">
                            </p>
                            <?php } ?>
                            </td>
                        </tr> -->
                        <tr>
                            <td>Pendidikan S1</td>
                            <td><?=$row->pendidikan_s1?></td>
                        </tr>
                        <tr>
                            <td>Pendidikan S2</td>
                            <td><?=$row->pendidikan_s2?></td>
                        </tr>
                        <tr>
                            <td>Pendidikan S3</td>
                            <td><?=$row->pendidikan_s3?></td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td><?=$row->tempat_lahir?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td><?=tgl_indo($row->tanggal_lahir)?></td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td><?=$row->agama?></td>
                        </tr>
                        <!-- <tr>
                            <td>Alamat</td>
                            <td><?=$row->alamat?></td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 text-center">
                <a class="btn btn-success btn-xs" href="dosen_formulir_cetak.php?m=dosen_detail&ID=<?=$row->id_dosen?>"><span class="glyphicon glyphicon-download-alt"></span> Download</a>
                <a class="btn btn-danger btn-xs" href="?m=dosen"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </div>
    </div>
</div>
<?php } ?> 
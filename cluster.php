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
                        <div class="form-group pull-right col-md-3 col-md-offset-1 col-xs-12">
                            <select class="form-control" name="prodi_id" onchange="form.submit()">
                                <option readonly="readonly" value="0">-- Pilih Prodi --</option>
                                <?=get_prodiview_option(set_value('prodi_id'))?>
                            </select>
                        </div>
                        <?php if(($_REQUEST['prodi_id'])==!0){ ?>
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
                    <th>No</th>
                    <th>Cluster/Kelas</th>
                    <th>Kode</th>
                    <th>Nama Dosen</th>
                    <th>Jenis Kelamin</th>
                    <th>Pendidikan Terakhir</th>
                    <th>Tempat/Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
                $prodi   = $_REQUEST['prodi_id'];
                // $rows    = $db->get_results("SELECT * FROM tb_dosen WHERE prodi_id='$prodi' AND nama_bidangilmu!='0' ORDER BY nama_bidangilmu ASC");
                $rows    = $db->get_results("SELECT * FROM tb_dosen WHERE nama_bidangilmu!='0' ORDER BY nama_bidangilmu ASC");
                $no=0;
                foreach($rows as $row):
            ?>
            <tr>
                <td><?=++$no ?></td>
                <td><?=$row->nama_bidangilmu?></td>
                <td><?=$row->kode_dosen?></td>
                <td><?=$row->nama_dosen?></td>
                <td><?=$row->jenis_kelamin?></td>
                <td><?=$row->pendidikan_terakhir?></td>
                <td><?=$row->tempat_lahir.", ".tgl_indo($row->tanggal_lahir)?></td>
                <td><?=$row->agama?></td>
                <td class="text-center">
                    <a class="btn btn-xs btn-warning" href="?m=cluster_ubah&ID=<?=$row->id_dosen?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
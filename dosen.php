<div class="page-header">
    <h1>Data Dosen</h1>
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
                            <!-- <div class="form-group pull-right col-md-3 col-md-offset-1">
                            <select class="form-control" name="prodi_id" onchange="form.submit()">
                                <option readonly="readonly">-- Pilih Prodi --</option>
                                <?= get_prodiview_option(set_value('prodi_id')) ?>
                            </select>
                        </div> -->
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
                    <th>Kode</th>
                    <th>Nama Dosen</th>
                    <th>Jenis Kelamin</th>
                    <th>Pendidikan S1</th>
                    <th>Pendidikan S2</th>
                    <th>Pendidikan S3</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $prodi   = $_REQUEST['prodi_id'];
            // $rows    = $db->get_results("SELECT * FROM tb_dosen WHERE prodi_id='$prodi' ORDER BY id_dosen");
            $rows    = $db->get_results("SELECT * FROM tb_dosen");
            $no = 0;
            foreach ($rows as $row) :
            ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->kode_dosen ?></td>
                    <td><?= $row->nama_dosen ?></td>
                    <td><?= $row->jenis_kelamin ?></td>
                    <td><?= $row->pendidikan_s1 ?></td>
                    <td><?= $row->pendidikan_s2 ?></td>
                    <td><?= $row->pendidikan_s3 ?></td>
                    <td class="text-center">
                        <a class="btn btn-xs btn-info" href="?m=dosen_detail&ID=<?= $row->id_dosen ?>"><span class="glyphicon glyphicon-th-list"></span> Detail</a>
                        <a class="btn btn-xs btn-warning" href="?m=dosen_ubah&ID=<?= $row->id_dosen ?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
                        <a class="btn btn-xs btn-danger notif-hapus" href="aksi.php?act=dosen_hapus&ID=<?= $row->id_dosen ?>"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
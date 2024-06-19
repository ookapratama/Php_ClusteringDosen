<div class="page-header">
    <h1>Data Rules</h1>
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
                                    echo '<a class="btn btn-success" href="?m=rules_tambah"><span class="glyphicon glyphicon-pencil"></span> Tambah Data</a>';
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
                    <th></th>
                    <th>Pengajaran</th>
                    <th>Penelitian</th>
                    <th>Bimbingan</th>
                    <th>Hasil</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $prodi   = $_REQUEST['prodi_id'];
            // $rows    = $db->get_results("SELECT * FROM tb_dosen WHERE prodi_id='$prodi' ORDER BY id_dosen");
            $rows    = $db->get_results("SELECT * FROM tb_rules");
            $no = 0;
            foreach ($rows as $row) :
            ?>
                <tr>
                    <td>IF</td>
                    <td><?= $row->pengajaran ?></td>
                    <td><?= $row->penelitian ?></td>
                    <td><?= $row->bimbingan ?></td>
                    <td><?= $row->hasil ?></td>
                    <td class="text-center">
                        <a class="btn btn-xs btn-warning" href="?m=rules_ubah&ID=<?= $row->id ?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
                        <a class="btn btn-xs btn-danger notif-hapus" href="aksi.php?act=rules_hapus&ID=<?= $row->id ?>"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
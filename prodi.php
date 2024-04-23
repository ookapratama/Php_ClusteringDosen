<div class="page-header">
    <h1>PRODI UNDIPA</h1>
</div>
<div class="panel panel-default">
    <div class="panel text-center">
        <a class="btn btn-success btn-sm" href="?m=prodi_tambah"><span class="glyphicon glyphicon-pencil"></span> Tambah Data</a>
    </div>
    <div class="table-responsive">
        <table id="tabel1" class="table table-bordered table-hover table-striped dt-responsive nowrap" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Prodi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $q = esc_field($_GET['q']);
        $rows = $db->get_results("SELECT * FROM tb_prodi WHERE nama_prodi LIKE '%$q%' ORDER BY prodi_id DESC");
        $no=0;
        foreach($rows as $row):?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?=$row->nama_prodi ?></td>
            <td><?=$row->status ?></td>
            <td class="text-center">
                <a class="btn btn-xs btn-warning" href="?m=prodi_ubah&ID=<?=$row->prodi_id?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
                <a class="btn btn-xs btn-danger notif-hapus" href="aksi.php?act=prodi_hapus&ID=<?=$row->prodi_id?>"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
            </td>
        </tr>
        <?php endforeach;?>
        </table>
    </div>
</div>
<div class="page-header">
    <h1>Bidang Ilmu</h1>
</div>
<div class="panel panel-default">
    <div class="panel text-center">        
        <a class="btn btn-success btn-sm" href="?m=bidangilmu_tambah"><span class="glyphicon glyphicon-pencil"></span> Tambah Data</a>
    </div>
    <div class="table-responsive">
        <table id="tabel1" class="table table-bordered table-hover table-striped dt-responsive nowrap" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Bidang Ilmu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $q = esc_field($_GET['q']);
        $rows = $db->get_results("SELECT * FROM tb_bidangilmu WHERE nama_bidangilmu LIKE '%$q%' ORDER BY id_bidangilmu");
        $no=0;
        foreach($rows as $row):?>
        <tr>
            <td><?=++$no ?></td>
            <td><?=$row->nama_bidangilmu ?></td>
            <td class="text-center">
                <a class="btn btn-xs btn-warning" href="?m=bidangilmu_ubah&ID=<?=$row->id_bidangilmu?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
                <a class="btn btn-xs btn-danger notif-hapus" href="aksi.php?act=bidangilmu_hapus&ID=<?=$row->id_bidangilmu?>"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
            </td>
        </tr>
        <?php endforeach;?>
        </table>
    </div>
</div>
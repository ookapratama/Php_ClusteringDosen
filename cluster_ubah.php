<?php
    $row = $db->get_row("SELECT * FROM tb_dosen WHERE id_dosen='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Ubah Cluster Manual</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php';?>
        <form method="post" action="?m=cluster_ubah&ID=<?=$row->id_dosen?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Dosen <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_dosen" value="<?=$row->nama_dosen?>" readonly=""/>
            </div>
            <div class="form-group">
                <label>Cluster/Bidang Ilmu <span class="text-danger">*</span></label>
                <select class="form-control" name="cluster">
                    <option readonly="readonly">- Pilih Cluster -</option>
                    <?=get_cluster_option($row->nama_bidangilmu)?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Update Data</button>
                <a class="btn btn-danger" href="?m=cluster"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>
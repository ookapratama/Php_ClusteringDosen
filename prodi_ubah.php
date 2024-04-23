<?php
    $row = $db->get_row("SELECT * FROM tb_prodi WHERE prodi_id='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Ubah Prodi</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php';?>
        <form method="post">
            <div class="form-group">
                <label>Prodi <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_prodi" value="<?=set_value('nama_prodi', $row->nama_prodi)?>"/>
            </div>
            <div class="form-group">
                <label>Status <span class="text-danger">*</span></label>
                <select class="form-control" name="status">
                    <option readonly="readonly">- Pilih Status -</option>
                    <?=get_status_prodi_option($row->status)?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=prodi"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>
<div class="page-header">
    <h1>Tambah Prodi</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php';?>
        <form method="post">
            <div class="form-group">
                <label>Prodi <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_prodi" value="<?=set_value('nama_prodi')?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=prodi"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>
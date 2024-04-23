<?php 
    $status = get_prodi_status();
    if($status):
?>
<div class="page-header">
    <h1>Tambah Dosen</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php';?>
        <form method="post" action="?m=dosen_tambah" enctype="multipart/form-data">
            <div class="form-group">
                <label>Kode Prodi<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_dosen" value="<?=set_value('kode_dosen', kode_oto_dosen('kode_dosen', 'tb_dosen', 'A', 4))?>" readonly=""/>
            </div>
            <div class="form-group">
                <label>Nama Dosen <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_dosen" value="<?=set_value('nama_dosen')?>" placeholder="Isi Nama Lengkap "/>
            </div>
            <div class="form-group">
                <label>NIDN <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nidn" value="<?=set_value('nidn')?>" placeholder="Isi NIDN"/>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin <span class="text-danger">*</span></label>
                <select class="form-control" name="jenis_kelamin">
                    <option readonly="readonly">- Pilih Jenis Kelamin -</option>
                    <?=get_jeniskelamin_option(set_value('jenis_kelamin'))?>
                </select>
            </div>
            <div class="form-group">
                <label>Pendidikan Terakhir <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="pendidikan_terakhir" value="<?=set_value('pendidikan_terakhir')?>" placeholder="Isi Data"/>
            </div>
            <div class="form-group">
                <label>Tempat Lahir <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="tempat_lahir" value="<?=set_value('tempat_lahir')?>" placeholder="Isi Tempat Lahir Anda"/>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir <span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="tanggal_lahir" value="<?=set_value('tanggal_lahir')?>" placeholder="Isi Tanggal Lahir Anda"/>
            </div>
            <div class="form-group">
                <label>Agama <span class="text-danger">*</span></label>
                <select class="form-control" name="agama">
                    <option readonly="readonly">- Pilih Agama -</option>
                    <?=get_agama_option(set_value('agama'))?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary notif-registrasi"><span class="glyphicon glyphicon-send"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=dosen"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>
<?php endif ?>
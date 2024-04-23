<?php
    $row = $db->get_row("SELECT * FROM tb_dosen WHERE id_dosen='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Ubah Data Dosen</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php';?>
        <form method="post" action="?m=dosen_ubah&ID=<?=$row->id_dosen?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_dosen" value="<?=$row->kode_dosen?>" readonly=""/>
            </div>
            <div class="form-group">
                <label>Nama Dosen <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_dosen" value="<?=$row->nama_dosen?>" placeholder="Isi Nama Lengkap Anda"/>
            </div>
            <div class="form-group">
                <label>NIDN <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nidn" value="<?=$row->nidn?>" placeholder="Isi NIDN"/>
            </div>
            <div class="form-group">
                <label>NODOS <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nodos" value="<?=$row->nodos?>" placeholder="Isi nodos Anda"/>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin <span class="text-danger">*</span></label>
                <select class="form-control" name="jenis_kelamin">
                    <option readonly="readonly">- Pilih Jenis Kelamin -</option>
                    <?=get_jeniskelamin_option($row->jenis_kelamin)?>
                </select>
            </div>
            <div class="form-group">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <label>Foto (Latar Belakang Biru)</label>
                    <input class="form-control" type="file" name="gambar" value="<?=$_FILES['gambar']?>" onchange="readURL(this);"/>
                    <br />
                    <?php if (($row->gambar)==null) { echo "Foto tidak tersedia"; } else { ?>
                    <p class="helper-block"> Foto saat ini
                        <img class="thumbnail" src="assets/images/dosen/<?=$row->gambar?>" height="200">
                    </p>
                    <?php } ?>
                </div>
                <div class="col-xs-12 col-md-6">
                    <img id="preview_gambar" class="img-thumbnail pull-right"/>
                </div>
            </div>
            </div>
            <div class="form-group">
                <label>Pendidikan Terakhir <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="pendidikan_terakhir" value="<?=$row->pendidikan_terakhir?>" placeholder="Isi Asal Sekolah Anda"/>
            </div>
            <div class="form-group">
                <label>Tempat Lahir <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="tempat_lahir" value="<?=$row->tempat_lahir?>" placeholder="Isi Tempat Lahir Anda"/>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir <span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="tanggal_lahir" value="<?=$row->tanggal_lahir?>" placeholder="Isi Tanggal Lahir Anda"/>
            </div>
            <div class="form-group">
                <label>Agama <span class="text-danger">*</span></label>
                <select class="form-control" name="agama">
                    <option readonly="readonly">- Pilih Agama -</option>
                    <?=get_agama_option($row->agama)?>
                </select>
            </div>
            <div class="form-group">
                <label>Alamat Lengkap <span class="text-danger">*</span></label>
                <textarea class="form-control" type="text" name="alamat" placeholder="Isi Alamat Anda"><?=$row->alamat?></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Update Data</button>
                <a class="btn btn-danger" href="?m=dosen"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>
<?php
$row = $db->get_row("SELECT * FROM tb_dosen WHERE id_dosen='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Data Dosen</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php'; ?>
        <form method="post" action="?m=dosen_ubah&ID=<?= $row->id_dosen ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_dosen" value="<?= $row->kode_dosen ?>" readonly="" />
            </div>
            <div class="form-group">
                <label>Nama Dosen <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_dosen" value="<?= $row->nama_dosen ?>" placeholder="Isi Nama Lengkap Anda" />
            </div>
            <div class="form-group">
                <label>NIDN <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nidn" value="<?= $row->nidn ?>" placeholder="Isi NIDN" />
            </div>
            <div class="form-group">
                <label>Jenis Kelamin <span class="text-danger">*</span></label>
                <select class="form-control" name="jenis_kelamin">
                    <option readonly="readonly">- Pilih Jenis Kelamin -</option>
                    <?= get_jeniskelamin_option($row->jenis_kelamin) ?>
                </select>
            </div>


            <div class="form-group">
                <label>Tempat Lahir <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="tempat_lahir" value="<?= $row->tempat_lahir ?>" placeholder="Isi Tempat Lahir Anda" />
            </div>
            <div class="form-group">
                <label>Tanggal Lahir <span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="tanggal_lahir" value="<?= $row->tanggal_lahir ?>" placeholder="Isi Tanggal Lahir Anda" />
            </div>
            <div class="form-group">
                <label>Agama <span class="text-danger">*</span></label>
                <select class="form-control" name="agama">
                    <option readonly="readonly">- Pilih Agama -</option>
                    <?= get_agama_option($row->agama) ?>
                </select>
            </div>

            <div class="form-group">
                <label>Jenjang Pendidikan S1<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="pendidikan_s1" value="<?= $row->pendidikan_s1 ?>" placeholder="Isi Data" />
            </div>
            <div class="form-group">
                <label>Jenjang Pendidikan S2 <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="pendidikan_s2" value="<?= $row->pendidikan_s2 ?>" placeholder="Isi Data" />
            </div>
            <div class="form-group">
                <label>Jenjang Pendidikan S3 <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="pendidikan_s3" value="<?= $row->pendidikan_s3 ?>" placeholder="Isi Data" />
            </div>

            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Update Data</button>
                <a class="btn btn-danger" href="?m=dosen"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>
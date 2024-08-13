<?php
$status = get_prodi_status();
if ($status) :
?>
    <div class="page-header">
        <h1>Tambah Dosen</h1>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?php if ($_POST) include 'aksi.php'; ?>
            <form method="post" action="?m=dosen_tambah" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Pilih Prodi<span class="text-danger">*</span></label>
                    <select class="form-control" name="jurusan" id="jurusan" onchange="pilihProdi()">
                        <option readonly="readonly">- Pilih Prodi -</option>
                        <?= get_prodiview_option() ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>NIDN<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nidn" id="nidn" value="" />
                </div>

                <div class="form-group">
                    <label>Nama Dosen <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nama_dosen" value="<?= set_value('nama_dosen') ?>" placeholder="Isi Nama Lengkap " />
                </div>
            
                <div class="form-group">
                    <label>Jenis Kelamin <span class="text-danger">*</span></label>
                    <select class="form-control" name="jenis_kelamin">
                        <option readonly="readonly">- Pilih Jenis Kelamin -</option>
                        <?= get_jeniskelamin_option(set_value('jenis_kelamin')) ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Jenjang Pendidikan S1<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="pendidikan_s1" value="<?= set_value('pendidikan_s1') ?>" placeholder="Isi Data" />
                </div>
                <div class="form-group">
                    <label>Jenjang Pendidikan S2 <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="pendidikan_s2" value="<?= set_value('pendidikan_s2') ?>" placeholder="Isi Data" />
                </div>
                <div class="form-group">
                    <label>Jenjang Pendidikan S3 <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="pendidikan_s3" value="<?= set_value('pendidikan_s3') ?>" placeholder="Isi Data" />
                </div>

                <!-- <div class="form-group">
                    <label>Mata Kuliah yang diajarkan<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="matkul_ajar" value="<?= set_value('tanggal_lahir') ?>" placeholder="Isi Mata kuliah" />
                </div>
                <div class="form-group">
                    <label>Judul Penelitian<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="matkul_ajar" value="<?= set_value('tanggal_lahir') ?>" placeholder="Isi Judul Penelitian" />
                </div>

                <div class="form-group">
                    <label>BIdang Ilmu <span class="text-danger">*</span></label>
                    <select class="form-control" name="agama">
                        <option readonly="readonly">- Pilih Bidang Keilmuan -</option>
                        <?= get_agama_option(set_value('agama')) ?>
                    </select>
                </div> -->


                <div class="form-group">
                    <button class="btn btn-primary notif-registrasi"><span class="glyphicon glyphicon-send"></span> Simpan</button>
                    <a class="btn btn-danger" href="?m=dosen"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                </div>
            </form>
        </div>
    </div>
<?php endif ?>
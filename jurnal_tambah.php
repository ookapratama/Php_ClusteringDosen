<?php
//$status = get_prodi_status();
//if ($status) :
$id_dosen = $_GET['ID'];

session_start();

?>
<div class="page-header">
    <h1>Tambah Jurnal Penelitian</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php'; ?>
        <form method="post" action="?m=jurnal_tambah" enctype="multipart/form-data">
            <div class="form-group">
                <label>Pilih Dosen<span class="text-danger">*</span></label>
                <select class="form-control" name="kode_dosen" id="kode_dosen">
                    <option readonly="readonly">- Pilih Dosen -</option>
                    <?= get_dosen_option() ?>
                </select>
            </div>

            <div class="form-group">
                <input class="form-control" type="hidden" name="prodi_id" value="<?= $_SESSION['prodi_dosen_global'] ?>" placeholder="Prodi ID" />
            </div>

            <div class="form-group">
                <label>Nama Jurnal Penelitian<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="judul_jurnal" placeholder="Isi Judul Jurnal" />
            </div>

            <div class="form-group">
                <label>Mata Kuliah<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="mata_kuliah" placeholder="Isi Mata Kuliah" />
            </div>

            <div class="form-group">
                <label>Pilih Bidang Keilmuan<span class="text-danger">*</span></label>
                <select class="form-control" name="id_kriteria" id="id_kriteria" onchange="pilihProdi()">
                    <option readonly="readonly">- Pilih Bidang Ilmu -</option>
                    <?= get_kriteria_option() ?>
                </select>
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
                <a class="btn btn-danger" href="?m=jurnal&ID=<?= $_SESSION['id_dosen_global'] ?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>
<?php //endif 
?>
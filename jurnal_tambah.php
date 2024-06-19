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
    <div class="col-sm-12">
        <?php if ($_POST) include 'aksi.php'; ?>
        <form method="post" action="?m=jurnal_tambah" enctype="multipart/form-data">

            <div class="row">
                <div class="col-md-6">

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


                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Pilih Bidang Penelitian<span class="text-danger">*</span></label>
                        <select class="form-control" name="penelitian" id="penelitian" onchange="pilihProdi()">
                            <option readonly="readonly">- Pilih Bidang Ilmu -</option>
                            <?= get_kriteria_option() ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Pilih Bidang Pengajaran<span class="text-danger">*</span></label>
                        <select class="form-control" name="pengajaran" id="pengajaran" onchange="pilihProdi()">
                            <option readonly="readonly">- Pilih Bidang Ilmu -</option>
                            <?= get_kriteria_option() ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Pilih Bidang Bimbingan<span class="text-danger">*</span></label>
                        <select class="form-control" name="bimbingan" id="bimbingan" onchange="pilihProdi()">
                            <option readonly="readonly">- Pilih Bidang Ilmu -</option>
                            <?= get_kriteria_option() ?>
                        </select>
                    </div>
                </div>
                    <div class="form-group">
                        <button class="btn btn-primary notif-registrasi"><span class="glyphicon glyphicon-send"></span> Simpan</button>
                        <a class="btn btn-danger" href="?m=jurnal&ID=<?= $_SESSION['id_dosen_global'] ?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                    </div>
            </div>


        </form>
    </div>
</div>
<?php //endif 
?>
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

            <input class="form-control" type="hidden" name="prodi_id" value="<?= $_SESSION['prodi_dosen_global'] ?>" placeholder="Prodi ID" />
            <div class="row">
                <div class="form-group">
                    <label>Pilih Dosen<span class="text-danger">*</span></label>
                    <select class="form-control" name="kode_dosen" id="kode_dosen">
                        <option readonly="readonly">- Pilih Dosen -</option>
                        <?= get_dosen_option() ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <h5>Bidang Penelitian</h5>
                    <div class="form-group">
                        <label>Nama Jurnal Penelitian<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="judul_jurnal" placeholder="Isi Judul Jurnal" />
                    </div>
                    <div class="form-group">
                        <label>Pilih Bidang Penelitian<span class="text-danger">*</span></label>
                        <select class="form-control" name="penelitian" id="penelitian" onchange="pilihProdi()">
                            <option readonly="readonly" value="">- Pilih Bidang Ilmu -</option>
                            <?= get_kriteria_option() ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tahunn Jurnal<span class="text-danger">*</span></label>
                        <select class="form-control" name="tahunJurnal" id="penelitian">
                            <option readonly="readonly">- Pilih Tahun Jurnal -</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Bidang Pengajaran</h5>

                    <div class="form-group">
                        <label>Mata Kuliah<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="mata_kuliah" placeholder="Isi Mata Kuliah" />
                    </div>
                    <div class="form-group">
                        <label>Pilih Bidang Pengajaran<span class="text-danger">*</span></label>
                        <select class="form-control" name="pengajaran" id="pengajaran" onchange="pilihProdi()">
                            <option readonly="readonly" value="">- Pilih Bidang Ilmu -</option>
                            <?= get_kriteria_option() ?>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label>Tahunn Ajaran<span class="text-danger">*</span></label>
                        <select class="form-control" name="tahunAjaran" id="penelitian" >
                            <option readonly="readonly">- Pilih Tahun Ajaran -</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>
                    </div> -->
                </div>
                <div class="col-md-4">
                    <h5>Bidang Bimbingan</h5>
                    <div class="form-group">
                        <label>Bimbingan Mahasiswa<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="judul_bimbingan" placeholder="Isi Bimbingan Mahasiswa" />
                    </div>
                    <div class="form-group">
                        <label>Pilih Bidang Bimbingan<span class="text-danger">*</span></label>
                        <select class="form-control" name="bimbingan" id="bimbingan" onchange="pilihProdi()">
                            <option readonly="readonly" value="">- Pilih Bidang Ilmu -</option>
                            <?= get_kriteria_option() ?>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label>Tahunn Bimbingan<span class="text-danger">*</span></label>
                        <select class="form-control" name="tahunBimbingan" id="penelitian" >
                            <option readonly="readonly">- Pilih Tahun Bimbingan -</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>
                    </div> -->
                </div>
            </div>
            <div class="form-group ">
                <button class="btn btn-primary notif-registrasi"><span class="glyphicon glyphicon-send"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=jurnal&ID=<?= $_SESSION['id_dosen_global'] ?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>



        </form>
    </div>
</div>
<?php //endif 
?>
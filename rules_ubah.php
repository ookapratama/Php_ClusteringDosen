<?php
$row = $db->get_row("SELECT * FROM tb_rules WHERE id='$_GET[ID]'");

?>
    <div class="page-header">
        <h1>Ubah Rules</h1>
    </div>
    <div class="row">
        <?php if ($_POST) include 'aksi.php'; ?>
        <form method="post" action="?m=rules_ubah" enctype="multipart/form-data">
            <input type="hidden" name="id_rules" value="<?= $row->id ?>">
            <div class="row">
                <div class="col-md-3">

                    <div class="form-group">
                        <label>Penelitian<span class="text-danger">*</span></label>
                        <select class="form-control" name="penelitian" id="jurusan">
                            <option readonly="readonly">- Pilih Kriteria -</option>
                            <?= get_kriteria_name_option($row->penelitian) ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Pengajaran<span class="text-danger">*</span></label>
                        <select class="form-control" name="pengajaran" id="jurusan">
                            <option readonly="readonly">- Pilih Kriteria -</option>
                            <?= get_kriteria_name_option($row->pengajaran) ?>
                        </select>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Bimbingan<span class="text-danger">*</span></label>
                        <select class="form-control" name="bimbingan" id="jurusan">
                            <option readonly="readonly">- Pilih Kriteria -</option>
                            <?= get_kriteria_name_option($row->bimbingan) ?>
                        </select>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Maka Hasilnya :<span class="text-danger">*</span></label>
                        <select class="form-control" name="hasil" id="jurusan">
                            <option readonly="readonly">- Pilih Kriteria -</option>
                            <?= get_kriteria_name_option($row->hasil) ?>
                        </select>
                    </div>

                </div>
            </div>




            <div class="form-group">
                <button class="btn btn-primary notif-registrasi"><span class="glyphicon glyphicon-send"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=rules"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
<?php ?>
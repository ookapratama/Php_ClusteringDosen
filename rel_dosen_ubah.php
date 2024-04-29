<?php
$row = $db->get_row("SELECT * FROM tb_dosen WHERE id_dosen='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Ubah Nilai Bobot &raquo; <small><?=$row->nama_dosen?></small></h1>
</div>
<div class="row">
    <div class="col-sm-4">
        <form method="post" action="aksi.php?act=rel_dosen_ubah&ID=<?=$row->id_dosen?>">
        <!-- <div class="form-group">
            <label>Lakukan Perhitungan? (Ya/Tidak)</label>
            <select class="form-control" name="hitung">
                <?=get_hitung_option($row->hitung)?>
            </select>
        </div> -->
        <?php
        $rows = $db->get_results("SELECT ra.ID, k.kode_kriteria, k.nama_kriteria, ra.nilai FROM tb_rel_dosen ra INNER JOIN tb_kriteria k ON k.id_kriteria=ra.id_kriteria  WHERE id_dosen='$_GET[ID]' ORDER BY kode_kriteria");
        foreach($rows as $row):?>
        <div class="form-group">
            <label><?=$row->nama_kriteria?></label>    
            <input class="form-control" type="text" name="ID-<?=$row->ID?>" value="<?=$row->nilai?>" />
        </div>
        <?php endforeach;?>
        <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
        <a class="btn btn-danger" href="?m=rel_dosen"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
        </form>
    </div>
</div>
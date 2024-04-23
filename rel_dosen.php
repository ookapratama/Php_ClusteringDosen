<?php
$prodi= $_REQUEST['prodi_id'];
// $rows = $db->get_results("SELECT a.id_dosen, ra.id_kriteria, ra.nilai, a.hitung           
//         FROM tb_rel_dosen ra 
//         	INNER JOIN tb_dosen a ON a.id_dosen = ra.id_dosen
//             WHERE a.prodi_id='$prodi'
//         ORDER BY ra.id_dosen, ra.id_kriteria");
$rows = $db->get_results("SELECT a.id_dosen, ra.id_kriteria, ra.nilai, a.hitung           
        FROM tb_rel_dosen ra 
        	INNER JOIN tb_dosen a ON a.id_dosen = ra.id_dosen
        ORDER BY ra.id_dosen, ra.id_kriteria");
$data = array();   
    
foreach($rows as $row){
    $data[$row->id_dosen][$row->id_kriteria]  = $row->nilai;    
}
?>
<div class="page-header">
    <h1>Nilai Bobot Dosen</h1>
</div>
<div class="panel panel-default">
    <div class="panel">
        <div class="row">
            <div class="col-sm-12">
                <form method="POST">
                    <center>
                    <div class="row">
                        <div class="form-group pull-right col-md-3 col-md-offset-1">
                            <select class="form-control" name="prodi_id" onchange="form.submit()">
                                <option readonly="readonly">-- Pilih Prodi --</option>
                                <?=get_prodiview_option(set_value('prodi_id'))?>
                            </select>
                        </div>
                    </div>
                </center>
                </form>
            </div>
        </div> 
    </div>
    <div class="table-responsive">
        <table id="tabel1" class="table table-bordered table-hover table-striped dt-responsive nowrap" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Dosen</th>
                <?php foreach($KRITERIA as $key => $val):?>
                <th><?=$val['nama']?></th>
                <?php endforeach?>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($data as $key => $val):?>
        <tr>
            <td><?=$ALTERNATIF[$key]->kode_dosen?></td>
            <td><?=$ALTERNATIF[$key]->nama_dosen?></td>
            <?php foreach($val as $k => $v):?>
            <td><?=$v?></td>               
            <?php endforeach?>
            <td class="text-center">
                <a class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-list-alt"></span> Hitung? <?=$ALTERNATIF[$key]->hitung?></a> 
                <a class="btn btn-xs btn-warning" href="?m=rel_dosen_ubah&ID=<?=$key?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>        
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
    </div>
</div>
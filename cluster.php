<?php 

$prodi = $_REQUEST['prodi_id'];
// $rows = $db->get_results("SELECT a.id_dosen, ra.id_kriteria, ra.nilai, a.hitung           
//         FROM tb_rel_dosen ra 
//         	INNER JOIN tb_dosen a ON a.id_dosen = ra.id_dosen
//             WHERE a.prodi_id='$prodi'
//         ORDER BY ra.id_dosen, ra.id_kriteria");
$rows = $db->get_results("SELECT a.id_dosen, ra.id_kriteria, ra.nilai, ra.penelitian, ra.pengajaran, 
                        ra.bimbingan,  a.hitung, a.prodi_id, c.kode_kriteria, c.nama_kriteria    
                        FROM tb_rel_dosen ra 
                            INNER JOIN tb_dosen a ON a.id_dosen = ra.id_dosen
                            INNER JOIN tb_kriteria c ON c.id_kriteria = ra.id_kriteria
                        ORDER BY ra.id_dosen, ra.id_kriteria DESC
                        
                        ");
$data = array();


foreach ($rows as $i => $row) {


    // $sort[$i] = $row->penelitian + $row->pengajaran + $row->bimbingan;

    $data[$row->id_dosen][$row->id_kriteria]  = array(
        'nilai'         => $row->penelitian + $row->pengajaran + $row->bimbingan,
        'penelitian'    => $row->penelitian,
        'pengajaran'    => $row->pengajaran,
        'bimbingan'     => $row->bimbingan,
        'id_kriteria'     => $row->id_kriteria,
        'kode_kriteria'     => $row->kode_kriteria,
        'nama_kriteria'     => $row->nama_kriteria,
    );
    // $data['penelitian']  = $row->penelitian;
    // $data['pengajaran']  = $row->pengajaran;
    // $data['bimbingan']  = $row->bimbingan;
    // die(var_dump($rows));



}
// var_dump($data);
function bubbleSort($arr)
{
    $n = count($arr);

    // Traverse through all array elements
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {

            // Swap if the element found is 
            // greater than the next element
            if ($arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }

    return $arr;
}

function bubbleSortAssociative($arr) {
    $keys = array_keys($arr);
    $n = count($keys);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($keys[$j] > $keys[$j + 1]) {
                // Tukar kunci
                $tempKey = $keys[$j];
                $keys[$j] = $keys[$j + 1];
                $keys[$j + 1] = $tempKey;
            }
        }
    }
    // Bangun ulang array berdasarkan kunci yang diurutkan
    $sortedArr = [];
    foreach ($keys as $key) {
        $sortedArr[$key] = $arr[$key];
    }
    return $sortedArr;
}


?>

<div class="page-header">
    <h1>Hasil Clustering</h1>
</div>
<div class="panel panel-default">
    <div class="panel">
        <div class="row">
            <div class="col-sm-12">
                <form method="POST">
                    <center>
                    <div class="row">
                        <!-- <div class="form-group pull-right col-md-3 col-md-offset-1 col-xs-12">
                            <select class="form-control" name="prodi_id" onchange="form.submit()">
                                <option readonly="readonly" value="0">-- Pilih Prodi --</option>
                                <?=get_prodiview_option(set_value('prodi_id'))?>
                            </select>
                        </div> -->
                        <?php if(($_REQUEST['prodi_id'])==!0){ ?>
                        <div class="form-group col-md-1 col-xs-12">
                            <a class="btn btn-success" href="cluster_cetak.php?m=cluster&prodi=<?= $_REQUEST['prodi_id']; ?>"><span class="glyphicon glyphicon-download-alt"></span> Download Hasil Clustering</a>
                        </div>
                        <?php } ?>
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
                    <!-- <th>Cluster/Kelas</th> -->
                    <th>Nama Dosen</th>
                    <?php foreach ($KRITERIA as $key => $val) : ?>
                        <th><?= $val['nama'] ?></th>
                    <?php endforeach ?>
                    <th>Cluster / Kelas</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $val) : ?>
                    <tr>
                        <?=  ''// var_dump($KRITERIA[$key]); ?>
                        <td><?= $ALTERNATIF[$key]->kode_dosen ?></td>
                        <td><?= $ALTERNATIF[$key]->nama_dosen ?></td>
                        <?php
                        $nama = [
                            4 => 'Komputer',
                            12 => 'Sistem Informasi',
                            13 => 'Elektro',
                            15 => 'Manajemen Bisnis',
                            16 => 'Sains',
                        ];
                        $sortNama = [];
                        $sort = [];
                        $nilai = 0;
                        $n_kriteria = 0;


                        foreach ($val as $k => $v) : ?>
                            <td>
                                <h5>
                                    <?php
                                    // var_dump($v['id_kriteria']);
                                    $sort['nilai'][$nilai] = $v['nilai'];
                                    $sort['nama'][$nilai] = $nama[$v['id_kriteria']];
                                    // $sort['nama'][$nilai] = $v['id_kriteria'];
                                    // var_dump($v['kode_kriteria']);

                                    // $getKritetia = $namaKriteria[$v['id_kriteria']];
                                    echo $v['nilai'];
                                    $nilai++; ?>
                                </h5>
                                <br>
                                Penelitian : <?= $v['penelitian'] ?>
                                <br>
                                Pengajaran : <?= $v['pengajaran'] ?>
                                <br>
                                Bimbingan : <?= $v['bimbingan'] ?>
                            </td>
                        <?php endforeach ?>
                        <td><?php
                            $tes = bubbleSort($sort['nilai']);
                            // $getKritetia = $sort['nama'][count($tes) - 1];
                            // var_dump($sort['nama']);
                            // echo "<br>";
                            foreach($sort['nilai'] as $index => $t) {
                                // var_dump($t);
                                $sortNama[$t] = $sort['nama'][$index];
                                
                            }
                            $urutNama = bubbleSortAssociative($sortNama);
                            // var_dump($sortNama); 
                            // var_dump(ksort($sortNama)); 
                            // $urutNama = bubbleSort($sortNama);
                            $kelas = '';
                            if (end($urutNama) == 'Komputer') {;
                                $kelas = 'K1';
                            }else if (end($urutNama) == 'Sistem Informasi') {
                                
                                $kelas = 'K2';
                            }else if (end($urutNama) == 'Elektro') {
                                
                                $kelas = 'K3';
                            }else if (end($urutNama) == 'Manajemen Bisnis') {
                                
                                $kelas = 'K4';
                            }else if (end($urutNama) == 'Sains') {
                                
                                $kelas = 'K5';
                            }
                            // var_dump($urutNama); 
                            // var_dump($tes[count($tes) - 1]);
                            // var_dump($getKriteriax);
                            echo $tes[count($tes) - 1] != 0 ? end($urutNama) . ' (' .  $kelas . ')' : 'TIdak ada'
                            //  . ' ( ' . $tes[count($tes) - 1] . ' )'
                             ;

                            ?></td>

                       
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
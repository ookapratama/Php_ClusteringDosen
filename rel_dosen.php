<?php
$prodi = $_REQUEST['prodi_id'];
// $rows = $db->get_results("SELECT a.id_dosen, ra.id_kriteria, ra.nilai, a.hitung           
//         FROM tb_rel_dosen ra 
//         	INNER JOIN tb_dosen a ON a.id_dosen = ra.id_dosen
//             WHERE a.prodi_id='$prodi'
//         ORDER BY ra.id_dosen, ra.id_kriteria");
$rows = $db->get_results("SELECT a.id_dosen, ra.id_kriteria, ra.nilai, ra.penelitian, ra.pengajaran, 
                        ra.bimbingan,  a.hitung, a.prodi_id           
                        FROM tb_rel_dosen ra 
                            INNER JOIN tb_dosen a ON a.id_dosen = ra.id_dosen
                        ORDER BY ra.id_dosen, ra.id_kriteria 
                        
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
    );
    // $data['penelitian']  = $row->penelitian;
    // $data['pengajaran']  = $row->pengajaran;
    // $data['bimbingan']  = $row->bimbingan;
    // die(var_dump($rows));



}
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
    <h1>Nilai Bobot Dosen</h1>
</div>
<div class="panel panel-default">
    <div class="panel">
        <div class="row">
            <div class="col-sm-12">
                <form method="POST">
                    <center>
                        <!-- <div class="row">
                        <div class="form-group pull-right col-md-3 col-md-offset-1">
                            <select class="form-control" name="prodi_id" onchange="form.submit()">
                                <option readonly="readonly">-- Pilih Prodi --</option>
                                <?= get_prodiview_option(set_value('prodi_id')) ?>
                            </select>
                        </div>
                    </div> -->
                    </center>
                </form>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="tabel1" class="table table-bordered table-hover table-striped dt-responsive nowrap" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Dosen</th>
                    <?php foreach ($KRITERIA as $key => $val) : ?>
                        <th><?= $val['nama'] ?></th>
                    <?php endforeach ?>
                    <th>Hasil</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $val) : ?>
                    <tr>
                        <td><?= ++$no ?></td>
                        <td><?= $ALTERNATIF[$key]->nama_dosen ?></td>
                        <?php
                        $nama = [
                            4 => 'Ilmu Komputer',
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
                                    // var_dump($sort['nama'][$nilai]);

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

                            // var_dump($urutNama); 
                            // var_dump($tes[count($tes) - 1]);
                            // var_dump($getKriteriax);
                            echo $tes[count($tes) - 1] != 0 ? end($urutNama) : 'TIdak ada'
                            //  . ' ( ' . $tes[count($tes) - 1] . ' )'
                            ;

                            ?></td>

                        <td class="text-center">
                            <a class="btn btn-xs btn-primary" href="?m=jurnal&ID=<?= $key ?>&prodi_id=<?= $ALTERNATIF[$key]->prodi_id ?>"><span class="glyphicon glyphicon-list-alt"></span> Lihat </a>
                            <!-- <a class="btn btn-xs btn-warning" href="?m=rel_dosen_ubah&ID=<?= $key ?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>         -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
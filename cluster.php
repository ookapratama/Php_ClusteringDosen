<div class="page-header">
    <h1>Hasil Clustering</h1>
</div>
<div class="panel panel-default">
    <div class="panel">
        <div class="row">
            <div class="col-sm-12">
                
                <div class="row">
                    <div class="form-group col-md-1 col-xs-12">
                        <a class="btn btn-success" href="cluster_cetak.php?m=cluster&prodi=<?= htmlspecialchars($_REQUEST['prodi_id']) ?>"><span class="glyphicon glyphicon-download-alt"></span> Download Hasil Clustering</a>
                    </div>
                </div>
                
            </div>
        </div> 
    </div>
    <div class="table-responsive">
        <table id="tabel1" class="table table-bordered table-hover table-striped dt-responsive nowrap" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Dosen</th>
                    <th>Nidn</th>
                    <th>Cluster</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Menangani kasus tanpa prodi_id
                    $prodi = isset($_REQUEST['prodi_id']) && $_REQUEST['prodi_id'] != '0' ? $_REQUEST['prodi_id'] : '';
                    $query = "SELECT * FROM tb_dosen WHERE nama_bidangilmu != '0'";
                    if ($prodi) {
                        $query .= " AND prodi_id='" . $db->escape($prodi) . "'";
                    }
                    $query .= " ORDER BY nama_bidangilmu ASC";
                    
                    $rows = $db->get_results($query);
                    $no = 0;
                    foreach ($rows as $row) :
                ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= htmlspecialchars($row->nama_dosen, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($row->nidn, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($row->nama_bidangilmu, ENT_QUOTES, 'UTF-8') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
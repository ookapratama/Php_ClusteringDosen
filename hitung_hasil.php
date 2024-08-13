<script language='javascript'>
    $(document).ready(function() {
        swal({
            title: "Clustering Berhasil",
            text: 'Informasi mengenai hasil cluster dapat dilihat di menu tabulasi',
            type: "success",
            html: true,
            timer: 3000,
            showCancelButton: false,
            showConfirmButton: false
        });
    });
</script>

<ul class="nav nav-tabs">
    <li class="">
        <a href="#analisis" data-toggle="tab" aria-expanded="false">Analisis Data</a>
    </li>
    <li class="">
        <a href="#perhitungan" data-toggle="tab" aria-expanded="true">Perhitungan</a>
    </li>
    <li class="active">
        <a href="#cluster" data-toggle="tab" aria-expanded="true">Keanggotaan Akhir</a>
    </li>
    <li>
        <a href="#" id="export-excel" class="btn btn-success">Export Excel</a>
    </li>
</ul>

<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade" id="analisis">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Analisa Data</h3>
            </div>
            <div class="table-responsive" id="tab_1">
                <table id="tabel2" class="table table-bordered table-hover table-striped dt-responsive nowrap" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th rowspan="2">Nama Dosen</th>
                            <th class="text-center" colspan="<?= count($KRITERIA) ?>">Matriks Data</th>
                        </tr>
                        
                    </thead>
                    <?php foreach ($data as $key => $val) : ?>
                        <tr>
                            <td><?= $ALTERNATIF[$key]->id_dosen ?></td>
                            <td><?= $ALTERNATIF[$key]->nama_dosen ?></td>
                            <?php foreach ($val as $k => $v) : ?>
                                <td><?= $v ?></td>
                            <?php endforeach ?>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="perhitungan">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Perhitungan</h3>
            </div>
            <div class="panel-body" id="tab_2">
                <pre>
                <?php
                $fcm = new fcm($data, $maksimum, $cluster, $pembobot, $epsilon);
                ?>
                </pre>
            </div>
        </div>
    </div>
    <div class="tab-pane fade active in" id="cluster">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Keanggotaan Akhir | Iterasi <span class="badge"><?= $fcm->iterasi ?></span></h3>
            </div>
            <div class="table-responsive" id="tab_3"><br>
                <table id="tabel1" class="table table-bordered table-hover table-striped dt-responsive nowrap" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <?php foreach ($fcm->cluster as $val) : ?>
                                <th><?= $val ?></th>
                            <?php endforeach ?>
                            <th>Cluster</th>
                        </tr>
                    </thead>
                    <?php foreach ($fcm->keanggotaan as $key => $val) : ?>
                        <tr>
                            <td><?= $ALTERNATIF[$key]->nidn ?></td>
                            <td><?= $ALTERNATIF[$key]->nama_dosen ?></td>
                            <?php foreach ($val as $k => $v) : ?>
                                <td><?= round($v, 2) ?></td>
                            <?php endforeach ?>
                            <td><?= $fcm->hasil[$key] ?></td>
                        </tr>
                        <?php
                        // Update query without prodi filter
                        $db->query("UPDATE tb_dosen SET nama_bidangilmu='" . $fcm->hasil[$key] . "' WHERE id_dosen='$key' AND hitung='Ya'");
                        $db->query("UPDATE tb_dosen SET nama_bidangilmu=0 WHERE hitung='Tidak'");
                        ?>
                    <?php endforeach; ?>

                    <?php
                    if (is_array($fcm->hasil)) {
                        foreach ($fcm->hasil as $key => $val) {
                            $arr[$val]++;
                        }
                    }
                    $chart = array();
                    if (is_array($arr)) {
                        foreach ($arr as $key => $val) {
                            $chart[] = array(
                                'name' => "Grafik " . $key,
                                'y' => $val,
                            );
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="panel panel-body panel-primary">
            <script src="assets/js/highcharts.js"></script>
            <script src="assets/js/exporting.js"></script>
            <script src="assets/js/highcharts-3d.js"></script>
            <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
            <style type="text/css">
                .highcharts-credits {
                    display: none;
                }
            </style>
            <script>
                $(function() {
                    // Radialize the colors
                    Highcharts.setOptions({
                        colors: Highcharts.map(Highcharts.getOptions().colors, function(color) {
                            return {
                                radialGradient: {
                                    cx: 0.5,
                                    cy: 0.3,
                                    r: 0.7
                                },
                                stops: [
                                    [0, color],
                                    [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                                ]
                            };
                        })
                    });
                    Highcharts.chart('container', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: 'Grafik Hasil Clustering'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                    style: {
                                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                    }
                                },
                                connectorColor: 'silver'
                            }
                        },
                        series: [{
                            name: 'Presentase',
                            colorByPoint: true,
                            data: <?= json_encode($chart) ?>
                        }]
                    });
                });
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.0/xlsx.full.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#export-excel').click(function() {
                        // Mendapatkan data dari tabel
                        var table = document.getElementById('tabel1');
                        var ws = XLSX.utils.table_to_sheet(table);

                        // Membuat workbook dan menyimpannya dalam bentuk file
                        var wb = XLSX.utils.book_new();
                        XLSX.utils.book_append_sheet(wb, ws, "Cluster Data");

                        // Menyimpan file Excel
                        XLSX.writeFile(wb, 'cluster_data.xlsx');
                    });
                });
            </script>
        </div>
    </div>
</div>
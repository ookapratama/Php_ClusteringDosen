<style>    
    .text-primary{font-weight: bold;}
</style>
<div class="page-header">
    <h1>Perhitungan</h1>
</div>
<?php
    $c = $db->get_results("SELECT * FROM tb_rel_dosen WHERE nilai < 0 ");
    $c = false;
    if (!$ALTERNATIF || !$KRITERIA):
        echo "Tampaknya anda belum mengatur alternatif dan kriteria. Silahkan tambahkan minimal 3 alternatif dan 2 kriteria.";
    elseif ($c):
        echo "Tampaknya anda belum mengatur nilai alternatif. Silahkan atur pada menu <strong>Nilai Alternatif</strong>.";
    else:
    $data = get_data();?>   
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Pengaturan</h3>
        </div>
        <div class="panel-body">
            <?php
            $succes = false;
            if($_POST){
                $cluster    = $_POST['cluster'];
                $maksimum   = $_POST['maksimum'];   
                $pembobot   = $_POST['pembobot'];   
                $epsilon    = $_POST['epsilon'];
                $prodi      = $_POST['prodi_id'];     
                if($cluster < 2 || $maksimum < 10){
                    sweet_alert_direct("Kesalahan", "Masukkan minimal 2 clustering, dan 10 iterasi.", "error", "4000", "true", "?m=hitung");
                } elseif($cluster >= 12){
                    sweet_alert_direct("Kesalahan", "Maksimal cluster adalah 11.", "error", "4000", "true", "?m=hitung");
                } elseif($prodi==0) {
                    sweet_alert_direct("Kesalahan", "Prodi Belum Dipilih.", "error", "4000", "true", "?m=hitung");
                } elseif($data==null) {
                    sweet_alert_direct("Notifikasi", "Data dosen diprodi tersebut, tidak tersedia.", "info", "4000", "true", "?m=hitung");
                } else {
                    $succes = true;
                }
            }
            ?>
            <div class="row">
                <form method="post" action="?m=hitung">
                    <div class="col-xs-6 col-sm-3">
                        <div class="form-group">
                            <label>Jumlah Cluster Dicari <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="cluster" value="<?=set_value('cluster', 3)?>" />
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="form-group">
                            <label>Maksimum Iterasi <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="maksimum" value="<?=set_value('maksimum', 100)?>" />
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="form-group">
                            <label>Pembobot <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="pembobot" value="<?=set_value('pembobot', 2)?>" />
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="form-group">
                            <label>Epsilon <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="epsilon" value="<?=set_value('epsilon', 0.01)?>" />
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <!-- <div class="form-group">
                            <label>Prodi <span class="text-danger">*</span></label>
                            <select class="form-control" name="prodi_id">
                                <option readonly="readonly">-- Pilih Prodi --</option>
                                <?=get_prodiview_option(set_value('prodi_id'))?>
                            </select>
                        </div> -->
                        <button class="btn btn-primary pull-right"><span class="glyphicon glyphicon-screenshot"></span> Proses Cluster</button>
                    </div>
                </form>
            </div>
        </div>
    </div>        
    <?php     
    if($succes)
        include 'hitung_hasil.php';
    ?>            
<?php endif?>
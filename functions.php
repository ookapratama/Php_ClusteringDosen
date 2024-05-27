<?php
error_reporting(~E_NOTICE & ~E_DEPRECATED);
session_start();
date_default_timezone_set('GMT');
include 'config.php';
include'includes/ez_sql_core.php';
include'includes/ez_sql_mysqli.php';
$db = new ezSQL_mysqli($config['username'], $config['password'], $config['database_name'], $config['server']);
include'includes/general.php';
include'includes/SimpleImage.php';
include'includes/fcm.php';

$mod = $_GET['m'];
$act = $_GET['act'];

$rows = $db->get_results("SELECT id_dosen, kode_dosen, nama_dosen, hitung, prodi_id FROM tb_dosen ORDER BY id_dosen");
foreach($rows as $row){
    $ALTERNATIF[$row->id_dosen] = $row;
}

$rows = $db->get_results("SELECT id_kriteria, kode_kriteria, nama_kriteria FROM tb_kriteria ORDER BY kode_kriteria");
foreach($rows as $row){
    $KRITERIA[$row->id_kriteria] = array(
        'kode'=>$riw->kode_kriteria,
        'nama'=>$row->nama_kriteria,
    );
}

function kode_oto($field, $table, $prefix, $length){
    global $db;
    $var = $db->get_var("SELECT $field FROM $table WHERE $field REGEXP '{$prefix}[0-9]{{$length}}' ORDER BY $field DESC");
    if($var){
        return $prefix . substr( str_repeat('0', $length) . (substr($var, - $length) + 1), - $length );
    } else {
        return $prefix . str_repeat('0', $length - 1) . 1;
    }
}

function kode_oto_dosen($field, $table, $prefix, $length){
    global $db;
    $prodi  = get_prodi_kode_oto();
    $var    = $db->get_var("SELECT $field FROM $table WHERE $field REGEXP '{$prodi}{$prefix}[0-9]{{$length}}' ORDER BY $field DESC");
    if($var){
        return $prodi . $prefix . substr( str_repeat('0', $length) . (substr($var, - $length) + 1), - $length );
    } else {
        return $prodi . $prefix . str_repeat('0', $length - 1) . 1;
    }
}

function get_data(){
    global $db;
    $prodi= $_REQUEST['prodi_id'];
    $rows = $db->get_results("SELECT a.id_dosen, k.id_kriteria, ra.nilai
        FROM tb_dosen a 
        	INNER JOIN tb_rel_dosen ra ON ra.id_dosen=a.id_dosen
        	INNER JOIN tb_kriteria k ON k.id_kriteria=ra.id_kriteria
            WHERE  a.hitung='Ya'
        ORDER BY a.id_dosen, k.id_kriteria");
    $data = array();
    foreach($rows as $row){
        $data[$row->id_dosen][$row->id_kriteria] = $row->nilai;
    }
    return $data;
}

function get_status_prodi_option($selected = ''){
    $atribut = array('aktif'=>'Aktif', 'tidak aktif'=>'Tidak Aktif');   
    foreach($atribut as $key => $value){
        if($selected==$key)
            $a.="<option value='$key' selected>$value</option>";
        else
            $a.= "<option value='$key'>$value</option>";
    }
    return $a;
}

function get_prodi_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT prodi_id, nama_prodi FROM tb_prodi WHERE status='aktif' ORDER BY prodi_id");
    foreach($rows as $row){
        if($row->prodi_id==$selected)
            $a.="<option value='$row->prodi_id' selected>$row->nama_prodi</option>";
        else
            $a.="<option value='$row->prodi_id'>$row->nama_prodi</option>";
    }
    return $a;
}

function get_prodi_kode_oto($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT nama_prodi FROM tb_prodi WHERE status='aktif' ORDER BY prodi_id");
    foreach($rows as $row){ $a.= $row->nama_prodi; }
    return $a;
}

function get_prodi_status($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT status FROM tb_prodi WHERE status='aktif' ORDER BY prodi_id");
    foreach($rows as $row){ $a.= $row->status; }
    return $a;
}

function get_prodi_registrasi($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT prodi_id FROM tb_prodi WHERE status='aktif' ORDER BY prodi_id");
    foreach($rows as $row){ $a.= $row->prodi_id; }
    return $a;
}

function get_prodiview_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT prodi_id, nama_prodi FROM tb_prodi ORDER BY prodi_id DESC");
    foreach($rows as $row){
        if($row->prodi_id==$selected)
            $a.="<option value='$row->prodi_id' selected>$row->nama_prodi</option>";
        else
            $a.="<option value='$row->prodi_id'>$row->nama_prodi</option>";
    }
    return $a;
}

function get_dosen_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT id_dosen, nama_dosen, prodi_id FROM tb_dosen WHERE id_dosen = '". $_SESSION['id_dosen_global'] ."' ORDER BY id_dosen DESC");
    foreach($rows as $row){
        if($row->id_dosen==$selected)
            $a.="<option value='$row->id_dosen' selected>$row->nama_dosen</option>";
        else
            $a.="<option selected value='$row->id_dosen'>$row->nama_dosen</option>";
    }
    return $a;
}
function get_kriteria_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT id_kriteria, nama_kriteria FROM tb_kriteria ORDER BY id_kriteria DESC");
    foreach($rows as $row){
        if($row->id_kriteria==$selected)
            $a.="<option value='$row->id_kriteria' selected>$row->nama_kriteria</option>";
        else
            $a.="<option value='$row->id_kriteria'>$row->nama_kriteria</option>";
    }
    return $a;
}

function get_jeniskelamin_option($selected = ''){
    $atribut = array('Laki-laki'=>'Laki-laki', 'Perempuan'=>'Perempuan');   
    foreach($atribut as $key => $value){
        if($selected==$key)
            $a.="<option value='$key' selected>$value</option>";
        else
            $a.= "<option value='$key'>$value</option>";
    }
    return $a;
}

function get_agama_option($selected = ''){
    $atribut = array('Islam'=>'Islam', 'Kristen Protestan'=>'Kristen Protestan', 'Katolik'=>'Katolik', 'Hindu'=>'Hindu', 'Buddha'=>'Buddha', 'Kong Hu Cu'=>'Kong Hu Cu');   
    foreach($atribut as $key => $value){
        if($selected==$key)
            $a.="<option value='$key' selected>$value</option>";
        else
            $a.= "<option value='$key'>$value</option>";
    }
    return $a;
}

function get_hitung_option($selected = ''){
    $atribut = array('Ya'=>'Ya', 'Tidak'=>'Tidak');   
    foreach($atribut as $key => $value){
        if($selected==$key)
            $a.="<option value='$key' selected>$value</option>";
        else
            $a.= "<option value='$key'>$value</option>";
    }
    return $a;
}

function get_cluster_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT id_bidangilmu, nama_bidangilmu FROM tb_bidangilmu ORDER BY id_bidangilmu ASC");
    foreach($rows as $row){
        if($row->nama_bidangilmu==$selected)
            $a.="<option value='$row->nama_bidangilmu' selected>$row->nama_bidangilmu</option>";
        else
            $a.="<option value='$row->nama_bidangilmu'>$row->nama_bidangilmu</option>";
    }
    return $a;
}

function hapus_gambar($ID){
    global $db;
    $gambar = $db->get_var("SELECT gambar FROM tb_dosen WHERE id_dosen='$ID'");
    $file_name = 'assets/images/dosen/' . $gambar;
    if(is_file($file_name))
        return unlink($file_name);
}
<?php
require_once 'functions.php';
/* LOGIN */
if ($mod == 'login') {
    $user = esc_field($_POST['user']);
    $pass = esc_field($_POST['pass']);

    $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$user' AND pass='$pass'");
    if ($row) {
        $_SESSION['login'] = $row->user;
        sweet_alert_direct("Anda Berhasil Login", "Anda akan diarahkan ke sistem dalam waktu 2 detik...", "success", "2000", "false", "index.php");
    } else {
        sweet_alert_direct("Gagal Login", "Salah kombinasi username dan password.", "error", "4000", "true", "index.php");
    }
} elseif ($act == 'logout') {
    session_destroy();
    header("location:index.php");
} else if ($mod == 'password') {
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];

    $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$_SESSION[login]' AND pass='$pass1'");
    if ($pass1 == '' || $pass2 == '' || $pass3 == '')
        sweet_alert_direct("Operasi Gagal", "Field bertanda * harus diisi.", "error", "3500", "true", "?m=password");
    elseif (!$row)
        sweet_alert_direct("Operasi Gagal", "Password lama salah.", "error", "3500", "true", "?m=password");
    elseif ($pass2 != $pass3)
        sweet_alert_direct("Operasi Gagal", "Password baru dan konfirmasi password baru tidak sama.", "error", "3500", "true", "?m=password");
    else {
        $db->query("UPDATE tb_admin SET pass='$pass2' WHERE user='$_SESSION[login]'");
        sweet_alert_direct("Operasi Berhasil", "Password berhasil diubah.", "success", "3500", "true", "?m=password");
    }
}

/* Bidang Ilmu */
if ($mod == 'bidangilmu_tambah') {
    $nama_bidangilmu = $_POST['nama_bidangilmu'];

    if ($nama_bidangilmu == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_bidangilmu WHERE nama_bidangilmu='$nama_bidangilmu'"))
        print_msg("Bidang Ilmu sudah ada!");
    else {
        $db->query("INSERT INTO tb_bidangilmu (nama_bidangilmu) VALUES ('$nama_bidangilmu')");
        sweet_alert_direct("Operasi Berhasil", "Kelas Berhasil Ditambahkan.", "success", "3500", "true", "?m=bidangilmu");
    }
} else if ($mod == 'bidangilmu_ubah') {
    $nama_bidangilmu = $_POST['nama_bidangilmu'];

    if ($nama_bidangilmu == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_bidangilmu WHERE nama_bidangilmu='$nama_bidangilmu'"))
        print_msg("Bidang Ilmu sudah ada!");
    else {
        $db->query("UPDATE tb_bidangilmu SET nama_bidangilmu='$nama_bidangilmu' WHERE id_bidangilmu='$_GET[ID]'");
        sweet_alert_direct("Operasi Berhasil", "Bidang ilmu Berhasil Diubah.", "success", "3500", "true", "?m=bidangilmu");
    }
} else if ($act == 'bidangilmu_hapus') {
    $db->query("DELETE FROM tb_bidangilmu WHERE id_bidangilmu='$_GET[ID]'");
    header("location:index.php?m=bidangilmu");
}

/* Prodi */
if ($mod == 'prodi_tambah') {
    $nama_prodi = $_POST['nama_prodi'];
    $status     = 'tidak aktif';

    if ($nama_prodi == '' || $status == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_prodi WHERE nama_prodi='$nama_prodi'"))
        print_msg("Prodi sudah ada!");
    else {
        $db->query("INSERT INTO tb_prodi (nama_prodi, status) VALUES ('$nama_prodi', '$status')");
        sweet_alert_direct("Operasi Berhasil", "Prodi Berhasil Ditambahkan.", "success", "3500", "true", "?m=prodi");
    }
} else if ($mod == 'prodi_ubah') {
    $nama_prodi = $_POST['nama_prodi'];
    $status     = $_POST['status'];

    if ($nama_prodi == '' || $status == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_prodi WHERE nama_prodi='$nama_prodi' AND status='$status'"))
        print_msg("Prodi dan Status sudah ada!");
    else {
        $db->query("UPDATE tb_prodi SET nama_prodi='$nama_prodi', status='$status' WHERE prodi_id='$_GET[ID]'");
        sweet_alert_direct("Operasi Berhasil", "Prodi Berhasil Diubah.", "success", "3500", "true", "?m=prodi");
        if ($status) {
            $db->query("UPDATE tb_prodi SET status='tidak aktif' WHERE prodi_id!='$_GET[ID]'");
        }
    }
} else if ($act == 'prodi_hapus') {
    $db->query("DELETE FROM tb_prodi WHERE prodi_id='$_GET[ID]'");
    $db->query("DELETE FROM tb_dosen WHERE prodi_id='$_GET[ID]'");
    $db->query("DELETE FROM tb_rel_dosen WHERE prodi_id='$_GET[ID]'");
    header("location:index.php?m=prodi");
}

/* DOSEN */ elseif ($mod == 'dosen_tambah') {
    $kode_dosen         = $_POST['kode_dosen'];
    $nama_dosen         = $_POST['nama_dosen'];
    $nidn               = $_POST['nidn'];
    // $nodos                = $_POST['nodos'];
    $jenis_kelamin      = $_POST['jenis_kelamin'];
    // $gambar             = $_FILES['gambar'];
    $pendidikan_s1       = $_POST['pendidikan_s1'];
    $pendidikan_s2       = $_POST['pendidikan_s2'];
    $pendidikan_s3       = $_POST['pendidikan_s3'];
    $tempat_lahir       = $_POST['tempat_lahir'];
    $tanggal_lahir      = $_POST['tanggal_lahir'];
    $agama              = $_POST['agama'];
    // $alamat             = $_POST['alamat'];
    $prodi_id           = $_POST['jurusan'];
    $nama_bidangilmu         = 0;
    if (!$kode_dosen || !$nama_dosen || !$nidn || !$jenis_kelamin || !$pendidikan_s1 || !$pendidikan_s2 || !$pendidikan_s3 || !$tempat_lahir || !$tanggal_lahir || !$agama || !$prodi_id) {
        print_msg("Field post dosen");
        print_msg("Field bertanda * tidak boleh kosong!");
    } elseif (is_numeric($nidn) == false)
        sweet_alert_direct("Pendaftaran Gagal", "Inputan nidn/nodos harus menggunakan angka!", "error", "3500", "true", "index.php");
    elseif ($db->get_results("SELECT * FROM tb_dosen WHERE kode_dosen='$kode_dosen'"))
        print_msg("Kode sudah ada!");
    else {
        // $filename = rand(1000, 999) . str_replace(' ', '-', $gambar['name']);
        // $img = new SimpleImage($gambar['tmp_name']);               
        // $img->thumbnail(723, 960);     
        // $img->save('assets/images/dosen/' . $filename, 100);

        // $db->query("INSERT INTO tb_dosen (kode_dosen, nama_dosen, nidn, nodos, jenis_kelamin, gambar, pendidikan_terakhir, tempat_lahir, tanggal_lahir, agama, alamat, prodi_id, nama_bidangilmu, hitung) VALUES ('$kode_dosen', '$nama_dosen', '$nidn', '$nodos', '$jenis_kelamin', '$filename', '$pendidikan_terakhir', '$tempat_lahir', '$tanggal_lahir', '$agama', '$alamat', '$prodi_id', '$nama_bidangilmu', 'Tidak')");
        $db->query("INSERT INTO tb_dosen (kode_dosen, nama_dosen, nidn, jenis_kelamin, pendidikan_s1, pendidikan_s2, pendidikan_s3, tempat_lahir, tanggal_lahir, agama, prodi_id, nama_bidangilmu, hitung) VALUES ('$kode_dosen', '$nama_dosen', '$nidn', '$jenis_kelamin', '$pendidikan_s1', '$pendidikan_s2', '$pendidikan_s3', '$tempat_lahir', '$tanggal_lahir', '$agama', '$prodi_id', '$nama_bidangilmu', 'Ya')");
        $ID = $db->insert_id;
        $db->query("INSERT INTO tb_rel_dosen(id_dosen, id_kriteria, nilai, prodi_id) SELECT '$ID', id_kriteria, 0, '$prodi_id' FROM tb_kriteria");
        sweet_alert_direct("Operasi Berhasil", "dosen Berhasil Ditambahkan.", "success", "3500", "true", "?m=dosen");
    }
} else if ($mod == 'dosen_ubah') {
    $kode_dosen         = $_POST['kode_dosen'];
    $nama_dosen         = $_POST['nama_dosen'];
    $nidn               = $_POST['nidn'];
    // $nodos                = $_POST['nodos'];
    $jenis_kelamin      = $_POST['jenis_kelamin'];
    // $gambar             = $_FILES['gambar'];
    $pendidikan_s1       = $_POST['pendidikan_s1'];
    $pendidikan_s2       = $_POST['pendidikan_s2'];
    $pendidikan_s3       = $_POST['pendidikan_s3'];
    $tempat_lahir       = $_POST['tempat_lahir'];
    $tanggal_lahir      = $_POST['tanggal_lahir'];
    $agama              = $_POST['agama'];
    $alamat             = $_POST['alamat'];

    if ($kode_dosen == '' || $nama_dosen == '' || $nidn == '' || $jenis_kelamin == '' || $pendidikan_s1 == '' || $pendidikan_s2 == '' || $pendidikan_s3 == '' || $tempat_lahir == '' || $tanggal_lahir == '' || $agama == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif (is_numeric($nidn) == false)
        sweet_alert_direct("Operasi Gagal", "Inputan nidn/nodos harus menggunakan angka!", "error", "3500", "true", "index.php");
    else {
        // if ($gambar['tmp_name']) {
        //     hapus_gambar($_GET['ID']);
        //     // $filename = rand(1000, 9999) . str_replace(' ', '-', $gambar['name']);
        //     // $img = new SimpleImage($gambar['tmp_name']);
        //     // $img->thumbnail(723, 960);
        //     // $img->save('assets/images/dosen/' . $filename, 100);
        //     // $sql_gambar = ", gambar='$filename'";
        // }
        // if (!$gambar['tmp_name']) {
        //     $db->query("UPDATE tb_dosen SET kode_dosen='$kode_dosen', nama_dosen='$nama_dosen', nidn='$nidn', nodos='$nodos', jenis_kelamin='$jenis_kelamin', pendidikan_terakhir='$pendidikan_terakhir', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', agama='$agama', alamat='$alamat' WHERE id_dosen='$_GET[ID]'");
        // } else {
        // }
        $db->query("UPDATE tb_dosen SET kode_dosen='$kode_dosen', nama_dosen='$nama_dosen', nidn='$nidn', jenis_kelamin='$jenis_kelamin', pendidikan_s1='$pendidikan_s1', pendidikan_s2='$pendidikan_s2' , pendidikan_s3='$pendidikan_s3', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', agama='$agama' WHERE id_dosen='$_GET[ID]'");
        sweet_alert_direct("Operasi Berhasil", "Data Dosen Berhasil Diubah.", "success", "3500", "true", "?m=dosen");
    }
} else if ($act == 'dosen_hapus') {
    $db->query("DELETE FROM tb_dosen WHERE id_dosen='$_GET[ID]'");
    $db->query("DELETE FROM tb_rel_dosen WHERE id_dosen='$_GET[ID]'");
    header("location:index.php?m=dosen");
}

/* CLUSTER MANUAL */
if ($mod == 'cluster_ubah') {
    $nama_bidangilmu = $_POST['cluster'];

    if ($nama_bidangilmu == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_dosen SET nama_bidangilmu='$nama_bidangilmu' WHERE id_dosen='$_GET[ID]'");
        sweet_alert_direct("Operasi Berhasil", "Cluster Berhasil Diubah.", "success", "3500", "true", "?m=cluster");
    }
}

/* KRITERIA */
if ($mod == 'kriteria_tambah') {
    $kode_kriteria = $_POST['kode_kriteria'];
    $nama_kriteria = $_POST['nama_kriteria'];

    if ($kode_kriteria == '' || $nama_kriteria == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_kriteria WHERE kode_kriteria='$kode_kriteria'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("INSERT INTO tb_kriteria (kode_kriteria, nama_kriteria) 
            VALUES ('$kode_kriteria', '$nama_kriteria')");
        $ID = $db->insert_id;
        $db->query("INSERT INTO tb_rel_dosen(id_dosen, id_kriteria, nilai) SELECT id_dosen, '$ID', -1  FROM tb_dosen");
        sweet_alert_direct("Operasi Berhasil", "Kriteria Berhasil Ditambahkan.", "success", "3500", "true", "?m=kriteria");
    }
} else if ($mod == 'kriteria_ubah') {
    $kode_kriteria = $_POST['kode_kriteria'];
    $nama_kriteria = $_POST['nama_kriteria'];

    if ($kode_kriteria == '' || $nama_kriteria == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_kriteria WHERE kode_kriteria='$kode_kriteria' AND id_kriteria<>'$_GET[ID]'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("UPDATE tb_kriteria SET kode_kriteria='$kode_kriteria', nama_kriteria='$nama_kriteria' WHERE id_kriteria='$_GET[ID]'");
        sweet_alert_direct("Operasi Berhasil", "Kriteria Berhasil Diubah.", "success", "3500", "true", "?m=kriteria");
    }
} else if ($act == 'kriteria_hapus') {
    $db->query("DELETE FROM tb_kriteria WHERE id_kriteria='$_GET[ID]'");
    $db->query("DELETE FROM tb_rel_dosen WHERE id_kriteria='$_GET[ID]'");
    header("location:index.php?m=kriteria");
}

/* RELASI DOSEN */ else if ($act == 'rel_dosen_ubah') {
    foreach ($_POST as $key => $value) {
        $ID = str_replace('ID-', '', $key);
        $db->query("UPDATE tb_rel_dosen SET nilai='$value' WHERE ID='$ID'");
    }
    $hitung = $_POST['hitung'];
    $db->query("UPDATE tb_dosen SET hitung='$hitung' WHERE id_dosen='$_GET[ID]'");
    header("location:index.php?m=rel_dosen");
}

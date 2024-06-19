<?php
function determineDominasi($penelitian, $pengajaran, $bimbingan, $db)
{
  
  $query = "
        SELECT hasil 
        FROM tb_rules 
        WHERE penelitian = '$penelitian' 
        AND pengajaran = '$pengajaran' 
        AND bimbingan = '$bimbingan'
    ";
  $result = $db->get_var($query);
  // die(var_dump($result));
  if ($result) {
    return $result;
  } else {
    return findDominant($penelitian, $pengajaran, $bimbingan);
  }
}

function findDominant($val1, $val2, $val3)
{
  if ($val1 === $val2) return $val1;
  if ($val1 === $val3) return $val1;
  if ($val2 === $val3) return $val2;
  return "Tidak Diketahui";
}

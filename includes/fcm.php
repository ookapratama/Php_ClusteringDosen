
<?php
/**
 * 
 */
class fcm
{
	protected $data;
	protected $cluster_count;
	protected $max_iterasi;
	protected $pembobot;
	protected $epsilon;

	public $cluster;
	protected $random_cluster;

	public $iterasi = 1;
	protected $is_debug = true;

	public $keanggotaan;
	protected $miu_kuadat;
	protected $miu_kuadat_x;
	protected $pusat_cluster;
	protected $xv;
	protected $nilai_l;
	protected $lt;
	protected $fungsi_objektif;
	public $hasil;

	function __construct($data, $max_iterasi, $cluster_count, $pembobot, $epsilon)
	{
		$this->data = $data;
		$this->max_iterasi = $max_iterasi;
		$this->cluster_count = $cluster_count;
		$this->pembobot = $pembobot;
		$this->epsilon = $epsilon;

		for ($a = 1; $a <= $this->cluster_count; $a++) {
			$this->cluster['K' . $a] = 'K' . $a;
		}
		$this->random_cluster();
		$this->hitung();
	}

	function hitung()
	{
		$success = false;
		$this->keanggotaan = $this->random_cluster;
		while (!$success && $this->iterasi <= $this->max_iterasi) {
			$this->dd("\n<b>Iterasi $this->iterasi</b>");

			$this->dd("\n<b>Keanggotaan $this->iterasi</b>");
			$no = 0;
			foreach ($this->keanggotaan as $key => $val) {
				$this->dd("\n" . ++$no . ": ");
				foreach ($val as $k => $v) {
					$this->dd("\t" . round($v, 3));
				}
			}

			$this->miu_kuadat();
			$this->dd("\n<b>Miu Kuadrat $this->iterasi</b>");
			if (is_array($this->miu_kuadat)) {
				$no = 0;
				foreach ($this->miu_kuadat as $key => $val) {
					$this->dd("\n" . ++$no . ": ");
					foreach ($val as $k => $v) {
						$this->dd("\t" . round($v, 3));
					}
				}
			}

			$this->miu_kuadat_x();
			if (is_array($this->miu_kuadat_x)) {
				foreach ($this->miu_kuadat_x as $key => $val) {
					$this->dd("\n<b>Miu Kuadrat $this->iterasi: $key</b>");
					$no = 0;
					foreach ($val as $k => $v) {
						$this->dd("\n" . ++$no . ": ");
						foreach ($v as $a => $b) {
							$this->dd("\t" . round($b, 3));
						}
					}
				}
			}

			$this->pusat_cluster();
			$this->dd("\n<b>Pusat Cluster $this->iterasi</b>");
			if (is_array($this->pusat_cluster)) {
				$no = 0;
				foreach ($this->pusat_cluster as $key => $val) {
					$this->dd("\n" . ++$no . ": ");
					foreach ($val as $k => $v) {
						$this->dd("\t" . round($v, 3));
					}
				}
			}

			$this->xv();
			$this->dd("\n<b>XV $this->iterasi</b>");
			$no = 0;
			foreach ($this->xv as $key => $val) {
				$this->dd("\n" . ++$no . ": ");
				foreach ($val as $k => $v) {
					$this->dd("\t" . round($v, 3));
				}
			}

			$this->nilai_l();
			$this->dd("\n<b>L $this->iterasi</b>");
			if (is_array($this->nilai_l)) {
				$no = 0;
				foreach ($this->nilai_l as $key => $val) {
					$this->dd("\n" . ++$no . ": ");
					foreach ($val as $k => $v) {
						$this->dd("\t" . round($v, 3));
					}
					$this->dd("\t:" . round(array_sum($val), 3));
				}
			}

			$this->lt();
			$this->dd("\n<b>LT $this->iterasi</b>");
			if (is_array($this->lt)) {
				$no = 0;
				foreach ($this->lt as $key => $val) {
					$this->dd("\n" . ++$no . ": ");
					foreach ($val as $k => $v) {
						$this->dd("\t" . round($v, 3));
					}
					$this->dd("\t:" . round(array_sum($val), 3));
				}
			}

			$fo = $this->fungsi_objektif();
			$this->dd("\n<b>Fungsi Objektif $this->iterasi : " . $fo . "</b>");

			$this->dd("\n$fo - $this->fungsi_objektif");
			$selisih = abs($fo - $this->fungsi_objektif);
			$this->dd("\n<b>Selisih Fungsi Objektif $this->iterasi : " . $selisih . "</b>");

			if ($selisih > $this->epsilon) {
				$this->dd("\n<b class='text-info'>Karena Selisih Fungsi Objektif ($selisih) > dari $this->epsilon, maka iterasi dilanjutkan.</b>");

				$this->fungsi_objektif = $fo;
				$this->anggota_baru();
				$this->iterasi++;
			} else {
				$this->dd("\n<b class='text-info'>Karena Selisih Fungsi Objektif ($selisih) <= dari $this->epsilon, maka iterasi dihentikan.</b>");
				$success = true;
				$this->hasil();
			}
		}
	}
	function hasil()
	{
		foreach ($this->keanggotaan as $key => $val) {
			$maxs = array_keys($val, max($val));
			$this->hasil[$key] = $maxs[0];
		}

		ksort($this->hasil);
	}
	function anggota_baru()
	{
		foreach ($this->lt as $key => $val) {
			$total = array_sum($val);
			foreach ($val as $k => $v) {
				$this->keanggotaan[$key][$k] = $v / $total;
			}
		}
		ksort($this->keanggotaan);
	}
	function fungsi_objektif()
	{
		$n = 0;
		if (is_array($this->nilai_l)) {
			foreach ($this->nilai_l as $key => $val) {
				$n += array_sum($val);
			}
		}
		return $n;
	}
	function lt()
	{
		foreach ($this->xv as $key => $val) {
			foreach ($val as $k => $v) {
				$this->lt[$key][$k] = pow($v, -1 / ($this->pembobot - 1));
			}
		}
	}
	function nilai_l()
	{
		foreach ($this->xv as $key => $val) {
			foreach ($val as $k => $v) {
				$this->nilai_l[$key][$k] = $v * $this->miu_kuadat[$key][$k];
			}
		}
	}
	function xv()
	{
		$this->xv = array();
		foreach ($this->cluster as $key => $val) {
			foreach ($this->data as $k => $v) {
				foreach ($v as $a => $b) {
					$this->xv[$k][$key] += pow($b - $this->pusat_cluster[$key][$a], 2);
				}
			}
		}
		//print_r($arr);
	}
	function pusat_cluster()
	{
		$miu_kuadat_total = array();
		if (is_array($this->miu_kuadat)) {
			foreach ($this->miu_kuadat as $key => $val) {
				foreach ($val as $k => $v) {
					$miu_kuadat_total[$k] += $v;
				}
			}
		}
		$miu_kuadat_x_total = array();
		if (is_array($this->miu_kuadat_x)) {
			foreach ($this->miu_kuadat_x as $key => $val) {
				foreach ($val as $k => $v) {
					foreach ($v as $a => $b) {
						$miu_kuadat_x_total[$key][$a] += $b;
					}
				}
			}
		}
		foreach ($miu_kuadat_x_total as $key => $val) {
			foreach ($val as $k => $v) {
				$this->pusat_cluster[$key][$k] = $v / $miu_kuadat_total[$key];
			}
		}
	}
	function miu_kuadat_x()
	{
		foreach ($this->cluster as $key) {
			foreach ($this->data as $k => $v) {
				foreach ($v as $a => $b) {
					// die(var_dump($b . ' dan ' . $this->miu_kuadat[$k][$key]));
					$this->miu_kuadat_x[$key][$k][$a] = $b * $this->miu_kuadat[$k][$key];
				}
			}
		}
	}
	function miu_kuadat()
	{
		foreach ($this->keanggotaan as $key => $val) {
			foreach ($val as $k => $v) {
				$this->miu_kuadat[$key][$k] = pow($v, $this->pembobot);
			}
		}
	}
	function random_cluster()
	{
		$arr = array();
		$this->dd("\n<b>Nilai uik (1-5)</b>");
		$no = 0;
		foreach ($this->data as $key => $val) {
			$this->dd("\n" . ++$no . ": ");
			foreach ($this->cluster as $k) {
				$arr[$key][$k] = rand(1, 5);
				$this->dd("\t" . round(($arr[$key][$k] = rand(1, 5)), 3));
			}
		}
		foreach ($arr as $key => $val) {
			$total = array_sum($val);
			foreach ($val as $k => $v) {
				$arr[$key][$k] = $v / $total;
			}
		}
		$this->random_cluster = $arr;
		/*$this->random_cluster = array(
			1 => array('VII-1' => 0.3, 'VII-2' => 0.3, 'VII-3' => 0.4),
			2 => array('VII-1' => 0.3, 'VII-2' => 0.5, 'VII-3' => 0.2),
			3 => array('VII-1' => 0.8, 'VII-2' => 0.1, 'VII-3' => 0.1),
			4 => array('VII-1' => 0.5, 'VII-2' => 0.2, 'VII-3' => 0.3),
			5 => array('VII-1' => 0.5, 'VII-2' => 0.1, 'VII-3' => 0.4),
			6 => array('VII-1' => 0.2, 'VII-2' => 0.1, 'VII-3' => 0.7),
			7 => array('VII-1' => 0.3, 'VII-2' => 0.4, 'VII-3' => 0.3),
			8 => array('VII-1' => 0.6, 'VII-2' => 0.2, 'VII-3' => 0.2),
		);*/
	}
	function dd($str)
	{
		if ($this->is_debug)
			echo $str;
	}
}

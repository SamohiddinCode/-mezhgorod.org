<?php 
function update_csv($file, $thpage, $distupd, $minupd){
	return;
	$count_updated_z = 0;
	$array_ret = array();
	if (file_exists($file) && ($handle = fopen($file, "r")) !== FALSE) {
		fseek($handle, 3);

		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			$num = count($data);
			$temp_arr = array();
			$temp_local_dc0 = false;
			for ($c=0; $c < $num; $c++) {
				// echo $thpage.'$c='.$c.'|'.$data[$c].".<br>";
				if ($c==0 and $thpage==$data[$c]) {
					$temp_local_dc0 = true;
				} else {
					if ($c>5) {
						$temp_local_dc0=false;
					}
				};
				if ($c==4 and $data[$c]==1 and $temp_local_dc0) {
					$count_updated_z++;
					array_push($temp_arr, $distupd);
				} elseif ($c==5 and $data[$c]==1 and $temp_local_dc0) {
					$count_updated_z++;
					array_push($temp_arr, $minupd);
				} else {
					array_push($temp_arr, $data[$c]);
				};
			}
				if ($file!='citya.csv' and $file!='firms.csv' and false) {
					if ($temp_arr[4]==1 and $temp_arr[5]==1) {
						// echo $temp_arr[4]."<br>";
						array_push($array_ret, $temp_arr);
					}	elseif (isset($_GET['update_r'])) {
						array_push($array_ret, $temp_arr);

					}
				} else {
					array_push($array_ret, $temp_arr);
				}
			// array_push($array_ret, $temp_arr);
		};

		fclose($handle);
		if ($count_updated_z>0) {
			$handle = fopen($file, 'w');
			fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));
			fseek($handle, 3);
			foreach ($array_ret as $rows) {
				fputcsv($handle, $rows, ';');
			};
			fclose($handle);
			// echo 'Обновлено';
		}

		return $array_ret;
	} else {
		// echo 'Файл не существует';
	};
	return false;
};
 ?>
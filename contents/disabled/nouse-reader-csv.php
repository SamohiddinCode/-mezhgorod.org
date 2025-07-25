<?php function read_csv($file){
	// echo $file.'<br>';
	$array_ret = array();
	if (file_exists($file) && ($handle = fopen($file, "r")) !== FALSE) {
	// echo $file.'<br>';
		fseek($handle, 0);
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			$num = count($data);
			$temp_arr = array();
			for ($c=0; $c < $num; $c++) {
				array_push($temp_arr, $data[$c]);
			}
			if ($file!='citya.csv' and $file!='firms.csv' and false) {
				if ($temp_arr[4]==1 and $temp_arr[5]==1) {
					// echo $temp_arr[4]."<br>";
					array_push($array_ret, $temp_arr);
				}
			} else {
				array_push($array_ret, $temp_arr);
				// if ($file=='2moskovskaya-oblast.csv') {
				// 	print_r($temp_arr);
				// 	echo '<br>';
				// }
			}
		};
		fclose($handle);
		return $array_ret;
	} else {
		// echo 'Файл не существует';
	};
	return false;
}; ?>
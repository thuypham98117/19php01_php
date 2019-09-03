<?php  
	$m = 150000000;
	for ($i = 1; $i <= 36; $i++) {
		$m = $m + $m*(7/1000);
		if ($i % 3 == 0) {
			$m = $m - (3000000 + 1000000*($i/3 - 1));
		}
	}
	echo "Sau 36 tháng thì B nhận được cả lãi lẫn gốc là: ";
	echo number_format($m, 0,',','.');
?>
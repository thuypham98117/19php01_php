<?php  
	$n = 20000000;
	for ($j = 1; $j <= 36; $j++) {
		$n = $n + $n*(6/1000);
	}
	echo "Sau 36 tháng thì A nhận được cả lãi lẫn gốc là: ";
	echo number_format($n, 0,',','.');
?>
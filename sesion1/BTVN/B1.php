<?php  
	$sl = 0;
	echo "1.000.000 có thể đổi được: <br>";
	for ($i = 1; $i <= 100; $i++) {
		for ($j = 1; $j <= 50; $j++) {
			for ($k = 1; $k <= 20; $k++) {
				if ($i*10000 + $j*20000 + $k*50000 == 1000000 ) {
					echo "$i to 10000, $j to 20000, $k to 50000";
					echo "<br>";
					$sl++;
				}
			}
		}
	}
	echo "<h3><strong>Có tất cả $sl cách chọn</strong></h3>";
?>


<?php

$numbers = primenumber(100);

maketable($numbers[0]);

echo "計算するのに".$numbers[1]."秒かかりました。\n\n";

function primenumber($count = 100){
	$microtime = microtime(true);

	$numbers = [
		1 => false,
	];

	for($num = 2; $num <= $count; $num++){
		$numbers[$num] = true;
	}

	for($num = 2; $num <= count($numbers); $num++){
		//echo $num."の位を計算中...\n";
		for($num2 = 1; $num2 <= $count; $num2++){
			$result = $num * $num2;
			if(!isset($numbers[$result])){
				continue;
			}
			if($num2 !== 1){
				$numbers[$result] = false;
			}
		}
	}

	$time = round(microtime(true) - $microtime, 2);

	return [$numbers, $time];
}

function maketable($numbers = [], $echo = true){
	echo "表を作成中....\n";

	$num2 = 0;
	$count_strlen = strlen(count($numbers));
	
	$putstring = "";

	for($num = 1; $num < 7; $num++){
		$num2++;
		if(isset($numbers[$num2])){
			if($numbers[$num2]){
				$echonull = $count_strlen - strlen($num2);
				$putstring .= str_repeat(" ", $echonull)." ".$num2." ";
			}else{
				$echonull = $count_strlen - 2;
				$putstring .= str_repeat(" ", $echonull)." XX ";
			}
		}else{
			if($echo){
				$putstring .= "\r\n\r\n";
			}else{
				$putstring .= "\r\n";
			}
			break;
		}
		if($num === 6){
			$putstring .= "\r\n";
			$num = 0;
		}
	}

	if($echo){
		echo $putstring;
	}else{
		file_put_contents("素数.txt", $putstring);
	}
}

?>

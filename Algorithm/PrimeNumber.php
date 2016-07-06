<?php

for($n = 0; $n < 100; $n++){ 
	for($i = 2; $i < $n; $i++){
		if($n % $i === 0){
			break;
		}
	}
	if($n === $i){
		echo $n."\n";
	}
}
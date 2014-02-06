<?php 
    exec('/usr/sbin/sysctl machdep.cpu.core_count',$result);
    preg_match('/\d/', $result[0], $numCores);
	$loadAvgPercents = array();
    exec('/usr/sbin/sysctl vm.loadavg',$resultLoadAvg);
    header('Content-Type: application/json; charset=UTF-8');
    $loadAvg = explode(" ", $resultLoadAvg[0]);
	foreach ($loadAvg as $item) {
		if(is_numeric($item)) {
			array_push($loadAvgPercents, $item);
		}
	}
	$loadAvgPercents = convertToPercentage($loadAvgPercents, $numCores[0]);
  echo json_encode($loadAvgPercents);
    
    function convertToPercentage($load, $numberOfCores){
     $arr = array();
     foreach ($load as $value) {
     	//echo($value);
     	array_push($arr, $value);
     	array_push($arr, ((int)($value * 100 / $numberOfCores)));
     	}
     return $arr;
    }

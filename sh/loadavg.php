<?php 
    
	$loadAvgPercents = array();
    exec('/usr/sbin/sysctl vm.loadavg',$resultLoadAvg);
    header('Content-Type: application/json; charset=UTF-8');
    $loadAvg = explode(" ", $resultLoadAvg[0]);
	foreach ($loadAvg as $item) {
		if(is_numeric($item)) {
			array_push($loadAvgPercents, $item);
		}
	}
    echo json_encode($loadAvgPercents);
    
    function convertToPercentage($value, $numberOfCores){
        return array($value, (int)($value * 100 / $numberOfCores));
    }

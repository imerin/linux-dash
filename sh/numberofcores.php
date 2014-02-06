<?php 

    exec('/usr/sbin/sysctl machdep.cpu.core_count',$result);
    //$cores = explode(": ", $result[0]);
    preg_match('\d', $result[0], $cores)
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode( $cores[0] );
    
?>
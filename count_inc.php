<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function hit_count() {
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $current_ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $current_ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
      $current_ip=$_SERVER['REMOTE_ADDR'];
    }
    
    
    $filename_ip = 'files/ip.txt';

    $filename_count = 'files/count.txt';

    $handle = fopen($filename_ip, 'r');
    
    $current_ips = fread($handle, filesize($filename_ip));
    
    $ips_array = explode("\n", $current_ips);

    fclose($handle);

    $found = false;
    // Check if current ip exists or does not exists
    foreach ($ips_array as $ip) {
        if (trim($ip) == $current_ip) {
            $found = true;
            break;
        } else {
            $found = false;
        }
    }

    // If current ip doesn't exists
    if ($found == false) {
        // Auto increament 
        $handle = fopen($filename_count, 'r');
        $current_count = fread($handle, filesize($filename_count));
        $current_count += 1;
        fclose($handle);

        $handle = fopen($filename_count, 'w');
        fwrite($handle, $current_count);
        fclose($handle);

        // Write current ip to file
        $handle = fopen($filename_ip, 'a');
        fwrite($handle, $current_ip . "\n");
        fclose($handle);
    }
}

?>
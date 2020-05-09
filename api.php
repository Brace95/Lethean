<?php

    $url = "https://sdp.lethean.io/v1/services/search";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $res = curl_exec($curl);
    curl_close($curl);
    
    $json = json_decode($res);

    $temp = json_encode(Array(endpoint => "test.chaotic.group", port => "27223/UDP"));
    array_push($json->providers[4]->vpn, temp);

?>
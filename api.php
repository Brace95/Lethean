<?php

    $url = "https://sdp.lethean.io/v1/services/search";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $res = curl_exec($curl);
    curl_close($curl);
    
    $json = json_decode($res, true) ['providers'];
    
    // Sort JSON response by providerName, followed by id
    usort($json, function($a, $b) {
        $retval = $a['providerName'] <=> $b['providerName'];
        if ($retval == 0) {
            $retval = $a['id'] <=> $b['id'];
        }
        return $retval;
    });

?>
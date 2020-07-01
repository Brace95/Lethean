<?php
  
    if (!$_GET["host"] || !$_GET["port"] || !$_GET["cert"]){
        http_response_code(404);
        die();
    }

?>

client
remote <?php echo $_GET["host"]; ?> <?php echo $_GET["port"]; ?> udp
proto udp
rport <?php echo $_GET["port"] . PHP_EOL; ?>
nobind
proto udp
remote-cert-tls server
dev tun1
#dev-node C:\\Users\\20180213\\lthn\\dev\\net\\tun
tun-mtu 1400
mssfix 1300
float
tls-exit

# Persist tun device
persist-tun
persist-key

# Not implemented yet. We trust CA
#verify-x509-name "openvpn" name
auth SHA256
cipher AES-256-CBC
auth-user-pass 
auth-retry interact

# Filtering pulls


# Management version (needs disatcher)
management 127.0.0.1 11193
management-hold
management-query-passwords

# Use = outbound http proxy
# http-proxy  

#syslog
redirect-gateway def1
#block-outside-dns
log-append log

<ca>
<?php echo base64_decode($_GET["cert"]) . PHP_EOL; ?>
</ca>

# Not implemented yet
#<tls-auth>
#f_ta
#</tls-auth>
#key-direction 1


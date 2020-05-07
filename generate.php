<?php

// Declare OVPN variables

$endpointDns = "";
$portNum = "";

// Start of OVPN Config Template

$ovpnTemplate = array(
"client",
"remote $endpointDns $portNum udp",
"proto udp",
"rport $portNum",
"nobind",
"proto udp",
"remote-cert-tls server",
"dev tun1",
"#dev-node C:\\Users\\20180213\\lthn\\dev\\net\\tun",
"tun-mtu 1400",
"mssfix 1300",
"float",
"tls-exit",
"",
"# Persist tun device",
"persist-tun",
"persist-key",
"",
"# Not implemented yet. We trust CA",
"#verify-x509-name "openvpn" name",
"auth SHA256",
"cipher AES-256-CBC",
"auth-user-pass",
"auth-retry interact",
"",
"# Filtering pulls",
"",
"",
"# Management version (needs disatcher)",
"management 127.0.0.1 11193",
"management-hold",
"management-query-passwords",
"",
"# Use = outbound http proxy",
"# http-proxy",
"",
"#syslog",
"redirect-gateway def1",
"#block-outside-dns",
"log-append log",
"",
"<ca>",
"-----BEGIN CERTIFICATE-----MIIFGDCCAwCgAwIBAgIJANPBLKy8FkMTMA0GCSqGSIb3DQEBCwUAMBkxFzAVBgNVBAMMDkxUSE5FYXN5RGVwbG95MB4XDTE5MDgyMzEzNDc0NVoXDTM5MDgxODEzNDc0NVowGTEXMBUGA1UEAwwOTFRITkVhc3lEZXBsb3kwggIiMA0GCSqGSIb3DQEBAQUAA4ICDwAwggIKAoICAQC8DOt8uRRL8FKmzmqOgwsAi0mksvPa0jzNyd1Qam+m0ApjqHMN73l9vvl98FSKPfUn03gmJfQ+Af5me6RWH0mz/S07GC7qS+wYIr5wB7e9/NJbjCHFAkZ4YYVilFGPKaaccXS/mrOFFgdrzya9elsnrahqrFulJcITk0LSssYaJzAGvUpR3wAYEpZPrO3eww88UONE7OYPcqzksYkhI0ocEkjjWKm2bTY68KVa27sMv3Q3ajzPAva4QUjvfAmZtPz/b3Aj+G5QGCtsAsigEEYmQVZwMEINSzWQJGBiCZpS340XzulMTXw1Q0nBfnbHdkt1B4Q4i3/KUUI1PtGdUNN85r5voEUbnirZFANHIV3n/OWp+8PMOmUR3sliWJ9hfRzPPEiSNuqGHMrjwAlAh6WNxPkt2bndAdH2TL0DC6plcUiNJtidq/oGjurisLoAzDT0aGfcMrtY6/+FVtBqqm3Q+xDpkO9DtncCKjhmi7MBt//GJHQJm0XDn1wqA3CNGV97rryxBYpcRdaIdAq+9slyve+vN0xYln2mnoX6w/QU6xWEJqlxZ4Bm87WkpvbbIkjs5bhrvq49zArgi0D3a89lS8n09PYabiyVqUGEfp9I7s63zjY5P4+wusR+q6P8v63/Z/TkO7UF/gy6wXDgpdZEeLaTlzaDQdJXxUG0a8ttkwIDAQABo2MwYTAdBgNVHQ4EFgQUcRVNQzTXsP0RUm7EqwaSKMSE4pQwHwYDVR0jBBgwFoAUcRVNQzTXsP0RUm7EqwaSKMSE4pQwDwYDVR0TAQH/BAUwAwEB/zAOBgNVHQ8BAf8EBAMCAYYwDQYJKoZIhvcNAQELBQADggIBAA7z5m25EUdS+j+6HL9sFcIbn/NMtDsFHeJhvQN72FKYbPvdbLaN2bFoRK9jfED2U6n4GuCROfjdkAhPuXT5M+5e35NQsvtdn2qvkBOTFcScRBPd1yAbJwpdMisap3TmuGFxzzaG/HDInWPELUx68lTkBDxM5FoTN+aoLkhWdKQKZgCjLoictcHr8Uy3HH7o710cDb1Em8/uOBK8GaxWyxY2OVlbkQgTI0uGMnCnscudAHfhsM8utVAYxGji+Z/Us1raWiSLJ2/pduQujUYwk358pIVx5cISLew9XpR19WG4F4HFgeiBbLBk5xOgrg3BBin2dAydCAtb7oIBuKFaGwnL1Q4D+w7YNhAqRLSkng4y+mdScKOKaN5YeeEoxg9G57CHQS+Tz0qeoJNoOICDF2iOQzVpTNcdpwJ3D2CKuHcomSnlBt1vMFX8CliCfo920scHg33MJwyM8T8xlFuKxxRrxi5MV5u+K3PFLrMV7i9vEnL8bYZ1HTaLwac6VkPKji2vdLDBcqE2srSrqg5eRY0YFXWY/qtDuxZ8DggqQGWcUn/lwharySqtbzK3zuRYbORq0QO465FYWerA5H2OSP9EAMOj3GRI3KqHPdQSRK9GdK+INQCFDPonVm+79gbmiE/XtXw3QQAnBwmC1SVWDGaOAIzdZJuc2YGmrGoSQQt3-----END CERTIFICATE-----",
"</ca>",
"",
"# Not implemented yet",
"#<tls-auth>",
"#f_ta",
"#</tls-auth>",
"#key-direction 1",
""
);

// End of OVPN Config Template

?>
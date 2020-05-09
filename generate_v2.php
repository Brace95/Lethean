client
remote <?php echo $_GET["host"]; ?> <?php echo $_GET["port"]; ?> udp
proto udp
rport <?php echo $_GET["port"]; ?>
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
-----BEGIN CERTIFICATE-----
MIIFGDCCAwCgAwIBAgIJANPBLKy8FkMTMA0GCSqGSIb3DQEBCwUAMBkxFzAVBgNV
BAMMDkxUSE5FYXN5RGVwbG95MB4XDTE5MDgyMzEzNDc0NVoXDTM5MDgxODEzNDc0
NVowGTEXMBUGA1UEAwwOTFRITkVhc3lEZXBsb3kwggIiMA0GCSqGSIb3DQEBAQUA
A4ICDwAwggIKAoICAQC8DOt8uRRL8FKmzmqOgwsAi0mksvPa0jzNyd1Qam+m0Apj
qHMN73l9vvl98FSKPfUn03gmJfQ+Af5me6RWH0mz/S07GC7qS+wYIr5wB7e9/NJb
jCHFAkZ4YYVilFGPKaaccXS/mrOFFgdrzya9elsnrahqrFulJcITk0LSssYaJzAG
vUpR3wAYEpZPrO3eww88UONE7OYPcqzksYkhI0ocEkjjWKm2bTY68KVa27sMv3Q3
ajzPAva4QUjvfAmZtPz/b3Aj+G5QGCtsAsigEEYmQVZwMEINSzWQJGBiCZpS340X
zulMTXw1Q0nBfnbHdkt1B4Q4i3/KUUI1PtGdUNN85r5voEUbnirZFANHIV3n/OWp
+8PMOmUR3sliWJ9hfRzPPEiSNuqGHMrjwAlAh6WNxPkt2bndAdH2TL0DC6plcUiN
Jtidq/oGjurisLoAzDT0aGfcMrtY6/+FVtBqqm3Q+xDpkO9DtncCKjhmi7MBt//G
JHQJm0XDn1wqA3CNGV97rryxBYpcRdaIdAq+9slyve+vN0xYln2mnoX6w/QU6xWE
JqlxZ4Bm87WkpvbbIkjs5bhrvq49zArgi0D3a89lS8n09PYabiyVqUGEfp9I7s63
zjY5P4+wusR+q6P8v63/Z/TkO7UF/gy6wXDgpdZEeLaTlzaDQdJXxUG0a8ttkwID
AQABo2MwYTAdBgNVHQ4EFgQUcRVNQzTXsP0RUm7EqwaSKMSE4pQwHwYDVR0jBBgw
FoAUcRVNQzTXsP0RUm7EqwaSKMSE4pQwDwYDVR0TAQH/BAUwAwEB/zAOBgNVHQ8B
Af8EBAMCAYYwDQYJKoZIhvcNAQELBQADggIBAA7z5m25EUdS+j+6HL9sFcIbn/NM
tDsFHeJhvQN72FKYbPvdbLaN2bFoRK9jfED2U6n4GuCROfjdkAhPuXT5M+5e35NQ
svtdn2qvkBOTFcScRBPd1yAbJwpdMisap3TmuGFxzzaG/HDInWPELUx68lTkBDxM
5FoTN+aoLkhWdKQKZgCjLoictcHr8Uy3HH7o710cDb1Em8/uOBK8GaxWyxY2OVlb
kQgTI0uGMnCnscudAHfhsM8utVAYxGji+Z/Us1raWiSLJ2/pduQujUYwk358pIVx
5cISLew9XpR19WG4F4HFgeiBbLBk5xOgrg3BBin2dAydCAtb7oIBuKFaGwnL1Q4D
+w7YNhAqRLSkng4y+mdScKOKaN5YeeEoxg9G57CHQS+Tz0qeoJNoOICDF2iOQzVp
TNcdpwJ3D2CKuHcomSnlBt1vMFX8CliCfo920scHg33MJwyM8T8xlFuKxxRrxi5M
V5u+K3PFLrMV7i9vEnL8bYZ1HTaLwac6VkPKji2vdLDBcqE2srSrqg5eRY0YFXWY
/qtDuxZ8DggqQGWcUn/lwharySqtbzK3zuRYbORq0QO465FYWerA5H2OSP9EAMOj
3GRI3KqHPdQSRK9GdK+INQCFDPonVm+79gbmiE/XtXw3QQAnBwmC1SVWDGaOAIzd
ZJuc2YGmrGoSQQt3
-----END CERTIFICATE-----
</ca>

# Not implemented yet
#<tls-auth>
#f_ta
#</tls-auth>
#key-direction 1


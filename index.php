<?php
    include_once './api.php';
    $lethean_logo = "https://images.squarespace-cdn.com/content/v1/5c86e337809d8e6661fefe74/1554742652993-GORMP78JS81V3NRRO0CQ/ke17ZwdGBToddI8pDm48kJycfsYb1urLU93EpFqOTQmoCXeSvxnTEQmG4uwOsdIceAoHiyRoc52GMN5_2H8WpwgL4wI2D_AHIh_vss1JoxZD3UMNL-MOqG5-2RCLT_RsnJVHPJJ1-XiWt_skTFO5QQ/favicon.ico?format=";

?>

<!DOCTYPE html>

<html>

    <head>
        
        <?php include_once './src/php/head.php' ?>

        <title>Lethean VPN</title>
        
        <script>

            function fileDownload (filename, data) {
                let dLink = $("<a></a>");

                dLink.attr({
                    href: "data:text/plain;charset=utf-8," + encodeURIComponent(data),
                    download: filename,
                    style: "display: none;",
                    id: "download_link"
                });

                $("body").append(dLink)
                
                let link = document.getElementById("download_link");
                link.click();
                document.body.removeChild(link);
            }

            $(document).ready(function () {
                $(".download").click(function() {
                    let host = $(this).parent().find(".host").val();
                    let port = $(this).parent().find(".port").val();
                    let pName = $(this).parent().find(".provider").val();
                    let pId = $(this).parent().find(".id").val();

                    $.ajax({
                        method: "GET",
                        url: "generate.php", 
                        data: {host: host, port: port}
                    }).done(function (data) {
                        fileDownload(pName + pId + ".ovpn", data);
                    }).fail(function (){
                        console.log("Failed AJAX call");
                    });
                });
            });

        </script>

        <style>

        </style>

    </head>

    <body class="light-theme">

        <div class="options">
            <button class="dark-button" onclick="selectMode('night');">Dark Mode</button>
            <button class="light-button" onclick="selectMode('light');">Light Mode</button>
        </div>

        <?php include_once './src/php/header.php' ?>
        <?php include_once './src/php/navi.php' ?>

        <main class="container">
            <?php 
                foreach ($json->providers as $i => $provider) { 
                    if ($provider->type == "vpn") {
            ?>

            <div class="card light-card">
                <p><img src="https://raw.githubusercontent.com/LetheanMovement/lethean-gui/master/images/lockIcon.png" class="text-center lock" alt="map"/> map coming soon</p>
                <div class="card-header">
                    <h5 class-="card-title"><?php echo $provider->providerName; ?></h5> 
                </div>
                <div class="card-body light-card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col text-right">
                                <p>Provider Terms</p>
                            </div>
                            <div class="col-6 text-left">
                                <span class="light-card-value"><?php echo $provider->name; ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col text-right">
                                Stability
                            </div>
                            <div class="col-6 text-left">
                                <span class="light-card-value"><?php 
                                if ($provider->mStability == "") {
                                    echo "Not Rated";
                                }
                                else {
                                    echo $provider->mStability;
                                };
                                ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col text-right">
                                Speed
                            </div>
                            <div class="col-6 text-left">
                                <span class="light-card-value"><?php 
                                if ($provider->mSpeed == "") {
                                    echo "Not Rated";
                                }
                                else {
                                echo $provider->mSpeed; 
                                };
                                ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            </div>
                            <div class="col text-right">
                                Download
                            </div>
                            <div class="col-6 text-left">
                                <span class="light-card-value"><?php echo number_format($provider->downloadSpeed/(1000*1000), 2); ?> Mbps</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            </div>
                            <div class="col text-right">
                                Upload
                            </div>
                            <div class="col-6 text-left">
                                <span class="light-card-value"><?php echo number_format($provider->uploadSpeed/(1000*1000), 2); ?> Mbps</span>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col">
                            </div>
                            <div class="col text-right">
                                Cost
                            </div>                            
                            <div class="col-6 text-left">
                                <img class="bullet" src="<?php echo $lethean_logo; ?>" >
                                <span class="light-card-value"><?php echo number_format($provider->cost, 2); ?>
                                /m</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                Min Cost
                            </div>
                            <div class="col-6 text-left">
                                <span class="light-card-value"><em><?php echo ($provider->firstPrePaidMinutes * $provider->cost); ?></em>
                                <img class="bullet" src="<?php echo $lethean_logo; ?>" >
                                <em><?php echo " / " . $provider->firstPrePaidMinutes . " mins"; ?></em></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer light-card-footer">
                    <?php foreach ($provider->vpn as $j => $vpn) { ?>
                    <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#provider_<?php echo $i; ?>_endpoint_<?php echo $j; ?>_details" aria-expanded="false" aria-controls="provider_<?php echo $i; ?>_endpoint_<?php echo $j; ?>_details">Endpoint <?php echo $j+1; ?></button>
                    <div class="collapse" id="provider_<?php echo $i; ?>_endpoint_<?php echo $j; ?>_details">
                        <div class="card-body light-card-body">
                            <div class="container">
                                <div class="row">
                                    <p class="col">Endpoint <span class="light-card-value"><?php echo $vpn->endpoint; ?><span></p>
                                </div>
                                <div class="row">
                                    <p class="col">Port <span class="light-card-value"><?php echo $vpn->port; ?></span></p>
                                </div>
                                <div class="row">
                                    <p class="col">Endpoint Wallet <span class="light-card-value"><?php echo $provider->providerWallet; ?></span></p>
                                </div>
                                <div class="row">
                                    <p class="col">Payment ID (Required) <span class="light-card-value"><?php echo $provider->id; ?></span></p>
                                </div>
                                <div class="row">
                                    <input type="hidden" class="provider" value="<?php echo str_replace(" ", "_", $provider->providerName); ?>" />
                                    <input type="hidden" class="id" value="<?php echo ("_" . $provider->id); ?>" />
                                    <input type="hidden" class="host" value="<?php echo $vpn->endpoint; ?>" />
                                    <input type="hidden" class="port" value="<?php echo str_replace("/UDP", "", $vpn->port); ?>" />
                                    <button class="download btn btn-outline-primary">Download</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="py-3"></div>
            
            <?php }} ?>

        </main>

        <?php include_once './src/php/footer.php' ?>

    </body>

</html>
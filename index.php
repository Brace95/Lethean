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

            $(".download").click(function() {
                let host = $(this).parent().find(".host").val();
                let port = $(this).parent().find(".port").val();
                console.log("Host: " + host + " Port: " + port);
                $.ajax({
                    method: "GET",
                    url: "generate_v2.php", 
                    data: {host: host, port: port}
                }).done(function (data) {
                    console.log("Completed successfully. Results:");
                    console.log(data);
                }).fail(function (){
                    console.log("Failed ajax call");
                });
            });

        </script>

        <style>

        </style>

    </head>

    <body>

        <?php include_once './src/php/header.php' ?>
        <?php include_once './src/php/navi.php' ?>
        <?php include_once '/generate.php' ?>

        <main class="container">
            <?php 
                foreach ($json->providers as $i => $provider) { 
                    if ($provider->type == "vpn") {
            ?>

            <div class="card">
                <img src="" class="text-center" alt="map"/>
                <div class="card-header">
                    <h5 class-="card-title"><?php echo $provider->providerName; ?></h5> 
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p>Description: <?php echo $provider->name; ?></p>
                                <p>Stability:
                                    <?php
                                    if ($provider->mStability == "") {
                                        echo "Not yet rated";
                                    }
                                    else {
                                        echo $provider->mStability . " / 5";
                                    };
                                    ?>
                                </p>
                            </div>
                            <div class="col">
                                <p>Download Speed: <?php echo number_format($provider->downloadSpeed/(1000*1000), 2); ?> Mbps</p>
                                <p>Upload Speed: <?php echo number_format($provider->uploadSpeed/(1000*1000), 2); ?> Mbps</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <?php echo number_format($provider->cost, 2); ?>
                                <img class="bullet" src="<?php echo $lethean_logo; ?>" >
                                /m
                                <?php echo " ( Min " . ($provider->firstPrePaidMinutes * $provider->cost); ?>
                                <img class="bullet" src="<?php echo $lethean_logo; ?>" >
                                <?php echo " / " . $provider->firstPrePaidMinutes . " mins"; ?>
                                )
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <?php foreach ($provider->vpn as $j => $vpn) { ?>
                    <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#provider_<?php echo $i; ?>_endpoint_<?php echo $j; ?>_details" aria-expanded="false" aria-controls="provider_<?php echo $i; ?>_endpoint_<?php echo $j; ?>_details">Endpoint <?php echo $j; ?></button>
                    <div class="collapse" id="provider_<?php echo $i; ?>_endpoint_<?php echo $j; ?>_details">
                        <div class="card card-body">
                            <div class="container">
                                <div class="row">
                                    <p>Endpoint: <?php echo $vpn->endpoint; ?></p>
                                    <p>Port: <?php echo $vpn->port; ?> </p>
                                    <p>Endpoint Wallet: <?php echo $provider->providerWallet; ?></p>
                                    <p>Payment ID (Required): <?php echo $provider->id; ?> </p>
                                </div>
                                <div class="row">
                                    <input type="hidden" class="host" value="<?php echo $vpn->endpoint; ?>" />
                                    <input type="hidden" class="port" value="<?php echo str_replace("/UDP", "", $vpn->port); ?>" />
                                    <button class="download">Download</button>
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
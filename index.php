<?php
    include_once './api.php'
?>

<!DOCTYPE html>

<html>

    <head>
        
        <?php include_once './src/php/head.php' ?>

        <title>Lethean VPN</title>
        
        <script>

        </script>

        <style>

        </style>

    </head>

    <body>

        <?php include_once './src/php/header.php' ?>
        <?php include_once './src/php/navi.php' ?>

        <main class="container">
            <?php 
                foreach ($json->providers as $i => $provider) { 
                    if ($provider->type == "vpn") {
            ?>

            <div class="card">
                <img src="" alt="map" class="text-center" />
                <div class="card-header">
                    <h5 class-="card-title"><?php echo $provider->providerName; ?></h5> 
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p>Description: <?php echo $provider->name; ?></p>
                                <p>Stability: <?php echo $provider->mStability; ?></p>
                            </div>
                            <div class="col">
                                <p>Download Speed: <?php echo $provider->downloadSpeed/(1000*1000); ?>Mbps</p>
                                <p>Upload Speed: <?php echo $provider->uploadSpeed/(1000*1000); ?>Mbps</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="text-right">
                                <?php echo $provider->cost; ?>
                                <img class="bullet" src="https://images.squarespace-cdn.com/content/v1/5c86e337809d8e6661fefe74/1554742652993-GORMP78JS81V3NRRO0CQ/ke17ZwdGBToddI8pDm48kJycfsYb1urLU93EpFqOTQmoCXeSvxnTEQmG4uwOsdIceAoHiyRoc52GMN5_2H8WpwgL4wI2D_AHIh_vss1JoxZD3UMNL-MOqG5-2RCLT_RsnJVHPJJ1-XiWt_skTFO5QQ/favicon.ico?format=">
                                /m
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <?php foreach ($provider->vpn as $j => $vpn) { ?>
                    <button class="btn btn-outline-primary download">Endpoint <?php echo ++$j; ?></button>
                    <?php } ?>
                </div>
            </div>

            <div class="py-3"></div>
            
            <?php }} ?>

        </main>

        <?php include_once './src/php/footer.php' ?>

    </body>

</html>
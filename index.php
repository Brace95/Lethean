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
                <img src="" alt="" />
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
                                <p>Download Speed: <?php echo $provider->downloadSpeed/(1024*1024); ?>Mbps</p>
                                <p>Upload Speed: <?php echo $provider->uploadSpeed/(1024*1024); ?>Mbps</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <?php foreach ($provider->vpn as $j => $vpn) { ?>
                    <button class="btn btn-outline-primary download">Endpoint <?php echo ++$j; ?></button>
                    <?php } ?>
                </div>
            </div>
            
            <?php }} ?>

        </main>

        <?php include_once './src/php/footer.php' ?>

    </body>

</html>
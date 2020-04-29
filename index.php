<?php
    include_once 'api.php'
?>

<!DOCTYPE html>

<html>

    <head>
        
        <?php include_once './src/php/head.php' ?>
        
        <script>

        </script>

        <style>

        </style>

    </head>

    <body>

        <?php include_once './src/php/header.php' ?>
        <?php include_once './src/php/navi.php' ?>

        <main class="container-fluid">
            <?php foreach ($json->providers as $i => $provider) { 
                if ($provider->type == "vpn") {?>
            <input type="hidden" name="provider" value="<?php echo $i?>">
            <div class="title row">
                <h3><?php echo $provider->providerName ?></h3>
            </div>
            <div class="provider row">
                <div class="providerDetails col">
                    <p>Description:<br/><span class="indent"><?php echo $provider->name ?></span></p>
                    <p>Payment ID:<br/><span class="indent"><?php echo $provider->id ?></span></p>
                    <p>Provider Wallet:<br/><span class="indent"><?php echo $provider->providerWallet ?></span></p>
                </div>
                <div class="vpnDetails col">
                    <p>Download Speed:<br/><span class="indent"><?php echo $provider->downloadSpeed ?></span></p>
                    <p>Upload Speed:<br/><span class="indent"><?php echo $provider->uploadSpeed ?></span></p>
                    <p>Speed:<br/><span class="indent"><?php echo $provider->mSpeed ?></span></p>
                    <p>Stability:<br/><span class="indent"><?php echo $provider->mStability ?></span></p>
                </div>
                <div class="price col">
                    <p>Cost:<br/><span class="indent"><?php echo $provider->cost ?></span></p>
                </div>
            </div>
            <div class="download row text-right">
                <?php foreach ($provider->vpn as $j => $vpn) { ?>
                <button class="btn btn-outline-primary download">Endpoint <?php echo ++$j; ?>
                <?php } ?>
            </div>
            <div class="row">
            <br/>
            </div>
            <?php }} ?>
            </div>
        </main>
        <?php include_once './src/php/footer.php' ?>

    </body>

</html>
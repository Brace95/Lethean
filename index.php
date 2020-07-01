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
                    let cert = $(this).parent().find(".cert").val();

                    $.ajax({
                        method: "GET",
                        url: "generate.php", 
                        data: {host: host, port: port, cert: cert}
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
            <!-- Rounded switch -->
            <label class="switch">
                <input type="checkbox" id="theme-slider" onclick="themeSlider()">
                <span class="slider round"></span>
            </label>
        </div>

        <?php include_once './src/php/header.php' ?>
        <?php include_once './src/php/navi.php' ?>

        <main class="container">
            <?php 
                foreach ($json as $i => $provider) { 
                    if ($provider['type'] == "vpn") {
            ?>

            <div class="card light-card">
                <span class="coming-soon"><img src="https://raw.githubusercontent.com/LetheanMovement/lethean-gui/master/images/lockIcon.png" class="text-center lock" alt="map"/> map coming soon</span>
                <div class="card-header">
                    <h5 class-="card-title"><?php echo $provider['providerName']; ?></h5> 
                </div>
                <div class="card-body light-card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col text-right">
                                <p class="light-card-body-headings">Provider Terms</p>
                            </div>
                            <div class="col-6 text-left">
                                <span class="light-card-value"><?php echo $provider['name']; ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col text-right">
                                <span class="light-card-body-headings">Stability</span>
                            </div>
                            <div class="col-6 text-left">
                                <span class="light-card-value"><?php 
                                if ($provider['mStability'] == "") {
                                    echo "Not Rated";
                                }
                                else { ?>
                                        <?php 
                                        $rating = $provider['mStability'];  // enter provider endpoint rating
                                        $max_stars = 5; // maximum no. of stars
                                        $star_rate = is_int($rating) ? 1 : 0;

                                        for ($i = 1; $i <= $max_stars; $i++) { ?>
                                            <?php if(round($rating) == $i && !$star_rate) { ?>
                                                <span class="<?php echo 'fa fa-star fa-star-half-full'; ?>"></span>
                                            <?php } elseif(round($rating) >= $i) { ?>
                                                <span class="<?php echo 'fa fa-star checked'; ?>"></span>
                                            <?php } else { ?>
                                                <span class="<?php echo 'fa fa-star unchecked'; ?>"></span>
                                            <?php }   
                                        } ?><br>
                                    <?php // echo $provider->mStability." of 5";
                                };
                                ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col text-right">
                                <span class="light-card-body-headings">Speed</span>
                            </div>
                            <div class="col-6 text-left">
                                <span class="light-card-value"><?php 
                                if ($provider['mSpeed'] == "") {
                                    echo "Not Rated";
                                }
                                else { ?>
                                    <?php 
                                    $rating = $provider['mSpeed'];  // enter provider endpoint rating
                                    $max_stars = 5; // maximum no. of stars
                                    $star_rate = is_int($rating) ? 1 : 0;

                                    for ($i = 1; $i <= $max_stars; $i++) { ?>
                                        <?php if(round($rating) == $i && !$star_rate) { ?>
                                            <span class="<?php echo 'fa fa-star fa-star-half-full'; ?>"></span>
                                        <?php } elseif(round($rating) >= $i) { ?>
                                            <span class="<?php echo 'fa fa-star checked'; ?>"></span>
                                        <?php } else { ?>
                                            <span class="<?php echo 'fa fa-star unchecked'; ?>"></span>
                                        <?php }   
                                    } ?><br>
                                    <?php // echo $provider->mSpeed." of 5"; 
                                };
                                ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            </div>
                            <div class="col text-right">
                                <span class="light-card-body-headings">Download</span>
                            </div>
                            <div class="col-6 text-left">
                                <span class="light-card-value"><?php echo number_format($provider['downloadSpeed']/(1000*1000), 0); ?> Mbps</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            </div>
                            <div class="col text-right">
                                <span class="light-card-body-headings">Upload</span>
                            </div>
                            <div class="col-6 text-left">
                                <span class="light-card-value"><?php echo number_format($provider['uploadSpeed']/(1000*1000), 0); ?> Mbps</span>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col">
                            </div>
                            <div class="col text-right">
                                <span class="light-card-body-headings">Price</span>
                            </div>                            
                            <div class="col-6 text-left">
                                <span class="light-card-value"><?php echo number_format($provider['cost'], 1); ?>
                                <img class="bullet" src="<?php echo $lethean_logo; ?>">
                                / min</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <span class="light-card-body-headings">1st PrePaid Mins</span>
                            </div>
                            <div class="col-6 text-left">
                                <span class="light-card-value"><em><?php echo ($provider['firstPrePaidMinutes'] * $provider['cost']); ?></em>
                                <img class="bullet" src="<?php echo $lethean_logo; ?>" >
                                <em><?php echo " / " . $provider['firstPrePaidMinutes'] . " mins"; ?></em></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <span class="light-card-body-headings">Additional Mins</span>
                            </div>
                            <div class="col-6 text-left">
                                <span class="light-card-value"><em><?php echo ($provider['subsequentPrePaidMinutes'] * $provider['cost']); ?></em>
                                <img class="bullet" src="<?php echo $lethean_logo; ?>" >
                                <em><?php echo " / " . $provider['subsequentPrePaidMinutes'] . " mins"; ?></em></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer light-card-footer">
                    <?php foreach ($provider['vpn'] as $j => $vpn) { ?>
                    <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#provider_<?php echo $provider['provider']."_".$i; ?>_id_<?php echo $provider['id']."_".$j; ?>_details" aria-expanded="false" aria-controls="provider_<?php echo $provider['provider']."_".$i; ?>_id_<?php echo $provider['id']."_".$j; ?>_details">Details</button>
                    <div class="collapse" id="provider_<?php echo $provider['provider']."_".$i; ?>_id_<?php echo $provider['id']."_".$j; ?>_details">
                        <div class="card-body light-card-body">
                            <div class="container">
                                <div class="row">
                                    <p class="col"><span class="light-card-body-headings">Provider </span><span class="light-card-value"><?php echo $provider['provider']; ?></span></p>
                                </div>
                                <div class="row">
                                    <p class="col"><span class="light-card-body-headings">Endpoint </span><span class="light-card-value"><?php echo $vpn['endpoint']; ?><span></p>
                                </div>
                                <div class="row">
                                    <p class="col"><span class="light-card-body-headings">Port </span><span class="light-card-value"><?php echo $vpn['port']; ?></span></p>
                                </div>
                                <div class="row">
                                    <p class="col"><span class="light-card-body-headings">Endpoint Wallet </span><span class="light-card-value"><?php echo $provider['providerWallet']; ?></span></p>
                                </div>
                                <div class="row">
                                    <p class="col"><span class="light-card-body-headings">Payment ID (Required) </span><span class="light-card-value"><?php echo $provider['id']; ?></span></p>
                                </div>
                                <div class="row">
                                    <input type="hidden" class="provider" value="<?php echo str_replace(" ", "_", $provider['providerName']); ?>" />
                                    <input type="hidden" class="id" value="<?php echo ("_" . $provider['id']); ?>" />
                                    <input type="hidden" class="host" value="<?php echo $vpn['endpoint']; ?>" />
                                    <input type="hidden" class="port" value="<?php echo str_replace("/UDP", "", $vpn['port']); ?>" />
                                        <?php foreach ($provider['certArray'] as $k => $certArray) { ?>
                                            <input type="hidden" class="cert" value="<?php echo $certArray['certContent']; ?>" />
                                        <?php } ?>
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
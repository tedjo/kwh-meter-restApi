<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Status PLN</title>


    <!-- Bootstrap core CSS -->
    <link href="<?php base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <!-- <h1>Welcome to Monitoring!</h1> -->
        <br><br>
        <div id="body">

            <!-- <h2><a href="<?php echo site_url('rest-server'); ?>">REST Server Tests</a></h2> -->

            <?php if (file_exists(FCPATH . 'documentation/index.html')) : ?>
                <h2><a href="<?php echo base_url('documentation/index.html'); ?>" target="_blank">REST Server Documentation</a></h2>
            <?php endif ?>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <h1>Welcome to Monitoring!</h1>
                        <!-- <h2><a href="<?php echo site_url('rest-server'); ?>">REST Server Tests</a></h2> -->
                    </li>
                </ol>
            </nav>

            <?php if (file_exists(FCPATH . 'user_guide/index.html')) : ?>
                <p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="<?php echo base_url('user_guide/index.html'); ?>" target="_blank">User Guide</a>.</p>
            <?php endif ?> -->

            <div class="card-deck">

                <div class="card bg-light mb-3 ">
                    <div class="card-header">Amper</div>
                    <div class="card-body">
                        <h5 class="card-title">Voltage Listrik</h5>
                        <p class="card-text">
                            <h1> <?= $kwhmeter['amper']; ?> </h1>
                        </p>
                    </div>
                    <div class="card-footer">
                        <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
                    </div>
                </div>

                <div class="card bg-light mb-3">
                    <div class="card-header">Power</div>
                    <div class="card-body">
                        <h5 class="card-title">Watt Listrik</h5>
                        <p class="card-text">
                            <h1> <?= $kwhmeter['power']; ?> </h1>
                        </p>
                    </div>
                    <div class="card-footer">
                        <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
                    </div>
                </div>

                <div class="card bg-light mb-3">
                    <div class="card-header">Kwh</div>
                    <div class="card-body">
                        <h5 class="card-title">Kilo watt Listrik</h5>
                        <p class="card-text">
                            <h1> <?= $kwhmeter['kwh']; ?> </h1>
                        </p>
                    </div>
                    <div class="card-footer">
                        <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
                    </div>
                </div>

            </div>

            <div class="card bg-light mb-3">
                <div class="card-header">Tarif</div>
                <div class="card-body">
                    <h5 class="card-title">Tagihan Listrik 1 Bulan</h5>
                    <p class="card-text">
                        <h1>Rp <?= $kwhmeter['tarif']; ?>,00 </h1>
                    </p>
                </div>
                <div class="card-footer">
                    <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
                </div>
            </div>

            <div class="alert alert-primary" role="alert">
                Device Start <?= $kwhmeter['time_on']; ?>
            </div>
        </div>
    </div>

</body>

</html>
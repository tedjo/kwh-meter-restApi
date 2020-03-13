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
        <br><br>
        <div id="body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <h1>Welcome to Monitoring!</h1>
                    </li>
                </ol>
            </nav>



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
                        <h1>Rp <?= number_format($kwhmeter['tarif'], 2, ',', '.'); ?> </h1>
                    </p>
                </div>
                <div class="card-footer">
                    <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
                </div>
            </div>

            <div class="card bg-light mb-3">
                <div class="card-header">Rekap Tagihan Bulanan</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">kWh</th>
                            <th scope="col">Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $number = 1; ?>
                        <?php foreach ($rekapdate as $mData) : ?>
                            <tr>
                                <th><?= $number; ?></th>
                                <?php $source = $mData['date'];
                                $date = new DateTime($source); ?>
                                <td><?= $date->format('d-m-Y'); ?></td>
                                <td><?= $mData['kwh']; ?></td>
                                <td>Rp <?= number_format($mData['tarif'], 2, ',', '.'); ?></td>
                            </tr>
                            <?php $number++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <ol class="breadcrumb alert alert-primary" role="alert">
                <?php $sourceDate = $kwhmeter['date'];
                $dateDate = new DateTime($sourceDate); ?>
                <li class="text-nowrap " aria-current="page"><?= $kwhmeter['day']; ?>&nbsp; <?= $dateDate->format('d-m-Y'); ?> | Device &nbsp;</li>
                <?php if ($kwhmeter['status'] == 1) : ?>
                    <li class="text-nowrap  text-success">Redy</a></li>
                <?php else : ?>
                    <li class="text-nowrap  text-danger">Stop</a></li>
                <?php endif; ?>
                &nbsp; <?= $kwhmeter['time_on']; ?>
            </ol>
        </div>
    </div>

</body>

</html>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title ?> Tahun Akademik : <?= $ta_aktif['ta'] ?> <?= $ta_aktif['semester'] ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row">
        <table class="table table-bordered table-striped text-sm">

            <tr class="bg-success color-palette">
                <th rowspan="2" class="text-center">No</th>
                <th rowspan="2" class="text-center">Kode</th>
                <th rowspan="2" class="text-center">Mata Kuliah</th>
                <th colspan="16" class="text-center">Pertemuan</th>
                <th rowspan="2" class="text-center">%</th>
            </tr>

            <tr class="bg-success color-palette">
                <td class="text-center">1</td>
                <td class="text-center">2</td>
                <td class="text-center">3</td>
                <td class="text-center">4</td>
                <td class="text-center">5</td>
                <td class="text-center">6</td>
                <td class="text-center">7</td>
                <td class="text-center">8</td>
                <td class="text-center">9</td>
                <td class="text-center">10</td>
                <td class="text-center">11</td>
                <td class="text-center">12</td>
                <td class="text-center">13</td>
                <td class="text-center">14</td>
                <td class="text-center">15</td>
                <td class="text-center">16</td>
            </tr>

            <tbody>
                <?php $no = 1;
                $sks = 0; //menjumlahkan sks
                foreach ($data_matkul as $key => $value) {
                    $sks = $sks + $value['sks']; //menjumlahkan sks
                ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= $value['kode_matkul'] ?></td>
                        <td><?= $value['matkul'] ?></td>
                        <td class="text-center">
                            <?php if ($value['p1'] == 0) {
                                echo '<i class="fa fa-times text-danger"></i>'; // Jika kondisi tidak hadir maka tandanya silang x
                            } elseif ($value['p1'] == 1) {
                                echo '<i class="fa fa-info text-warning"></i>'; // Jika kondisi tidak hadir maka tandanya i (ijin atau sakit) x
                            } elseif ($value['p1'] == 2) {
                                echo '<i class="fa fa-check text-success"></i>'; // Jika kondisi hadir maka tandanya centang
                            } ?>
                        </td>
                        <td class="text-center">
                            <?php if ($value['p2'] == 0) {
                                echo '<i class="fa fa-times text-danger"></i>'; // Jika kondisi tidak hadir maka tandanya silang x
                            } elseif ($value['p2'] == 1) {
                                echo '<i class="fa fa-info text-warning"></i>'; // Jika kondisi tidak hadir maka tandanya i (ijin atau sakit) x
                            } elseif ($value['p2'] == 2) {
                                echo '<i class="fa fa-check text-success"></i>'; // Jika kondisi hadir maka tandanya centang
                            } ?>
                        </td>
                        <td class="text-center">
                            <?php if ($value['p3'] == 0) {
                                echo '<i class="fa fa-times text-danger"></i>'; // Jika kondisi tidak hadir maka tandanya silang x
                            } elseif ($value['p3'] == 1) {
                                echo '<i class="fa fa-info text-warning"></i>'; // Jika kondisi tidak hadir maka tandanya i (ijin atau sakit) x
                            } elseif ($value['p3'] == 2) {
                                echo '<i class="fa fa-check text-success"></i>'; // Jika kondisi hadir maka tandanya centang
                            } ?>
                        </td>
                        <td class="text-center">
                            <?php if ($value['p4'] == 0) {
                                echo '<i class="fa fa-times text-danger"></i>'; // Jika kondisi tidak hadir maka tandanya silang x
                            } elseif ($value['p4'] == 1) {
                                echo '<i class="fa fa-info text-warning"></i>'; // Jika kondisi tidak hadir maka tandanya i (ijin atau sakit) x
                            } elseif ($value['p4'] == 2) {
                                echo '<i class="fa fa-check text-success"></i>'; // Jika kondisi hadir maka tandanya centang
                            } ?>
                        </td>
                        <td class="text-center">
                            <?php if ($value['p5'] == 0) {
                                echo '<i class="fa fa-times text-danger"></i>'; // Jika kondisi tidak hadir maka tandanya silang x
                            } elseif ($value['p5'] == 1) {
                                echo '<i class="fa fa-info text-warning"></i>'; // Jika kondisi tidak hadir maka tandanya i (ijin atau sakit) x
                            } elseif ($value['p5'] == 2) {
                                echo '<i class="fa fa-check text-success"></i>'; // Jika kondisi hadir maka tandanya centang
                            } ?>
                        </td>
                        <td class="text-center">
                            <?php if ($value['p6'] == 0) {
                                echo '<i class="fa fa-times text-danger"></i>'; // Jika kondisi tidak hadir maka tandanya silang x
                            } elseif ($value['p6'] == 1) {
                                echo '<i class="fa fa-info text-warning"></i>'; // Jika kondisi tidak hadir maka tandanya i (ijin atau sakit) x
                            } elseif ($value['p6'] == 2) {
                                echo '<i class="fa fa-check text-success"></i>'; // Jika kondisi hadir maka tandanya centang
                            } ?>
                        </td>
                        <td class="text-center">
                            <?php if ($value['p7'] == 0) {
                                echo '<i class="fa fa-times text-danger"></i>'; // Jika kondisi tidak hadir maka tandanya silang x
                            } elseif ($value['p7'] == 1) {
                                echo '<i class="fa fa-info text-warning"></i>'; // Jika kondisi tidak hadir maka tandanya i (ijin atau sakit) x
                            } elseif ($value['p7'] == 2) {
                                echo '<i class="fa fa-check text-success"></i>'; // Jika kondisi hadir maka tandanya centang
                            } ?>
                        </td>
                        <td class="text-center">
                            <?php if ($value['p8'] == 0) {
                                echo '<i class="fa fa-times text-danger"></i>'; // Jika kondisi tidak hadir maka tandanya silang x
                            } elseif ($value['p8'] == 1) {
                                echo '<i class="fa fa-info text-warning"></i>'; // Jika kondisi tidak hadir maka tandanya i (ijin atau sakit) x
                            } elseif ($value['p8'] == 2) {
                                echo '<i class="fa fa-check text-success"></i>'; // Jika kondisi hadir maka tandanya centang
                            } ?>
                        </td>
                        <td class="text-center">
                            <?php if ($value['p9'] == 0) {
                                echo '<i class="fa fa-times text-danger"></i>'; // Jika kondisi tidak hadir maka tandanya silang x
                            } elseif ($value['p9'] == 1) {
                                echo '<i class="fa fa-info text-warning"></i>'; // Jika kondisi tidak hadir maka tandanya i (ijin atau sakit) x
                            } elseif ($value['p9'] == 2) {
                                echo '<i class="fa fa-check text-success"></i>'; // Jika kondisi hadir maka tandanya centang
                            } ?>
                        </td>
                        <td class="text-center">
                            <?php if ($value['p10'] == 0) {
                                echo '<i class="fa fa-times text-danger"></i>'; // Jika kondisi tidak hadir maka tandanya silang x
                            } elseif ($value['p10'] == 1) {
                                echo '<i class="fa fa-info text-warning"></i>'; // Jika kondisi tidak hadir maka tandanya i (ijin atau sakit) x
                            } elseif ($value['p10'] == 2) {
                                echo '<i class="fa fa-check text-success"></i>'; // Jika kondisi hadir maka tandanya centang
                            } ?>
                        </td>
                        <td class="text-center">
                            <?php if ($value['p11'] == 0) {
                                echo '<i class="fa fa-times text-danger"></i>'; // Jika kondisi tidak hadir maka tandanya silang x
                            } elseif ($value['p11'] == 1) {
                                echo '<i class="fa fa-info text-warning"></i>'; // Jika kondisi tidak hadir maka tandanya i (ijin atau sakit) x
                            } elseif ($value['p11'] == 2) {
                                echo '<i class="fa fa-check text-success"></i>'; // Jika kondisi hadir maka tandanya centang
                            } ?>
                        </td>
                        <td class="text-center">
                            <?php if ($value['p12'] == 0) {
                                echo '<i class="fa fa-times text-danger"></i>'; // Jika kondisi tidak hadir maka tandanya silang x
                            } elseif ($value['p12'] == 1) {
                                echo '<i class="fa fa-info text-warning"></i>'; // Jika kondisi tidak hadir maka tandanya i (ijin atau sakit) x
                            } elseif ($value['p12'] == 2) {
                                echo '<i class="fa fa-check text-success"></i>'; // Jika kondisi hadir maka tandanya centang
                            } ?>
                        </td>
                        <td class="text-center">
                            <?php if ($value['p13'] == 0) {
                                echo '<i class="fa fa-times text-danger"></i>'; // Jika kondisi tidak hadir maka tandanya silang x
                            } elseif ($value['p13'] == 1) {
                                echo '<i class="fa fa-info text-warning"></i>'; // Jika kondisi tidak hadir maka tandanya i (ijin atau sakit) x
                            } elseif ($value['p13'] == 2) {
                                echo '<i class="fa fa-check text-success"></i>'; // Jika kondisi hadir maka tandanya centang
                            } ?>
                        </td>
                        <td class="text-center">
                            <?php if ($value['p14'] == 0) {
                                echo '<i class="fa fa-times text-danger"></i>'; // Jika kondisi tidak hadir maka tandanya silang x
                            } elseif ($value['p14'] == 1) {
                                echo '<i class="fa fa-info text-warning"></i>'; // Jika kondisi tidak hadir maka tandanya i (ijin atau sakit) x
                            } elseif ($value['p14'] == 2) {
                                echo '<i class="fa fa-check text-success"></i>'; // Jika kondisi hadir maka tandanya centang
                            } ?>
                        </td>
                        <td class="text-center">
                            <?php if ($value['p15'] == 0) {
                                echo '<i class="fa fa-times text-danger"></i>'; // Jika kondisi tidak hadir maka tandanya silang x
                            } elseif ($value['p15'] == 1) {
                                echo '<i class="fa fa-info text-warning"></i>'; // Jika kondisi tidak hadir maka tandanya i (ijin atau sakit) x
                            } elseif ($value['p15'] == 2) {
                                echo '<i class="fa fa-check text-success"></i>'; // Jika kondisi hadir maka tandanya centang
                            } ?>
                        </td>
                        <td class="text-center">
                            <?php if ($value['p16'] == 0) {
                                echo '<i class="fa fa-times text-danger"></i>'; // Jika kondisi tidak hadir maka tandanya silang x
                            } elseif ($value['p16'] == 1) {
                                echo '<i class="fa fa-info text-warning"></i>'; // Jika kondisi tidak hadir maka tandanya i (ijin atau sakit) x
                            } elseif ($value['p16'] == 2) {
                                echo '<i class="fa fa-check text-success"></i>'; // Jika kondisi hadir maka tandanya centang
                            } ?>
                        </td>
                        <td class="text-center">
                            <?php
                            $absensi = ($value['p1'] +
                                $value['p2']  +
                                $value['p3'] +
                                $value['p4'] +
                                $value['p5'] +
                                $value['p6'] +
                                $value['p7'] +
                                $value['p8'] +
                                $value['p9'] +
                                $value['p10'] +
                                $value['p11'] +
                                $value['p12'] +
                                $value['p13'] +
                                $value['p14'] +
                                $value['p15'] +
                                $value['p16']) / 32 * 100;
                            echo  number_format($absensi, 0) . ' %'; // untuk menghilangkan 1 angka di belakang koma
                            ?>
                        </td>
                    </tr>
                <?php } ?>

                <tr class="bg-success color-palette">
                    <th rowspan="2" class="text-center">No</th>
                    <th rowspan="2" class="text-center">Kode</th>
                    <th rowspan="2" class="text-center">Mata Kuliah</th>
                    <th colspan="16" class="text-center">Pertemuan</th>
                    <th class="text-center">%</th>

                </tr>
            </tbody>
        </table>
    </div>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIAKAD| Print Absensi</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 4 -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/adminlte.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Print Landscape Belum berhasil Tutorial 56 -->
</head>

<body onload="windows.print()">
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-book"></i> Absensi Kelas
                    <small class="float-right"><?= date('d M Y') ?></small>
                </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-6 table-responsive">
                <table class="table table-bordered table-striped text-sm">
                    <tr>
                        <td>Program Studi</td>
                        <td width="30px" class="text-center">:</td>
                        <td><?= $jadwal['prodi'] ?></td>
                    </tr>
                    <tr>
                        <td>Fakultas</td>
                        <td class="text-center">:</td>
                        <td><?= $jadwal['fakultas'] ?></td>
                    </tr>
                    <tr>
                        <td>Kode</td>
                        <td class="text-center">:</td>
                        <td><?= $jadwal['kode_matkul'] ?></td>
                    </tr>

                </table>
            </div>
            <div class="col-6 table-responsive">
                <table class="table table-bordered table-striped text-sm">
                    <tr>
                        <td>Mata Kuliah</td>
                        <td class="text-center">:</td>
                        <td><?= $jadwal['matkul'] ?></td>
                    </tr>
                    <tr>
                        <td>Jadwal</td>
                        <td class="text-center">:</td>
                        <td><?= $jadwal['hari'] ?>, <?= $jadwal['waktu'] ?></td>
                    </tr>
                    <tr>
                        <td>Dosen</td>
                        <td class="text-center">:</td>
                        <td><?= $jadwal['nama_dosen'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col sm-12">
            <table class="table table-bordered table-striped text-sm">

                <tr class="bg-success color-palette">
                    <th rowspan="2" class="text-center">No</th>
                    <th rowspan="2" class="text-center">Nim</th>
                    <th rowspan="2" class="text-center">Mahasiswa</th>
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

                    foreach ($mhs as $key => $value) {
                    ?>
                        <tr>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['nim'] ?></td>
                            <td><?= $value['nama_mhs'] ?></td>
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
                        <th rowspan="2" class="text-center">Nim</th>
                        <th rowspan="2" class="text-center">Mahasiswa</th>
                        <th colspan="16" class="text-center">Pertemuan</th>
                        <th colspan="16" class="text-center">%</th>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>




    <div class="row">
        <!-- accepted payments column -->
        <div class="col-4">
        </div>
        <!-- /.col -->
        <div class="col-4">


        </div>
        <div class="col-4">
            Luwuk, <?= date('d M Y') ?>
            <br> Dosen Pengampuh<br>
            <br>
            dto,
            <br>
            <br>
            <br>
            <?= $jadwal['nama_dosen'] ?>
        </div>
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
    <!-- ./wrapper -->

    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
</body>

</html>
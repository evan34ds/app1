<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIAKAD| Print KRS</title>
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
</head>

<body>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-9">
                        <h1 class="m-0 text-dark"><?= $title ?> Mata Kuliah : <?= $jadwal['matkul'] ?></h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="row">
            <table class="table table-bordered table-striped text-sm">
                <div class="col-sm-12">
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
                    <tr>
                        <td>Mata Kuliah</td>
                        <td class="text-center">:</td>
                        <td><?= $jadwal['matkul'] ?></td>
                    </tr>
                    <tr>
                        <td>Mata Kuliah</td>
                        <td class="text-center">:</td>
                        <td><?= $jadwal['nama_kelas_perkuliahan'] ?></td>
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


            <div class="col-sm-12">
                <?php

                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>
                <table class="table table-bordered table-striped text-sm">

                    <tr class="bg-success color-palette">
                        <th rowspan="2" class="text-center">NO</th>
                        <th rowspan="2" class="text-center">NIM</th>
                        <th rowspan="2" class="text-center">MAHASISWA</th>
                        <th colspan="3" class="text-center">NILAI</th>
                        <th rowspan="2" class="text-center">KET</th>
                    </tr>
                    <tr class="bg-success color-palette">
                        <td class="text-center">ANGKA</td>
                        <td class="text-center">HURUF</td>
                        <td class="text-center">INDEX</td>
                    </tr>
                    <tbody>
                        <?php $no = 1;

                        foreach ($mhs as $key => $value) {
                            echo form_hidden($value['id_krs'] . 'id_krs', $value['id_krs']);
                        ?>
                            <tr>
                            <tr>

                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $value['nim'] ?></td>
                                <td><?= $value['nama_mhs'] ?></td>
                                <td><input name="" type="text" value="<?= $value['nilai'] ?>" min="0" max="100" class="form-control" disabled></td>
                                <td><input name="" type="text" value="<?= $value['nilai_huruf'] ?>" min="0" max="100" class="form-control" disabled></td>
                                <td class="text-center"><?= $value['nilai_index'] ?></td>
                                <td class="text-center"><?= $value['keterangan'] ?></td>
                            </tr>
                            </tr>
                        <?php } ?>

                        <tr class="bg-success color-palette">
                            <th rowspan="2" class="text-center">NO</th>
                            <th rowspan="2" class="text-center">NIM</th>
                            <th rowspan="2" class="text-center">MAHASISWA</th>
                            <th colspan="20" class="text-center">NILAI</th>

                        </tr>
                    </tbody>
                </table>
                <?php echo form_close() ?>
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
                <br> Dosen Pengampuh <br>
                <br>
                dto,
                <br>
                <br>
                <br>
                <?= $jadwal['nama_dosen'] ?>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
</body>
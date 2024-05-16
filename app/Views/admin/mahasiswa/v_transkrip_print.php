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
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <table class="table table-bordered table-striped">
                <div class="col-sm-12">
                    <tr>
                        <td>Nim</td>
                        <td>:</td>
                        <td><?= $mhs['nim'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $mhs['nama_mhs'] ?></td>
                    </tr>
                    <tr>
                        <td>Fakultas</td>
                        <td>:</td>
                        <td><?= $mhs['fakultas'] ?></td>
                    </tr>
                    <tr>
                        <td>Program Studi</td>
                        <td>:</td>
                        <td><?= $mhs['prodi'] ?></td>
                    </tr>
                    <tr>
                        <td>Rombongan Kelas</td>
                        <td>:</td>
                        <td><?= $mhs['nama_kelas'] ?>-<?= $mhs['tahun_angkatan'] ?></td>
                    </tr>
                    <tr>
                        <td>Dosen Pembimbing Akademik</td>
                        <td>:</td>
                        <td><?= $mhs['nama_dosen'] ?></td>
                    </tr>
            </table>
            <!-- /.col -->

            <!-- /.row -->

            <!-- Table row -->
            <div class="col-sm-12">
                <table class="table table-bordered table-striped text-sm">
                    <thead>
                        <tr class="bg-success color-palette">
                            <th class="text-center">WIDI</th>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Mata Kuliah</th>
                            <th class="text-center">Tahun Akademik</th>
                            <th class="text-center">SKS</th>
                            <th class="text-center">SMT</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Dosen</th>
                            <th class="text-center">Nilai</th>
                            <th class="text-center">Huruf</th>
                            <th class="text-center">Index</th>
                            <th class="text-center">SKS * N. Indeks</th>
                            <th class="text-center">Keterangan</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $sks = 0; //menjumlahkan sks
                        $nilai = 0;
                        $totalindex = 0;
                        $db      = \Config\Database::connect();
                        foreach ($data_matkul_aktif as $key => $value) {          //ini menjadi wakil databases yang bisa di ambil

                            $st = $db->table('tbl_krs')
                                ->where('id_mhs', $value['id_mhs']) // Membuat Jumlah Mata Kuliah
                                ->where('id_jadwal', $value['id_jadwal']) // Membuat Jumlah Mata Kuliah
                                ->countAllResults();

                            $sks = $sks + $value['sks']; //menjumlahkan sks
                            $kod = $value['kode_matkul'];

                            $tambahmatkul = 24 - $sks;
                            $kontrak = 24;
                            $jumlahmatakuliah = 1;
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $value['kode_matkul'] ?></td>
                                <td class="text-center"><?= $value['ta'] ?> <?= $value['semester'] ?> </td>
                                <td><?= $value['matkul'] ?></td>
                                <td class="text-center"><?= $value['sks'] ?></td>
                                <td class="text-center"><?= $value['smt'] ?></td>
                                <td class="text-center"><?= $value['nama_kelas_perkuliahan'] ?></td>
                                <td><?= $value['nama_dosen'] ?></td>
                                <td class="text-center"><?= $value['nilai'] ?></td>
                                <td class="text-center"><?= $value['nilai_huruf'] ?></td>
                                <td class="text-center"><?= $value['nilai_index'] ?></td>
                                <td class="text-center">
                                    <?php
                                    $jumla2 = 0;


                                    echo $bobot[$nilai] = $value['sks']  * $value['nilai_index']; //SKS * N. Indeks
                                    $totalindex = $totalindex  + $bobot[$nilai]; //Rumus mendapatkan total index

                                    $ipk = $totalindex / $sks;

                                    ?>
                                </td>
                                <td class="text-center">
                                    <?= $value['ceklis_transkrip'] ?>
                                </td>


                            </tr>
                        <?php } ?>

                        <?php if (isset($totalindex, $ipk)) { ?> <!-- jika mendapatkan nilai kosong -->
                            <tr class="bg-warning color-palette">
                                <td align="right" colspan="4">Total SKS</td>
                                <td align="center"> <?= $sks ?></td> <!-- Mendapatkan total sks -->
                                <td colspan="6"></td>
                                <td align="center"><?= $totalindex ?></td>
                                <td></td> <!-- Menpatkan nilai semua index -->
                            </tr>

                            <tr class="bg-warning color-palette">
                                <td align="right" colspan="11">IPS</td>
                                <td align="center"><?= $ipk ?> </td>
                                <td></td>
                            </tr>
                        <?php } else { ?>
                            <p>belum ada data</p>
                        <?php } ?>


                    </tbody>
                </table>
                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-4">
                    </div>
                    <!-- /.col -->
                    <div class="col-4">


                    </div>
                    <div class="col-4">
                        Luwuk, <?= date('d M Y') ?>
                        <br>Ketua Program Studi<br>
                        <br>
                        dto,
                        <br>
                        <br>
                        <br>
                        <?= $mhs['nama_dosen'] ?>
                    </div>
                </div>

            </div>


            <script type="text/javascript">
                window.addEventListener("load", window.print());
            </script>
</body>

</html>
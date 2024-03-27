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
                        <th width="20px" rowspan="7"><img src="<?= base_url('fotomahasiswa/' . $mhs['foto_mhs']) ?>" width="120px" height="150px"></th>
                        <th width="250px">Tahun Akademik</th>
                        <th width="20px">:</th>
                        <th><?= $ta_aktif['ta'] ?> <?= $ta_aktif['semester'] ?></th>
                        <th rowspan="7"></th>
                    </tr>
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
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-bordered table-striped text-sm">
                        <thead>
                            <tr class="bg-success color-palette">
                                <th class="text-center">No</th>
                                <th class="text-center">Kode</th>
                                <th class="text-center">Mata Kuliah</th>
                                <th class="text-center">SKS</th>
                                <th class="text-center">SMT</th>
                                <th class="text-center">Kelas</th>
                                <th class="text-center">Ruang</th>
                                <th class="text-center">Dosen</th>
                                <th class="text-center">Waktu</th>
                                <th class="text-center">Masalah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $sks = 0; //menjumlahkan sks
                            $db      = \Config\Database::connect(); 
                            foreach ($data_matkul as $key => $value) {

                                $st = $db->table('tbl_krs')
                                ->where('id_mhs', $value['id_mhs']) // Membuat Jumlah Mata Kuliah
                                ->where('id_jadwal', $value['id_jadwal']) // Membuat Jumlah Mata Kuliah
                                ->countAllResults();
                                
                                $sks = $sks + $value['sks']; //menjumlahkan sks
                                
                                $jumlahmatakuliah = 1;
                                $kontrak = 25;
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-center"><?= $value['kode_matkul'] ?></td>
                                    <td><?= $value['matkul'] ?></td>
                                    <td class="text-center"><?= $value['sks'] ?></td>
                                    <td class="text-center"><?= $value['smt'] ?></td>
                                    <td class="text-center"><?= $value['nama_kelas_perkuliahan'] ?></td>
                                    <td class="text-center"><?= $value['ruangan'] ?></td>
                                    <td><?= $value['nama_dosen'] ?></td>
                                    <td class="text-center"><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
                                    <td class="text-center"> 
                                    <?php if ($st >> $jumlahmatakuliah ) { ?> 
                                        <span class="badge badge-danger">MATA KULIAH LEBIH DARI 1</span>
                                    <?php } else { ?>
                                            <i class="badge badge-success">Tidak ada Dobel</i>
                                    <?php  }  ?>
                                    </b></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <H4><b>Jumlah SKS : <?= $sks ?>
                                        <span class="badge badge-danger">Batas Kontrak hanya : 24 SKS </span>
                                    </b></H4>

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-4">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">


                        </div>
                        <div class="col-4">
                            Luwuk, <?= date('d M Y') ?>
                            <br> Pembimbing Akademik <br>
                            <br>
                            dto,
                            <br>
                            <br>
                            <br>
                            <?= $mhs['nama_dosen'] ?>
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
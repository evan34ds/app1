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
        <!--tabel menggunakan https://www.tablesgenerator.com/-->
        <table class="table table-bordered table-striped">
            <div class="col-sm-12">
                <tr>
                    <th width="20px" rowspan="7"><img src="<?= base_url('fotomahasiswa/' . $mhs['foto_mhs']) ?>" width="120px" height="150px"></th>
                    <th width=" 150px">Tahun Akademik</th>
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
                    <td>Rombongan Kelas Pembimbing Akademik</td>
                    <td>:</td>
                    <td><?= $mhs['nama_kelas'] ?></td>
                </tr>
                <tr>
                    <td>Dosen Pembimbing Akademik</td>
                    <td>:</td>
                    <td><?= $mhs['nama_dosen'] ?></td>
                </tr>
        </table>
    </div>
    <div class="col-sm-12">

        <?php //1. JIKA LEBI 24 SKS MAKA TIDAK BISA PRINT DAN TAMBAH MATA KULIAH 2. JIKA SKS TELAH MENCAPAI 24 SKS MAKA TDAK BISA MENAMBAH DAN PRINT  
        $sks = 0; //menjumlahkan sks
        $db      = \Config\Database::connect();
        foreach ($data_matkul as $key => $value) {          //ini menjadi wakil databases yang bisa di ambil

            $st = $db->table('tbl_krs')
                ->where('id_mhs', $value['id_mhs']) // Membuat Jumlah Mata Kuliah
                ->where('id_jadwal', $value['id_jadwal']) // Membuat Jumlah Mata Kuliah
                ->countAllResults();

            $sks = $sks + $value['sks']; //menjumlahkan sks
            $kod = $value['kode_matkul'];

            $tambahmatkul = 24 - $sks;
            $kontrak = 24;

        ?>
        <?php }
        $jumlahmatakuliah = 1;
        ?>

        <?php
        if ($mhs['id_krs'] == $jumlahmatakuliah && $ta_aktif['id_ta'] == $mhs['id_ta']) { ?>
            <button type="button" class="btn-flat bg-primary color-palette" data-toggle="modal" data-target="#add">
                <i class="fa fa-plus">TAMBAH MATA KULIAH</i>
            </button>

            
            <b>
            <a href="<?= base_url('krs/print') ?>" target="_blank" class="btn-flat bg-success color-palette">
            <i class="fa fa-print">PRINT KRS</i></a>

        <?php } else { ?>
           <div class="alert alert-danger alert-dismissible" role="alert">Anda tidak bisa mengakses KRS disebapkan Belum mengurus Administrasi</i>
        </div>
        <?php } ?>


        </b>

    </div>
    <div class="col-sm-12">
        <?php
        $errors = session()->getFlashdata('errors');
        if (!empty($errors)) { ?>
            <div class="card card-success" role="alert">
                <ul>
                    <?php foreach ($errors as $key => $value) { ?>
                        <li><?= esc($value) ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
        <?php //pesan berhasil di simpan
        if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('pesan');
            echo '</div>';
        }
        ?>

        <?php
        if (session()->getFlashdata('gagal')) {
            echo '<div class="alert alert-danger alert-dismissible" role="alert"></i>';
            echo session()->getFlashdata('gagal');
            echo '</div>';
        }
        ?>

        <?php
        if (session()->getFlashdata('gagal_krs')) {
            echo '<div class="alert alert-danger alert-dismissible" role="alert"><i class="icon fas fa-ban"></i>';
            echo 'Mata Kuliah ';
            echo session()->getFlashdata('gagal_krs');
            echo '</div>';
        }
        ?>

        <?php
        if (session()->getFlashdata('gagal_status_perkuliahan')) {
            echo '<div class="alert alert-danger alert-dismissible" role="alert"><i class="icon fas fa-ban"></i>';
            echo 'Anda Belum Aktif sebagai pengisi KRS lengkapi Administrasi';
            echo session()->getFlashdata('gagal_krs');
            echo '</div>';
        }
        ?>

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
                    <th class="text-center">Action</th>
                    <th class="text-center">Ket</th>
                    <th class="text-center">Masalah</th>
                    <th>sks</th>

                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $sks = 0; //menjumlahkan sks
                $db      = \Config\Database::connect();
                foreach ($data_matkul as $key => $value) {          //ini menjadi wakil databases yang bisa di ambil

                    $st = $db->table('tbl_krs')
                        ->where('id_mhs', $value['id_mhs']) // Membuat Jumlah Mata Kuliah
                        ->where('id_jadwal', $value['id_jadwal']) // Membuat Jumlah Mata Kuliah
                        ->countAllResults();

                    $sks = $sks + $value['sks']; //menjumlahkan sks
                    $kod = $value['kode_matkul'];

                    $tambahmatkul = 24 - $sks;
                    $jumlahmatakuliah = 1;
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
                        <td><button class='btn btn-block btn-outline-danger btn-xs' data-toggle="modal" data-target="#delete<?= $value['id_krs'] ?>"><i class="fas fa-trash"></i></button></td>
                        <td class="text-center"><?= $st ?></td>
                        <td class="text-center">
                            <?php if ($st >> $jumlahmatakuliah) { ?>
                                <span class="badge badge-danger">MATA KULIAH LEBIH DARI 1</span>
                            <?php } else { ?>
                                <i class="badge badge-success">Tidak ada Dobel</i>
                            <?php  }  ?>
                            </b>
                        </td>
                        <td><?= $sks ?></td>
                    </tr>
                <?php } ?>



                <tr class="bg-success color-palette">
                    <th>#</th>
                    <th>Kode</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>SMT</th>
                    <th>Kelas</th>
                    <th>Ruang</th>
                    <th>Dosen</th>
                    <th>Waktu</th>
                    <th>Action</th>
                    <th>keterangan</th>
                    <th>Masalah</th>
                    <th>sks</th>
                </tr>
            </tbody>
        </table>

        <H4><b>Jumlah SKS : <?= $sks ?>
    </div>
</div>

<!-- <H4><b>Jumlah SKS : $sks </b></H4> -->
<!-- modal add -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Daftar Mata Kuliah Ditawarkan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped-md text-sm" id="example1">
                    <thead>
                        <tr class="bg-success color-palette">
                            <th class="text-center">#</th>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Mata Kuliah</th>
                            <th class="text-center">SKS</th>
                            <th class="text-center">SMT</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Ruang</th>
                            <th class="text-center">Dosen</th>
                            <th class="text-center">Waktu</th>
                            <th class="text-center">Quota</th>
                            <th class="text-center">Action</th>
                            <th class="text-center">ket</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $db      = \Config\Database::connect();  // Membuat Jumlah Mata Kuliah
                        foreach ($matkul_ditawarkan as $key => $value) {
                            $jml = $db->table('tbl_krs')
                                ->where('id_jadwal', $value['id_jadwal']) // Membuat Jumlah Mata Kuliah
                                ->countAllResults();

                            $mhs = $db->table('tbl_krs')
                                // ->where('id_mhs', $value['id_mhs']) // Membuat Jumlah Mata Kuliah
                                ->where('id_jadwal', $value['id_jadwal']) // Membuat Jumlah Mata Kuliah
                                ->countAllResults();

                        ?>

                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['kode_matkul'] ?></td>
                                <td><?= $value['matkul'] ?> (
                                    <?= $value['kode_prodi'] ?>)
                                </td>
                                <td><?= $value['sks'] ?></td>
                                <td><?= $value['smt'] ?></td>
                                <td><?= $value['nama_kelas_perkuliahan'] ?></td>
                                <td><?= $value['ruangan'] ?></td>
                                <td><?= $value['nama_dosen'] ?></td>
                                <td><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
                                <td class="text-center">
                                    <span class="badge bg-success"><?= $jml ?>/<?= $value['quota'] ?></span>
                                </td>
                                <td class="text-center">
                                    <?php if ($jml == $value['quota']) { ?>
                                        <span class="badge bg-success">Full</span>
                                    <?php } else { ?>
                                        <a href="<?= base_url('krs/tambah_matkul/' . $value['id_jadwal']) ?>" class="btn-flat bg-primary color-palette">
                                            <i class="fa fa-plus"></i></a>
                                    <?php  }  ?>

                                </td>
                                <td><?= $mhs ?></td>

                                </td>
                            </tr> <?php } ?>
                    </tbody>
                </table>

            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- modal delete -->
<?php foreach ($data_matkul as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_krs'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= '$title ' ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    Apakah Anda Yakin Ingin Menghapus <b><?= $value['kode_matkul'] ?>|<?= $value['matkul'] ?>.?</b>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup</button>
                    <a href="<?= ('krs/delete/' . $value['id_krs']) ?>" class="btn btn-info"> Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1>Catatan :</h1>
    <p> 1. fitler mata kuliah di tawarkan sesuai kelas perkuliahan @tgl 12 Juni 2023"</p>
</body>

<h1>Kegitan Selanjutnya :</h1>



<p></p>

</html>
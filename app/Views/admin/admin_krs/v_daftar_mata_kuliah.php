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
                    <th width="150px">Program Studi</th>
                    <td width="30px">:</td>
                    <td><?= $prodi['prodi'] ?></td>
                </tr>
                <tr>
                    <th>Jenjang</th>
                    <td>:</td>
                    <td><?= $prodi['jenjang'] ?></td>
                </tr>
                <tr>
                    <th>Fakultas</th>
                    <td>:</td>
                    <td><?= $prodi['fakultas'] ?></td>
                </tr>
                <tr>
                    <th>Tahun Akademik</th>
                    <td>:</td>
                    <td> <?= $ta_aktif['ta'] ?> <?= $ta_aktif['semester'] ?></td>
                </tr>
        </table>
    </div>
    <div class="col-sm-12">
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

        <table class="table table-bordered table-striped text-sm">
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
                    <th class="text-center">Daftar Mahasiswa</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $sks = 0; //menjumlahkan sks
                $db      = \Config\Database::connect();
                foreach ($matkul_ditawarkan as $key => $value) {          //ini menjadi wakil databases yang bisa di ambil

                    $jml = $db->table('tbl_krs') // Membuat Jumlah Mata Kuliah
                        ->where('id_jadwal', $value['id_jadwal'])
                        ->countAllResults();

                    $tidakadadata = 0;
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
                            <?php if ($jml == $tidakadadata) { ?>
                                <span class="badge bg-danger">Tidak Ada Mahasiswa</span>
                            <?php } else { ?>
                                <a href="<?= base_url('admin/admin_krs_daftar_mahasiswa/' . $value['id_jadwal']) ?>" class="btn-flat bg-primary color-palette">
                                    <i class="fa fa-plus"></i></a>
                            <?php  }  ?>

                        </td>

                        </td>
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
                    <th>Daftar Mahasiswa</th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
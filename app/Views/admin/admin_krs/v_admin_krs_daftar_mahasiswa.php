<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title ?> Kelas : <?= $jadwal['nama_kelas_perkuliahan'] ?></h1>
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

        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title"><?= $title ?></h3>

                <div class="card-tools">
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>

                    <div class="btn-sm btn-danger" role="alert">
                        <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value) ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>

                <?php //pesan berhasil di hapus
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>

                <?php
                if (session()->getFlashdata('gagal')) {
                    echo '<div class="alert alert-danger alert-dismissible" role="alert"><i class="icon fas fa-ban"></i>';
                    echo session()->getFlashdata('gagal');
                    echo '</div>';
                }
                ?>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center">NO</th>
                                <th rowspan="2" class="text-center">NIM</th>
                                <th rowspan="2" class="text-center">MAHASISWA</th>
                                <th rowspan="2" class="text-center">HAPUS</th>
                                <th rowspan="2" class="text-center">KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $db      = \Config\Database::connect();
                            foreach ($mhs as $key => $value) {

                                $st = $db->table('tbl_krs')
                                    ->where('id_mhs', $value['id_mhs']) // Membuat Jumlah Mata Kuliah
                                    ->where('id_jadwal', $value['id_jadwal']) // Membuat Jumlah Mata Kuliah
                                    ->countAllResults();

                                $jumlahmatakuliah = 1;
                                echo form_hidden($value['id_krs'] . 'id_krs', $value['id_krs']);
                            ?>
                                <tr>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-center"><?= $value['nim'] ?></td>
                                    <td><?= $value['nama_mhs'] ?></td>
                                    <td><button class='btn btn-block btn-outline-danger btn-xs' data-toggle="modal" data-target="#delete<?= $value['id_krs'] ?>"><i class="fas fa-trash"></i></button></td>
                                    <td class="text-center">
                                        <?php if ($st >> $jumlahmatakuliah) { ?>
                                            <span class="badge badge-danger">MATA KULIAH LEBIH DARI 1</span>
                                        <?php } else { ?>
                                            <i class="badge badge-success">Tidak ada Dobel</i>
                                        <?php  }  ?>
                                        </b>
                                    </td>
                                </tr>
                            <?php } ?>

                            <tr class="bg-success color-palette">
                                <th rowspan="2" class="text-center">NO</th>
                                <th rowspan="2" class="text-center">NIM</th>
                                <th rowspan="2" class="text-center">MAHASISWA</th>
                                <th rowspan="2" class="text-center">HAPUS</th>
                                <th rowspan="2" class="text-center">KETERANGAN</th>
                            </tr>
                        </tbody>
                    </table>
                    <?php echo form_close() ?>
                </div>
            </div>

        </div>

        <!-- modal delete -->
        <?php foreach ($mhs as $key => $value) { ?>
            <div class="modal fade" id="delete<?= $value['id_krs'] ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Delete Mahasiswa</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            Apakah Anda Yakin Ingin Menghapus <b><?= $value['nim'] ?>|<?= $value['nama_mhs'] ?>.?</b>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup</button>
                            <a href="<?= base_url('/admin/delete/' . $value['id_krs'] . '/' . $jadwal['id_jadwal']) ?>" class="btn btn-info">Delete</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        <?php } ?>
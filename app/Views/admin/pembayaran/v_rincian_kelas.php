<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title ?> : <label class="text-success"><?= $kelas['nama_kelas'] ?>- <?= $kelas['tahun_angkatan'] ?></label></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.ISI DAN TABEL -->
    <div class="col-md-10">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Data <?= $title ?> : <label><?= $kelas['nama_kelas'] ?> - <?= $kelas['tahun_angkatan'] ?></label></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add"><i class="fas fa-plus"> Add</i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <!-- Pesan berhasil -->
                <?php
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

                <?php foreach ($kelas as $key => $value) { ?>

                <?php } ?>

                <table class="table table-bordered">
                    <tr>
                        <th width="150px">Program Studi</th>
                        <th width="30px">:</th>
                        <td><?= $kelas['nama_kelas'] ?> - <?= $kelas['tahun_angkatan'] ?></td>
                        <th width="150px">tgl_masuk</th>
                        <td width="30px">:</td>
                        <td><?= $kelas['tahun_angkatan'] ?></td>

                    </tr>
                    <tr>
                        <th>Nama Program Studi</th>
                        <th>:</th>
                        <td><?= $kelas['prodi'] ?></td>
                        <th>Jumlah</th>
                        <th>:</th>
                        <td><?= $jml ?></td>
                    </tr>
                    <tr>
                        <th>Dosen</th>
                        <td>:</td>
                        <td><?= $kelas['nama_dosen'] ?></td>
                        <th></th>
                        <td></td>
                        <td></td>
                    </tr>
                </table>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center label-success">No</th>
                            <th width="50px" class="text-center label-success">NIM</th>
                            <th class="text-center label-success">Nama Mahasiswa</th>
                            <th class="text-center label-success" width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($mhs as $key => $value) { ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $value['nim'] ?></td>
                                <td><?= $value['nama_mhs'] ?></td>

                                <td class="text-center">
                                    <a href="<?= base_url('kelas/remove_anggota_kelas/' . $value['id_mhs'] . '/' . $kelas['id_kelas']) ?>" class="fas fa-trash btn-sm btn-flat">
                                        <i></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    <tfoot>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th class="text-center">NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th width="30px" class="text-center">Add</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->


    <!-- form inputnya -->
    <div class="modal fade" id="add">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Mahasiswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="50px" class="text-center label-success">No</th>
                                <th width="50px" class="text-center label-success">NIM</th>
                                <th class="text-center label-success">Nama Mahasiswa</th>
                                <th class="text-center label-success">Program Studi</th>
                                <th class="text-center label-success" width="150px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($mhs_tpk as $key => $value) { ?>
                                <?php if ($kelas['id_prodi'] == $value['id_prodi']) { ?>
                                    <!-- mahasiswa flter sesuai program studi (untuk memunculkan semua hapus fungsi ini) -->
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td class="text-center"><?= $value['nim'] ?></td>
                                        <td><?= $value['nama_mhs'] ?></td>
                                        <td><?= $value['prodi'] ?></td>
                                        <td class="text-center">

                                            <a href="<?= base_url('kelas/add_anggota_kelas/' . $value['id_mhs'] . '/' . $kelas['id_kelas']) ?>" class="btn btn-succes btn-xs"><i class="fa fa-plus"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        <tfoot>
                            <tr>
                                <th width="50px" class="text-center">No</th>
                                <th class="text-center">NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th class="text-center label-success">Program Studi</th>
                                <th width="150px" class="text-center">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    </p>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
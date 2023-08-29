<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- /.ISI DAN TABEL -->
    <div class="col-md-10">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Data <?= $title ?></h3>

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
                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>

                <?php foreach ($kelas as $key => $value) { ?>

                <?php } ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th class="text-center">Nama Kelas</th>
                            <th class="text-center">Program Studi</th>
                            <th class="text-center">Pembimbing Akademik</th>
                            <th class="text-center">Tahun</th>
                            <th class="text-center">Jumlah/Kelas</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $db      = \Config\Database::connect();  // Membuat Jumlah Mata Kuliah
                        $no = 1;
                        foreach ($kelas as $key => $value) {
                            $jml = $db->table('tbl_mhs')
                                ->where('id_kelas', $value['id_kelas']) // Membuat Jumlah Mata Kuliah
                                ->countAllResults(); ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td class="text-center"><?= $value['nama_kelas'] ?>-<?= $value['tahun_angkatan'] ?></td>
                                <td><?= $value['prodi'] ?></td>
                                <td><?= $value['nama_dosen'] ?></td>
                                <td class="text-center"><?= $value['tahun_angkatan'] ?></td>
                                <td class=" text-center">
                                    <p class="right badge badge-danger"><?= $jml ?></p>
                                    <br>
                                    <a href="<?= base_url('kelas/rincian_kelas/' . $value['id_kelas']) ?>">Mahasiswa</a>
                                </td>
                                <td class=" text-center">
                                <?php if ($jml == 0) { ?>
                                    <button class="fas fa-trash btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_kelas'] ?>"><i class="fa fa-pencil"></i></button>
                                    <?php } else { ?>
                                        <button class="fas fa-trash btn-sm btn-flat" data-toggle="modal" data-target="#gagal<?= $value['id_kelas'] ?>"><i class="fa fa-pencil"></i></button>
                                    <?php  }  ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th>Nama Kelas</th>
                            <th>Program Studi</th>
                            <th>Pembimbing Akademik</th>
                            <th>Tahun</th>
                            <th>Jumlah</th>
                            <th width="150px" class="text-center">Action</th>
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
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <?php
                        echo form_open('kelas/add');
                        ?>
                        <div class="form-grup">
                            <label>Nama Kelas</label>
                            <input name="nama_kelas" class="form-control" placeholder="Nama Kelas">
                        </div>
                        <div class="form-grup">
                            <label>Program Studi</label>
                            <select name="id_prodi" class="form-control">
                                <option value="">--Pilih Program Studi--</option>
                                <?php foreach ($prodi as $key => $value) { ?>
                                    <option value="<?= $value['id_prodi'] ?>"><?= $value['jenjang'] ?>-<?= $value['prodi'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-grup">
                            <label>Dosen PA</label>
                            <select name="id_dosen" class="form-control">
                                <option value="">--Pilih Program Studi--</option>
                                <?php foreach ($dosen as $key => $value) { ?>
                                    <option value="<?= $value['id_dosen'] ?>"><?= $value['nama_dosen'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-grup">
                            <label>Tahun tgl_masuk</label>
                            <select name="tahun_angkatan" class="form-control">
                                <option value="">--Pilih Tahun--</option>
                                <?php for ($i = date('Y'); $i >= date('Y') - 5; $i--) { ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php  } ?>

                            </select>
                        </div>
                    </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="fas fa-edit btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="fas fa-trash btn-sm btn-flat">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <!-- form delete -->
    <?php foreach ($kelas as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_kelas'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Kelas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus <b><?= $value['nama_kelas'] ?>.?</b>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup</button>
                        <a href="<?= ('kelas/delete/' . $value['id_kelas']) ?>" class="btn btn-info"> Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>

     <!-- form gagal -->
     <?php foreach ($kelas as $key => $value) { ?>
        <div class="modal fade" id="gagal<?= $value['id_kelas'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Kelas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus <b><?= $value['nama_kelas'] ?>.?</b>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup</button>
                        <a href="<?= base_url('kelas/gagal_hapus/' . $value['id_kelas']) ?>" class="btn btn-info"> Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>
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

                <?php
                if (session()->getFlashdata('gagal')) {
                    echo '<div class="alert alert-danger alert-dismissible" role="alert"><i class="icon fas fa-ban"></i>';
                    echo session()->getFlashdata('gagal');
                    echo '</div>';
                }
                ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th class="text-center">Nama Pembayaran</th>
                            <th class="text-center">Biaya</th>
                            <th class="text-center">Tahun Akademik</th>
                            <th class="text-center">Program Studi</th>
                            <th class="text-center">Kategori Pembayaran</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $db      = \Config\Database::connect();  // Membuat Jumlah Mata Kuliah
                        $no = 1;
                        foreach ($pembayaran as $key => $value) {
                            $rupiah = 'Rp ' . number_format($value['biaya'], 0, ',', '.');

                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['nama_pembayaran'] ?></td>
                                <td><?php echo $rupiah; ?></td>
                                <td><?= $value['ta'] ?> <?= $value['semester'] ?></td>
                                <td><?= $value['prodi'] ?></td>
                                <td><?= $value['nama_kategori_pembayaran'] ?></td>
                                <td class=" text-center">
                                    <button class="fas fa-edit btn-sm btn-danger" data-toggle="modal" data-target="#edit<?= $value['id_pembayaran'] ?>"></button>
                                    <button class="fas fa-trash btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_pembayaran'] ?>"><i class="fa fa-pencil"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th>Nama Kelas</th>
                            <th>Biaya</th>
                            <th>Tahun Akademik</th>
                            <th>Program Studi</th>
                            <th>Kategori Pembayaran</th>
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
                    <h4 class="modal-title">Add Pembayaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <?php
                        echo form_open('pembayaran/add');
                        ?>
                    <div class="form-grup">
                        <label>Nama Pembayaran</label>
                        <input name="nama_pembayaran" class="form-control" placeholder="Nama Pembayaran">
                    </div>
                    <div class="form-grup">
                        <label>Biaya</label>
                        <input name="biaya" id="tanpa-rupiah" class="form-control" placeholder="Biaya">
                    </div>

                    <div class="form-grup">
                        <label>Program Studi</label>
                        <select name="id_prodi" class="form-control">
                            <option value="">--Pilih Program Studi--</option>
                            <?php foreach ($prodi as $key => $value) { ?>
                                <option value="<?= $value['id_prodi'] ?>"><?= $value['prodi'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-grup">
                        <label>Kategori Pembayaran</label>
                        <select name="id_kategori_pembayaran" class="form-control">
                            <option value="">--Pilih Kategori Pembayaran--</option>
                            <?php foreach ($kategori_pembayaran as $key => $value) { ?>
                                <option value="<?= $value['id_kategori_pembayaran'] ?>"><?= $value['kode_kategori_pembayaran'] ?> | <?= $value['nama_kategori_pembayaran'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <p>
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

    <!-- form edit -->
    <?php foreach ($pembayaran as $key => $edit) { ?>
        <div class="modal fade" id="edit<?= $edit['id_pembayaran'] ?>">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Pembayaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            <?php
                            echo form_open('pembayaran/edit/' . $edit['id_pembayaran']); ?>
                        <div class="form-grup">
                            <label>Nama Pembayaran</label>
                            <input name="nama_pembayaran" value="<?= $edit['nama_pembayaran'] ?>" class="form-control" placeholder="Nama Pembayaran" required>
                        </div>

                        <div class="form-grup">
                            <label>Biaya</label>
                            <input type="number" name="biaya" id="dengan-rupiah" value="<?= $edit['biaya'] ?>" class="form-control" placeholder="Biaya" required>
                        </div>
                        <div class="form-grup">
                            <label>Mahasiswa Angkatan</label>
                            <select name="id_ta" class="form-control">
                                <option value="<?= $edit['id_ta'] ?>"><?= $edit['ta'] ?> <?= $edit['semester'] ?></option>
                                <?php foreach ($ta as $key => $value) { ?>
                                    <option value="<?= $value['id_ta'] ?>"><?= $value['ta'] ?> <?= $value['semester'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <label>Program Studi</label>
                        <select name="id_prodi" class="form-control">
                            <option value="<?= $edit['id_prodi'] ?>"><?= $edit['prodi'] ?></option>
                            <?php foreach ($prodi as $key => $value) { ?>
                                <option value="<?= $value['id_prodi'] ?>"><?= $value['prodi'] ?></option>
                            <?php } ?>
                        </select>
                        <label>Kategori Pembayaran</label>
                        <select name="id_kategori_pembayaran" class="form-control">
                            <option value="<?= $edit['id_kategori_pembayaran'] ?>"><?= $edit['nama_kategori_pembayaran'] ?></option>
                            <?php foreach ($kategori_pembayaran as $key => $value) { ?>
                                <option value="<?= $value['id_kategori_pembayaran'] ?>"><?= $value['nama_kategori_pembayaran'] ?></option>
                            <?php } ?>
                        </select>

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
    <?php } ?>


    <!-- form delete -->
    <?php foreach ($pembayaran as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_pembayaran'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Pembayaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus <b><?= $value['nama_pembayaran'] ?>/<?= $value['biaya'] ?>.?</b>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup</button>
                        <a href="<?= ('pembayaran/delete_pembayaran/' . $value['id_pembayaran']) ?>" class="btn btn-info"> Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>



    <script type="text/javascript">
        /* Tanpa Rupiah */
        var tanpa_rupiah = document.getElementById('tanpa-rupiah');
        tanpa_rupiah.addEventListener('keyup', function(e) {
            tanpa_rupiah.value = formatRupiah(this.value);
        });

        /* Tanpa Rupiah */
        var tanpa_rupiah = document.getElementById('tanpa1-rupiah');
        tanpa_rupiah.addEventListener('input', function(e) {
            this.value = formatRupiah(this.value);
        });

        /* Dengan Rupiah */
        var dengan_rupiah = document.getElementById('dengan-rupiah');
        dengan_rupiah.addEventListener('keyup', function(e) {
            dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
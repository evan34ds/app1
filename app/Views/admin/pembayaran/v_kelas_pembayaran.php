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

                <?php
                $db      = \Config\Database::connect();  // Membuat Jumlah Mata Kuliah
                foreach ($kelas_pembayaran as $key => $value) {

                    ?>

                <?php } ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th class="text-center">Kode Kelas Pembayaran</th>
                            <th class="text-center">Nama Kelas Pembayaran</th>
                            <th class="text-center">Tahun Akademik</th>
                            <th class="text-center">Program Studi</th>
                            <th class="text-center">Biaya</th>
                            <th class="text-center">Jumlah Mahasiwa</th>
                            <th class="text-center">Daftar Mahasiswa</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php


                        $db      = \Config\Database::connect();  // Membuat Jumlah Mata Kuliah
                        $no = 1;
                        foreach ($kelas_pembayaran as $key => $value) {
                       
                            $jml = $db->table('tbl_kelas_pembayaran')
                            ->where('kode_kelas_pembayaran', $value['kode_kelas_pembayaran'])
                            ->where('tbl_kelas_pembayaran.id_mhs IS NOT NULL')
                            ->where('tbl_kelas_pembayaran.pelunasan IS NULL')
                            ->countAllResults();
                            
                       ?>


                            <tr>
                                <td><?= $no++; ?></td>
                                <td class="text-center"><?= $value['kode_kelas_pembayaran'] ?></td>
                                <td class="text-center"><?= $value['nama_kelas_pembayaran'] ?></td>
                                <td class="text-center"><?= $value['ta'] ?> <?= $value['semester'] ?></td>
                                <td class="text-center"><?= $value['prodi'] ?></td>
                                <td class="text-center"><?= $value['biaya'] ?></td>
                                <td class="text-center">
                                    <?= $jml ?>
                                </td>
                                <td class="text-center">
                                    <a class="fas fa-users btn-sm btn-flat" href="<?= base_url('pembayaran/rincian_kelas_pembayaran/' . $value['id_kelas_pembayaran']) ?>"></a>
                                </td>
                                <td class="text-center">
                                    <button class="fas fa-trash btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_kelas_pembayaran'] ?>"><i class="fa fa-pencil"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th>Kode Kelas Pembayaran</th>
                            <th>Nama Kelas Pembayaran</th>
                            <th>Tahun Angkatan</th>
                            <th>Program Studi</th>
                            <th>Biaya</th>
                            <th>Jumlah Mahasiswa</th>
                            <th>Dafatar Mahasiswa</th>
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
                    <h4 class="modal-title">Add Kelas Pembayaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <?php
                        echo form_open('Pembayaran/add_kelas_pembayaran');
                        ?>

                    <div class="form-grup">
                        <label>Kode Pembayaran</label>
                        <input name="kode_kelas_pembayaran" class="form-control" placeholder="Kode Kelas Perkuliahan" maxlength="6">
                    </div>
                    <div class="form-grup">
                        <label>Nama Kelas Pembayaran</label>
                        <input name="nama_kelas_pembayaran" class="form-control" placeholder="Nama Kelas Pembayaran">
                    </div>
                    <div class="form-grup">
                        <label>Program Studi</label>
                        <select name="id_prodi" class="form-control">
                            <option value="">--Pilih Program Studi--</option>
                            <?php foreach ($prodi as $key => $value) { ?>
                                <option value="<?= $value['id_prodi'] ?>"><?= $value['jenjang'] ?>-<?= $value['prodi'] ?>|<?= $value['prodi'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-grup">
                        <label>Biaya</label>
                        <input name="biaya" id="dengan-rupiah" class="form-control" placeholder="Biaya">
                    </div>

                    <div class="form-grup">
                        <label>Angkatan Tahun</label>
                        <select name="id_ta" class="form-control">
                            <option value="">--Pilih Tahun Angkatan--</option>
                            <?php foreach ($ta as $key => $value) { ?>
                                <option value="<?= $value['id_ta'] ?>"><?= $value['ta'] ?>-<?= $value['semester'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-grup">
                        <label>Kategori Pembayaran</label>
                        <select name="id_kategori_pembayaran" class="form-control">
                            <option value="">--Pilih Kategori Pembayaran--</option>
                            <?php foreach ($kategori_pembayaran as $key => $value) { ?>
                                <option value="<?= $value['id_kategori_pembayaran'] ?>"><?= $value['nama_kategori_pembayaran'] ?></option>
                            <?php } ?>
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
    <?php foreach ($kelas_pembayaran as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_kelas_pembayaran'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Kelas Pembayaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus Kelas <b><?= $value['nama_kelas_pembayaran'] ?> - <?= $value['biaya'] ?></b>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup</button>
                        <a href="<?= base_url('/Pembayaran/delete_kelas_pembayaran/' . $value['id_kelas_pembayaran'] . '/' . $value['kode_kelas_pembayaran']) ?>" class="btn btn-info"> Delete</a>
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
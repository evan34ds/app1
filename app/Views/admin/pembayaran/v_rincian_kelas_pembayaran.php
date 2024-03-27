<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title ?> : <label class="text-success"><?= $rincian_kelas_pembayaran['nama_kelas_pembayaran'] ?></label></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.ISI DAN TABEL -->
    <div class="col-md-10">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Data <?= $title ?> : <label><?= $rincian_kelas_pembayaran['biaya'] ?> - <?= $rincian_kelas_pembayaran['nama_kelas_pembayaran'] ?></label></h3>

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
                
                <?php
                $db      = \Config\Database::connect(); //conect databases
                foreach ($rincian_kelas_pembayaran as $key => $value) {
                          $jml = $db->table('tbl_kelas_pembayaran')
                          ->where('kode_kelas_pembayaran',  $rincian_kelas_pembayaran['kode_kelas_pembayaran'])
                          ->where('tbl_kelas_pembayaran.id_mhs IS NOT NULL')
                          ->where('tbl_kelas_pembayaran.id_pembayaran IS NOT NULL')
                          ->countAllResults();
                    ?>

                <?php } ?>

                <table class="table table-bordered">
                    <tr>
                        <th width="150px">Nama Kelas Pembayaran</th>
                        <th width="30px">:</th>
                        <td><?= $rincian_kelas_pembayaran['nama_kelas_pembayaran'] ?></td>
                        <th width="150px">Program Studi</th>
                        <td width="30px">:</td>
                        <td><?= $rincian_kelas_pembayaran['prodi'] ?></td>

                    </tr>
                    <tr>
                        <th>Biaya</th>
                        <th>:</th>
                        <td><?= $rincian_kelas_pembayaran['biaya'] ?></td>
                        <th>Jumlah</th>
                        <th>:</th>
                        <td><?= $jml ?></td>
                    </tr>
                    <tr>
                        <th>Kode Kelas Pembayaran</th>
                        <td>:</td>
                        <td><?= $rincian_kelas_pembayaran['kode_kelas_pembayaran'] ?></td>
                        <th>TA</th>
                        <td>:</td>
                        <td><?= $rincian_kelas_pembayaran['ta'] ?> <?= $rincian_kelas_pembayaran['semester'] ?></td>
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
                        foreach ($kelas_pembayaran as $key => $value) { ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $value['nim'] ?></td>
                                <td><?= $value['nama_mhs'] ?></td>

                                <td class="text-center">
                                    <a href="<?= base_url('pembayaran/delete_anggota_kelas_pembayara/' . $value['id_kelas_pembayaran']) ?>" class="fas fa-trash btn-sm btn-flat">
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

    <!-- <H4><b>Jumlah SKS : $sks </b></H4> -->
    <!-- modal add -->
    <div class="modal fade" id="add">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Daftar Mahasiswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open_multipart('pembayaran/add_mhs_kelas_pembayaran/' .  $rincian_kelas_pembayaran['id_kelas_pembayaran']); ?>

                    <table class="table table-bordered table-striped-md text-sm" id="example1">
                        <thead>
                            <tr class="bg-success color-palette">
                                <th width="50px" class="text-center">No</th>
                                <th>NIM</th>
                                <th>Tahun Ajaran</th>
                                <th>Nama Mahasiswa</th>
                                <th>Program Studi</th>
                                <th>Pilih Mahaiswa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $db      = \Config\Database::connect();  // Membuat Jumlah Mata Kuliah
                            foreach ($data_mhs_tambah as $key => $value) {

                                $is_mhs_exists = false;

                                foreach ($mhs as $key => $mhs_t) {
                                }

                                foreach ($akses_fitur_mhs as $akses) {
                                    if ($akses['id_mhs'] == $value['id_mhs']) { //jika ada data yang sama antara data_mhs_tambah dan akses_fitur_mhs maka ceklis otomatis bisa di pakai && 
                                        $is_mhs_exists = true;
                                        break;
                                    }
                                }
                            ?>

                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value['nim'] ?></td>
                                    <td><?= $value['ta'] ?></td>
                                    <td><?= $value['nama_mhs'] ?></td>
                                    <td><?= $value['prodi'] ?> (
                                        <?= $value['kode_prodi'] ?>)
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="mhs_ids[]" class="form-check-input" value="<?= $value['id_mhs'] ?>" <?= $is_mhs_exists ? 'disabled checked' : '' ?> multiple>
                                    </td>
                                </tr> <?php } ?>
                        </tbody>
                    </table>
                    <button type="submit">Tambahkan Data</button>
                    </form>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
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

                <?php foreach ($kelas_perkuliahan as $key => $value) { ?>

                <?php } ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th class="text-center">Tahun Akademik</th>
                            <th class="text-center">Kode Kelas Perkuliahan</th>
                            <th class="text-center">Mata Kuliah</th>
                            <th class="text-center">Nama Kelas</th>
                            <th class="text-center">Program Studi</th>
                            <th class="text-center">Dosen Penanggungjawab</th>
                            <th class="text-center">Mulai</th>
                            <th class="text-center">Akhir</th>
                            <th class="text-center">Jadwal Kuliah</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php


                        $db      = \Config\Database::connect();  // Membuat Jumlah Mata Kuliah
                        $no = 1;
                        foreach ($kelas_perkuliahan as $key => $value) {
                            $jml = $db->table('tbl_kelas_perkuliahan')
                                ->where('Kode_Kelas_Perkuliahan', $value['Kode_Kelas_Perkuliahan']) // Membuat Jumlah Mata Kuliah
                                ->countAllResults();

                            $jml_jadwal = $db->table('tbl_jadwal')
                                ->where('id_kelas_perkuliahan', $value['id_kelas_perkuliahan']) // Membuat Jumlah Mata Kuliah
                                ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_jadwal.id_prodi', 'left')
                                ->countAllResults();


                            $kosem = $jml - 1; //cara menghilangkan jumlah null
                        ?>


                            <tr>
                                <td><?= $no++; ?></td>
                                <td class="text-center"><?= $value['ta'] ?> <?= $value['semester'] ?></td>
                                <td class="text-center"><?= $value['Kode_Kelas_Perkuliahan'] ?></td>
                                <td class="text-center"><?= $value['matkul'] ?></td>
                                <td class="text-center"><?= $value['nama_kelas_perkuliahan'] ?></td>
                                <td>" <?= $value['id_prodi'] ?>..."-<?= $value['prodi'] ?></td>
                                <td><?= $value['nama_dosen'] ?></td>
                                <td class="text-center"><?= $value['tanggal_mulai'] ?></td>
                                <td class="text-center"><?= $value['tanggal_akhir'] ?></td>
                                <td class=" text-center">
                                    <p class="right badge badge-danger"><?= $jml_jadwal ?></p>
                                </td>
                                <td class=" text-center">
                                    <?php if ($jml_jadwal > 0) { ?>
                                        <button class="fas fa-trash btn-sm btn-flat" data-toggle="modal" data-target="#gagal<?= $value['id_prodi'] ?>"><i class="fa fa-pencil"></i></button>
                                    <?php } else { ?>
                                        <button class="fas fa-trash btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_kelas_perkuliahan'] ?>"><i class="fa fa-pencil"></i></button>
                                    <?php  }  ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th>Tahun Akademik</th>
                            <th>Kode Kelas Perkuliahan</th>
                            <th>Mata Kuliah</th>
                            <th>Nama Kelas</th>
                            <th>Program Studi</th>
                            <th>Pembimbing Akademik</th>
                            <th>Mulai</th>
                            <th>Akhir</th>
                            <th>Jadwal Kuliah</th>
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
                        echo form_open('kelas/add_kelas_perkuliahan');
                        ?>

                    <div class="form-grup">
                        <label>Tahun Akademik</label>
                        <input class="form-control" value="<?= $ta_aktif['ta'] ?> | <?= $ta_aktif['semester'] ?>" readonly>
                        <input type="hidden" name="ta_aktif" value="<?= $ta_aktif['ta'] ?> | <?= $ta_aktif['semester'] ?>" class="form-control" readonly>
                    </div>
                    <div class="form-grup">
                        <label>Kode Kelas Perkuliahan</label>
                        <input name="kode_kelas_perkuliahan" class="form-control" placeholder="Kode Kelas Perkuliahan" maxlength="6">
                    </div>
                    <div class="form-grup">
                        <label>Mata Kuliah</label>
                        <select name="id_kurikulum" class="form-control">
                            <option value="">--Mata Kuliah--</option>
                            <?php foreach ($matkul as $key => $value) { ?>
                                <option value="<?= $value['id_kurikulum'] ?>"><?= $value['matkul'] ?> | <?= $value['prodi'] ?> | <?= $value['nama_kurikulum'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-grup">
                        <label>Nama Kelas</label>
                        <input name="nama_kelas_perkuliahan" class="form-control" placeholder="Nama Kelas Perkuliahan">
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
                        <label>Dosen Penanggungjawab</label>
                        <select name="id_dosen" class="form-control">
                            <option value="">--Pilih Program Studi--</option>
                            <?php foreach ($dosen as $key => $value) { ?>
                                <option value="<?= $value['id_dosen'] ?>"><?= $value['nama_dosen'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Tanggal Mulai</label>
                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                            <div class="invalid-feedback errorJudul">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir">
                            <div class="invalid-feedback errorJudul">
                            </div>
                        </div>
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
    <?php foreach ($kelas_perkuliahan as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_kelas_perkuliahan'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Kelas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus Kelas <b><?= $value['nama_kelas_perkuliahan'] ?> - <?= $value['matkul'] ?></b>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup</button>
                        <a href="<?= ('/kelas/delete_kelas_perkuliahan/' . $value['id_kelas_perkuliahan']) ?>" class="btn btn-info"> Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>

    <!-- Gagal Hapus-->
    <?php foreach ($kelas_perkuliahan as $key => $value) {
    ?>
        <div class="modal fade" id="gagal<?= $value['id_prodi'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Kelas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        Apakah Anda Yakin Ingin Menghapus Kelas <b><?= $value['nama_kelas_perkuliahan'] ?> - <?= $value['matkul'] ?></b>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup</button>
                        <a href="<?= ('/kelas/gagal_hapus_perkuliahan/' . $value['id_prodi']) ?>" class="btn btn-info">Delete</a>
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
        <title>Document</title>
    </head>

    <body>
        <h1>Catatan :</h1>
        <p>1. Tidak bisa menggunakan nama kelas yang sama (sda tersedia)</p>
        <p> 3. Membuat Batasan mata kuliah yang bisa di ambil : ada yang telah di daftarkan dan ada mata kuliah bisa di ambil semua angkatan @tgl 12 Juni 2023"</p>
        <p> 4. Kelas Perkuliahan inputkan mahasiswa agar mahasiswa dapat diselekasi ketika sudah lulus, keluar, Cuti statusnya tidak bisa menginputkan krs @tgl 13 Juni 2023"</p>
        <p> 5. nomor 4 nanti seleksi kembali menggunakan username dan password sehingga mahasiswa di kelas perkuliahan dibatalkan@tgl 13 Juni 2023"</p>
        <p> 5. nomor 4 nanti seleksi kembali menggunakan username dan password sehingga mahasiswa di kelas perkuliahan dibatalkan@tgl "</p>
    </body>

    <h1>Kegitan Selanjutnya :</h1>
    <p>1. Membuat agar data kode tidak bisa di input jika ada data yang sama</p>
    <p>3. buat pesan gagal hapus pada jadwal kelas jika telah di klik hapus pada kelas perkuliahan@tgl 16 Juni 2023"</p>

    <h1>Cara mengatasi masalah :</h1>
    <p>1. jika data tidak muncul gunakan ->select pada model segingga dapat memilih data yang di tujuh (karna ada ada 2 data di tabel yang berbeda dikarenakan join) </p>
    <p></p>

    </html>
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

        <div class="col-sm-12">
            <a href="<?= base_url('dsn/print_absensi/' . $jadwal['id_jadwal']) ?>" target="_blank" class="btn-flat bg-primary color-palette">
                <i class="fa fa-print">PRINT                </i></a>
                <a href="<?= base_url('dsn/print_absensi/' . $jadwal['id_jadwal']) ?>" target="_blank" class="btn-flat bg-primary color-palette">
                <i class="fa fa-print">UBAH
                </i></a>
        </div>
        <div class="col-sm-12">
            <?php

            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success" role="alert">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>
            <?php echo form_open('dsn/SimpanNilai/' . $jadwal['id_jadwal']) ?>
            <table class="table table-bordered table-striped text-sm">

                <tr class="bg-success color-palette">
                         <th rowspan="2" class="text-center">NO</th>
                        <th rowspan="2" class="text-center">NIM</th>
                        <th rowspan="2" class="text-center">MAHASISWA</th>
                        <th colspan="16" class="text-center">NLAI</th>
                        
                        
                </tr>

                <tr class="bg-success color-palette">
                    <td class="text-center">ANGKA</td>
                    <td class="text-center">HURUF I</td>
                    <td class="text-center">HURUF I</td>
                    <td class="text-center">HURUF I</td>
                </tr>

                <tbody>
                    <?php $no = 1;

                    foreach ($mhs as $key => $value) {
                        echo form_hidden($value['id_krs'] . 'id_krs', $value['id_krs']);
                    ?>
                        <tr>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['nim'] ?></td>
                            <td><?= $value['nama_mhs'] ?></td>
                            <td><input name="<?= $value['id_krs'] ?>nilai" type="number" value="" class="form-control" min="0" max="100" placeholder=""></td>
                            <td><input name=""  type="text" value="<?= $value['nilai'] ?>" min="0" max="100" class="form-control" ></td>
                            <td><input name=""  type="text" value="<?= $value['nilai_huruf'] ?>" min="0" max="100" class="form-control" ></td>

                            
                        </tr>
                    <?php } ?>

                    <tr class="bg-success color-palette">
                        <th rowspan="2" class="text-center">NO</th>
                        <th rowspan="2" class="text-center">NIM</th>
                        <th rowspan="2" class="text-center">MAHASISWA</th>
                        <th colspan="16" class="text-center">NLAI</th>

                    </tr>
                </tbody>
            </table>
            <button class="btn btn-outline-success"><i class="fa fa-save">Simpan Nilai</i></button>
            <?php echo form_close() ?>
        </div>
    </div>
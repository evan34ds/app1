<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title ?> Kelas : <?= $jadwal['nama_kelas_perkuliahan'] ?> </h1>
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
                <i class="fa fa-print">Print Absensi
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
            <?php echo form_open('dsn/SimpanAbsen/' . $jadwal['id_jadwal']) ?>
            <table class="table table-bordered table-striped text-sm">

                <tr class="bg-success color-palette">
                    <th rowspan="2" class="text-center">No</th>
                    <th rowspan="2" class="text-center">Nim</th>
                    <th rowspan="2" class="text-center">Mahasiswa</th>
                    <th colspan="16" class="text-center">Pertemuan</th>
                </tr>

                <tr class="bg-success color-palette">
                    <td class="text-center">1</td>
                    <td class="text-center">2</td>
                    <td class="text-center">3</td>
                    <td class="text-center">4</td>
                    <td class="text-center">5</td>
                    <td class="text-center">6</td>
                    <td class="text-center">7</td>
                    <td class="text-center">8</td>
                    <td class="text-center">9</td>
                    <td class="text-center">10</td>
                    <td class="text-center">11</td>
                    <td class="text-center">12</td>
                    <td class="text-center">13</td>
                    <td class="text-center">14</td>
                    <td class="text-center">15</td>
                    <td class="text-center">16</td>
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
                            <td><select name="<?= $value['id_krs'] ?>p1">
                                    <option value="0" <?php if ($value['p1'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p1'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>
                                    <option value="2" <?php if ($value['p1'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>
                                </select>
                            </td>
                            <td><select name="<?= $value['id_krs'] ?>p2">
                                    <option value="0" <?php if ($value['p2'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p2'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>
                                    <option value="2" <?php if ($value['p2'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>
                                </select>
                            </td>
                            <td><select name="<?= $value['id_krs'] ?>p3">
                                    <option value="0" <?php if ($value['p3'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p3'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>
                                    <option value="2" <?php if ($value['p3'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>
                                </select>
                            </td>
                            <td><select name="<?= $value['id_krs'] ?>p4">
                                    <option value="0" <?php if ($value['p4'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p4'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>
                                    <option value="2" <?php if ($value['p4'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>
                                </select>
                            </td>
                            <td><select name="<?= $value['id_krs'] ?>p5">
                                    <option value="0" <?php if ($value['p5'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p5'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>
                                    <option value="2" <?php if ($value['p5'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>
                                </select>
                            </td>
                            <td><select name="<?= $value['id_krs'] ?>p6">
                                    <option value="0" <?php if ($value['p6'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p6'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>
                                    <option value="2" <?php if ($value['p6'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>
                                </select>
                            </td>
                            <td><select name="<?= $value['id_krs'] ?>p7">
                                    <option value="0" <?php if ($value['p7'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p7'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>
                                    <option value="2" <?php if ($value['p7'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>
                                </select>
                            </td>
                            <td><select name="<?= $value['id_krs'] ?>p8">
                                    <option value="0" <?php if ($value['p8'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p8'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>
                                    <option value="2" <?php if ($value['p8'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>
                                </select>
                            </td>
                            <td><select name="<?= $value['id_krs'] ?>p9">
                                    <option value="0" <?php if ($value['p9'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p9'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>
                                    <option value="2" <?php if ($value['p9'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>
                                </select>
                            </td>
                            <td><select name="<?= $value['id_krs'] ?>p10">
                                    <option value="0" <?php if ($value['p10'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p10'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>
                                    <option value="2" <?php if ($value['p10'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>
                                </select>
                            </td>
                            <td><select name="<?= $value['id_krs'] ?>p11">
                                    <option value="0" <?php if ($value['p11'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p11'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>
                                    <option value="2" <?php if ($value['p11'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>
                                </select>
                            </td>
                            <td><select name="<?= $value['id_krs'] ?>p12">
                                    <option value="0" <?php if ($value['p12'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p12'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>
                                    <option value="2" <?php if ($value['p12'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>
                                </select>
                            </td>
                            <td><select name="<?= $value['id_krs'] ?>p13">
                                    <option value="0" <?php if ($value['p13'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p13'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>
                                    <option value="2" <?php if ($value['p13'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>
                                </select>
                            </td>
                            <td><select name="<?= $value['id_krs'] ?>p14">
                                    <option value="0" <?php if ($value['p14'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p14'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>
                                    <option value="2" <?php if ($value['p14'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>
                                </select>
                            </td>
                            <td><select name="<?= $value['id_krs'] ?>p15">
                                    <option value="0" <?php if ($value['p15'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p15'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>
                                    <option value="2" <?php if ($value['p15'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>
                                </select>
                            </td>
                            <td><select name="<?= $value['id_krs'] ?>p16">
                                    <option value="0" <?php if ($value['p16'] == 0) {
                                                            echo 'selected';
                                                        } ?>>A</option>
                                    <option value="1" <?php if ($value['p16'] == 1) {
                                                            echo 'selected';
                                                        } ?>>I</option>
                                    <option value="2" <?php if ($value['p16'] == 2) {
                                                            echo 'selected';
                                                        } ?>>H</option>
                                </select>
                            </td>
                        </tr>
                    <?php } ?>

                    <tr class="bg-success color-palette">
                        <th rowspan="2" class="text-center">No</th>
                        <th rowspan="2" class="text-center">Nim</th>
                        <th rowspan="2" class="text-center">Mahasiswa</th>
                        <th colspan="16" class="text-center">Pertemuan</th>

                    </tr>
                </tbody>
            </table>
            <button class="btn btn-outline-success"><i class="fa fa-save">Simpan Absen</i></button>
            <?php echo form_close() ?>
        </div>
    </div>
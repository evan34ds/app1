<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row">
        <!--tabel menggunakan https://www.tablesgenerator.com/-->
        <table class="table table-bordered table-striped">
            <div class="col-sm-12">
                <tr>
                    <th width="20px" rowspan="7"><img src="<?= base_url('fotomahasiswa/' . $mhs['foto_mhs']) ?>" width="120px" height="150px"></th>
                    <th width=" 150px">Tahun Akademik</th>
                    <th width="20px">:</th>
                    <th></th>
                    <th rowspan="7"></th>
                </tr>
                <tr>
                    <td>Nim</td>
                    <td>:</td>
                    <td><?= $mhs['nim'] ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $mhs['nama_mhs'] ?></td>
                </tr>
                <tr>
                    <td>Fakultas</td>
                    <td>:</td>
                    <td><?= $mhs['fakultas'] ?></td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td>:</td>
                    <td><?= $mhs['prodi'] ?></td>
                </tr>
                <tr>
                    <td>Rombongan Kelas</td>
                    <td>:</td>
                    <td><?= $mhs['nama_kelas'] ?>-<?= $mhs['tahun_angkatan'] ?></td>
                </tr>
                <tr>
                    <td>Dosen Pembimbing Akademik</td>
                    <td>:</td>
                    <td><?= $mhs['nama_dosen'] ?></td>
                </tr>
        </table>
    </div>

    <?php
    if (session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-success" role="alert">';
        echo session()->getFlashdata('pesan');
        echo '</div>';
    }
    ?>
    <div class="col-sm-12">

        <?php //1. JIKA LEBI 24 SKS MAKA TIDAK BISA PRINT DAN TAMBAH MATA KULIAH 2. JIKA SKS TELAH MENCAPAI 24 SKS MAKA TDAK BISA MENAMBAH DAN PRINT  
        $sks = 0; //menjumlahkan sks
        $nilai = 0;
        $db      = \Config\Database::connect();
        foreach ($data_matkul as $key => $value) {          //ini menjadi wakil databases yang bisa di ambil

            $st = $db->table('tbl_krs')
                ->where('id_mhs', $value['id_mhs']) // Membuat Jumlah Mata Kuliah
                ->where('id_jadwal', $value['id_jadwal']) // Membuat Jumlah Mata Kuliah
                ->countAllResults();

            $sks = $sks + $value['sks']; //menjumlahkan sks
            $kod = $value['kode_matkul'];

            $tambahmatkul = 24 - $sks;
            $kontrak = 24;
            $jumlahmatakuliah = 1;
        ?>
        <?php } ?>
        <button class="btn-flat bg-success color-palette"> <a href="<?= base_url('krs/print') ?>" target="_blank" class="btn-flat bg-success color-palette">
                <i class="fa fa-print">PRINT KRS </i></a></button>
        <button type="button" data-toggle="modal" data-target="#add" class="btn-flat bg-success color-palette">
            <i class="fa fa-print">CHEKLISH MATA KULIAH</i></button>
    </div>
    <div class="col-sm-12">
        <table class="table table-bordered table-striped text-sm">
            <thead>
                <tr class="bg-success color-palette">
                    <th class="text-center">WIDI</th>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Mata Kuliah</th>
                    <th class="text-center">Tahun Akademik</th>
                    <th class="text-center">SKS</th>
                    <th class="text-center">SMT</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Dosen</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Huruf</th>
                    <th class="text-center">Index</th>
                    <th class="text-center">SKS * N. Indeks</th>
                    <th class="text-center">Keterangan</th>

                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $sks = 0; //menjumlahkan sks
                $nilai = 0;
                $totalindex = 0;
                $db      = \Config\Database::connect();
                foreach ($data_matkul_aktif as $key => $value) {          //ini menjadi wakil databases yang bisa di ambil

                    $st = $db->table('tbl_krs')
                        ->where('id_mhs', $value['id_mhs']) // Membuat Jumlah Mata Kuliah
                        ->where('id_jadwal', $value['id_jadwal']) // Membuat Jumlah Mata Kuliah
                        ->countAllResults();

                    $sks = $sks + $value['sks']; //menjumlahkan sks
                    $kod = $value['kode_matkul'];

                    $tambahmatkul = 24 - $sks;
                    $kontrak = 24;
                    $jumlahmatakuliah = 1;
                ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= $value['kode_matkul'] ?></td>
                        <td class="text-center"><?= $value['ta'] ?> <?= $value['semester'] ?> </td>
                        <td><?= $value['matkul'] ?></td>
                        <td class="text-center"><?= $value['sks'] ?></td>
                        <td class="text-center"><?= $value['smt'] ?></td>
                        <td class="text-center"><?= $value['nama_kelas_perkuliahan'] ?></td>
                        <td><?= $value['nama_dosen'] ?></td>
                        <td class="text-center"><?= $value['nilai'] ?></td>
                        <td class="text-center"><?= $value['nilai_huruf'] ?></td>
                        <td class="text-center"><?= $value['nilai_index'] ?></td>
                        <td class="text-center">
                            <?php
                            $jumla2 = 0;


                            echo $bobot[$nilai] = $value['sks']  * $value['nilai_index']; //SKS * N. Indeks
                            $totalindex = $totalindex  + $bobot[$nilai]; //Rumus mendapatkan total index

                            $ipk = $totalindex / $sks;

                            ?>
                        </td>
                        <td class="text-center">
                            <?= $value['ceklis_transkrip'] ?>
                        </td>


                    </tr>
                <?php } ?>

                <?php if (isset($totalindex, $ipk)) { ?> <!-- jika mendapatkan nilai kosong -->
                    <tr class="bg-warning color-palette">
                        <td align="right" colspan="4">Total SKS</td>
                        <td align="center"> <?= $sks ?></td> <!-- Mendapatkan total sks -->
                        <td colspan="6"></td>
                        <td align="center"><?= $totalindex ?></td>
                        <td></td> <!-- Menpatkan nilai semua index -->
                    </tr>

                    <tr class="bg-warning color-palette">
                        <td align="right" colspan="11">IPS</td>
                        <td align="center"><?= $ipk ?> </td>
                        <td></td>
                    </tr>
                <?php } else { ?>
                    <p>belum ada data</p>
                <?php } ?>


            </tbody>
        </table>
    </div>
    <!-- <H4><b>Jumlah SKS : $sks </b></H4> -->
    <!-- modal add -->
    <div class="modal fade" id="add">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Daftar Transkrip</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <table class="table table-bordered table-striped text-sm">
                        <thead>
                            <tr class="bg-success color-palette">
                                <th class="text-center">WIDI</th>
                                <th class="text-center">Kode</th>
                                <th class="text-center">Mata Kuliah</th>
                                <th class="text-center">Tahun Akademik</th>
                                <th class="text-center">SKS</th>
                                <th class="text-center">SMT</th>
                                <th class="text-center">Kelas</th>
                                <th class="text-center">Dosen</th>
                                <th class="text-center">Nilai</th>
                                <th class="text-center">Huruf</th>
                                <th class="text-center">Index</th>
                                <th class="text-center">SKS * N. Indeks</th>
                                <th class="text-center">Checklist</th>
                                <th class="text-center">Keterangan</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            echo form_open('admin/transkip_simpan/');
                            ?>
                            <?php $no = 1;
                            $sks = 0; //menjumlahkan sks
                            $nilai = 0;
                            $totalindex = 0;
                            $db      = \Config\Database::connect();
                            foreach ($data_matkul as $key => $value) {          //ini menjadi wakil databases yang bisa di ambil

                                echo form_hidden($value['id_krs'] . 'id_krs', $value['id_krs']);

                                $st = $db->table('tbl_krs')
                                    ->where('id_mhs', $value['id_mhs']) // Membuat Jumlah Mata Kuliah
                                    ->where('id_jadwal', $value['id_jadwal']) // Membuat Jumlah Mata Kuliah
                                    ->countAllResults();

                                $sks = $sks + $value['sks']; //menjumlahkan sks
                                $kod = $value['kode_matkul'];

                                $tambahmatkul = 24 - $sks;
                                $kontrak = 24;
                                $jumlahmatakuliah = 1;
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-center"><?= $value['kode_matkul'] ?></td>
                                    <td class="text-center"><?= $value['ta'] ?> <?= $value['semester'] ?> </td>
                                    <td><?= $value['matkul'] ?></td>
                                    <td class="text-center"><?= $value['sks'] ?></td>
                                    <td class="text-center"><?= $value['smt'] ?></td>
                                    <td class="text-center"><?= $value['nama_kelas_perkuliahan'] ?></td>
                                    <td><?= $value['nama_dosen'] ?></td>
                                    <td class="text-center"><?= $value['nilai'] ?></td>
                                    <td class="text-center"><?= $value['nilai_huruf'] ?></td>
                                    <td class="text-center"><?= $value['nilai_index'] ?></td>

                                    <td class="text-center">
                                        <?php
                                        $jumla2 = 0;


                                        echo $bobot[$nilai] = $value['sks']  * $value['nilai_index']; //SKS * N. Indeks
                                        $totalindex = $totalindex  + $bobot[$nilai]; //Rumus mendapatkan total index

                                        $ipk = $totalindex / $sks;

                                        ?>
                                    </td>
                                    <td><select name="<?= $value['id_krs'] ?>ceklis_transkrip">
                                            <option value="0" <?php if ($value['ceklis_transkrip'] == 0) {
                                                                    echo 'selected';
                                                                } ?>>Nonaktif</option>
                                            <option value="1" <?php if ($value['ceklis_transkrip'] == 1) {
                                                                    echo 'selected';
                                                                } ?>>Aktif</option>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <?= $value['ceklis_transkrip'] ?>
                                    </td>


                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <button type="submit">Simpan</button>

                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title ?> Tahun Akademik : <?= $ta_aktif['ta'] ?> <?= $ta_aktif['semester'] ?></h1>
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
                    <th><?= $ta_aktif['ta'] ?> <?= $ta_aktif['semester'] ?></th>
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
    <div class="col-sm-12">

        <?php //1. JIKA LEBI 24 SKS MAKA TIDAK BISA PRINT DAN TAMBAH MATA KULIAH 2. JIKA SKS TELAH MENCAPAI 24 SKS MAKA TDAK BISA MENAMBAH DAN PRINT  
        $sks = 0; //menjumlahkan sks
        $db      = \Config\Database::connect();
        foreach ($khs->getResult() as $value) {          //ini menjadi wakil databases yang bisa di ambi
        ?>
        <?php } ?>
        <a href="<?= base_url('krs/print') ?>" target="_blank" class="btn-flat bg-success color-palette">
            <i class="fa fa-print">PRINT KHS</i></a>
    </div>
    <div class="col-sm-12">
        <table class="table table-bordered table-striped text-sm" id="tg-Absxr">
            <thead>
                <tr class="bg-success color-palette">
                    <th class="text-center">No</th>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Mata Kuliah</th>
                    <th class="text-center">SKS</th>
                    <th class="text-center">SMT</th>
                    <th class="text-center">Ruangan</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Dosen</th>
                    <th class="text-center">Angka</th>
                    <th class="text-center">Huruf</th>
                    <th class="text-center">Index</th>
                    <th class="text-center">SKS * N. Indeks</th>

                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $sks = 0; //menjumlahkan sks
                $nilai = 0;

                $db      = \Config\Database::connect();
                foreach ($khs->getResult() as $value) {

                    $sks = $sks + $value->sks;
                    $jml = 0;


                ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= $value->kode_matkul ?></td>
                        <td><?= $value->matkul ?></td>
                        <td class="text-center"><?= $value->sks ?></td>
                        <td class="text-center"><?= $value->smt ?></td>
                        <td class="text-center"><?= $value->ruangan ?></td>
                        <td class="text-center"><?= $value->nama_kelas_perkuliahan ?></td>
                        <td><?= $value->nama_dosen ?></td>
                        <td class="text-center"><?= $value->nilai ?></td>
                        <td class="text-center"><?= $value->nilai_huruf ?></td>
                        <td class="text-center"><?= $value->nilai_index ?></td>
                        <td class="text-center">
                            <?php
                            $jumla2 = 0;

                            echo $bobot[$no] = $value->sks * $value->nilai_index;

                            $totalindex = array_sum($bobot);

                            $ipk = $totalindex / $sks;

                            ?>
                        </td>

                    </tr>
                <?php } ?>

                <?php if (isset($totalindex)) { ?>
                    <tr class="bg-warning color-palette">
                        <td align="right" colspan="3">Total SKS</td>
                        <td align="center"> <?= $sks ?></td>
                        <td colspan="7"></td>
                        <td align="center"><?= $jml ?></td>
                    </tr>

                    <tr class="bg-warning color-palette">
                        <td align="right" colspan="11">IPS</td>
                        <td align="center"><?= $ipk ?> </td>
                    </tr>
                <?php } else { ?>
                    <p>belum ada data</p>
                <?php } ?>
                
            </tbody>
        </table>
    </div>
</div>
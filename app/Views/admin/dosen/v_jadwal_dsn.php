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

    <table class="table table-bordered table-striped text-sm">
        <tr class="bg-success color-palette">
            <th>No</th>
            <th>Program Studi</th>
            <th>Waktu</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Kelas</th>
            <th>Ruangan</th>
            <th>Dosen</th>

        <tr>
            <?php $no = 1;
            foreach ($jadwal as $key => $value) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value['prodi'] ?></td>
            <td><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
            <td><?= $value['matkul'] ?></td>
            <td><?= $value['sks'] ?></td>
            <td><?= $value['nama_kelas_perkuliahan'] ?></td>
            <td><?= $value['ruangan'] ?></td>
            <td><?= $value['nama_dosen'] ?></td>
        </tr>
    <?php } ?>
    </table>

</div>
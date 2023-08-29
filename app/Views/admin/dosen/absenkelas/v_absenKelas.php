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
            <th class="text-center">No</th>
            <th class="text-center">Mata Kuliah</th>
            <th class="text-center">SKS</th>
            <th class="text-center">Kelas</th>
            <th class="text-center">Dosen</th>
            <th class="text-center">Absensi</th>

        <tr>
            <?php $no = 1;
            foreach ($absen as $key => $value) { ?>
        <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td><?= $value['matkul'] ?></td>
            <td class="text-center"><?= $value['sks'] ?></td>
            <td><?= $value['nama_kelas_perkuliahan'] ?></td>
            <td><?= $value['nama_dosen'] ?></td>
            <td class="text-center">
                <a href="<?= base_url('dsn/absensi/' . $value['id_jadwal']) ?>" class="fas fa-success btn-sm btn-success">
                    <i class="fa fa-calendar"> Absensi</i></a>
            </td>
        </tr> <?php } ?>
    </table>
</div>
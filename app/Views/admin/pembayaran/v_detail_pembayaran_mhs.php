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
    <div class="col-sm-12">
        <table class="table table-bordered table-striped text-sm">
            <thead>
                <tr class="bg-success color-palette">
                    <th class="text-center">No</th>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Nama Pembayaran</th>
                    <th class="text-center">Biaya</th>
                    <th class="text-center">Pelunasan</th>
                    <th class="text-center">Sisa Angsuran</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $db      = \Config\Database::connect();
                foreach ($pembayaran as $key => $value) {          //ini menjadi wakil databases yang bisa di ambil
                    $rupiah = 'Rp ' . number_format($value['biaya'], 0, ',', '.');
                    $total_pelunasan = 'Rp ' . number_format($value['total_pelunasan'], 0, ',', '.');
                    $jumlah = $value['biaya'] - $value['total_pelunasan'];
                    //  $sks = $sks + $value['pelunasan']; //menjumlahkan sks
                    // Menambahkan nilai pelunasan ke total_pelunasan_per_kelas

                ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= $value['kode_kelas_pembayaran'] ?></td>
                        <td class="text-center"><?= $value['nama_kelas_pembayaran'] ?> </td>
                        <td class="text-center"><?php echo $rupiah; ?></td>
                        <td class="text-center"><?php echo $total_pelunasan; ?></td>
                        <td class="text-center"><?php echo $jumlah; ?></td>
                        <td class="text-center">
                            <?php if ($value['total_pelunasan'] == $value['biaya'] OR $value['total_pelunasan'] > $value['biaya']) : ?>
                               Lunas
                            <?php else : ?>
                                Belum Lunas
                            <?php endif; ?>
                        </td>
                        <td class="text-center"><button class="btn-info"><a href="<?= base_url('pembayaran/daftar_peluanasan_mhs/' . $value['id_mhs'].'/' . $value['kode_kelas_pembayaran']) ?>"><i class="fas fa-eye btn-sm btn-info"></i></buttomn</td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>

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
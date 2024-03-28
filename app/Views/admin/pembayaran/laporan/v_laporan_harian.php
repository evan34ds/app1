<!-- search_data.php -->
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

    <div class="col-12">
        <div class="card">
            <div class="card-header justify-content-center">

                <!-- Form untuk memasukkan rentang tanggal -->
                <form class="form-inline justify-content-center" action="<?php echo base_url('pembayaran/laporan_harian'); ?>" method="post">
                    <div class="form-group">
                        <label for="start_date" class="mr-2">Tanggal Awal</label>
                        <input class="form-control form-control-sm mr-2" name="start_date" type="date" id="start_date">
                    </div>
                    <div class="form-group">
                        <label for="tanggalAkhir" class="mr-2">Tanggal Akhir</label>
                        <input class="form-control form-control-sm mr-2" type="date" name="end_date" id="end_date">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Cari</button>
                </form>
            </div>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="50px" class="text-center">No</th>
                        <th class="text-center">Nama Pembayaran</th>
                        <th class="text-center">Nama Mahasiswa</th>
                        <th class="text-center">Biaya</th>
                        <th class="text-center">Waktu Pembayaran</th>
                        <th width="150px" class="text-center">Keterangan</th>
                    </tr>
                </thead>

                <tbody>

                    <!-- Tampilkan hasil pencarian di sini -->
                    <?php
                    $no = 1;
                    $total_pelunasan=0;
                    foreach ($results as $key => $value) {

                        $total_pelunasan = $total_pelunasan + $value['pelunasan']; //menjumlahkan sks
                    ?>
                        <tr>
                            <!-- Tampilkan data yang diambil dari database -->
                            <!-- Contoh: -->
                            <td><?= $no++; ?></td>
                            <td><?= $value['nama_kelas_pembayaran'] ?></td>
                            <td><?= $value['nama_mhs'] ?></td>
                            <td class="text-center">Rp. <?= number_format($value['pelunasan'], 0, ',', '.') ?></td>
                            <td class="text-center"><?= $value['waktu_pembayaran_mhs'] ?></td>
                            <td class="text-center"></td>
                        </tr>
                    <?php } ?>

                </tbody>
                <tr class="bg-warning color-palette">
                            <td align="center" colspan="3">TOTAL</td>
                            <td align="center"><?= 'Rp ' . number_format($total_pelunasan, 0, ',', '.') ?></td> <!-- Mendapatkan total sks -->
                            <td colspan="6"></td>
                        </tr>
                <tfoot>
                    <tr>
                        <th width="50px" class="text-center">No</th>
                        <th>Jenis pembayaran</th>
                        <th>Biaya</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Waktu Pembayaran</th>
                        <th width="150px" class="text-center">Keterangan</th>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>





    <script>
        // Mendapatkan elemen input tanggal
        var tanggalAwalInput = document.getElementById('start_date');
        var tanggalAkhirInput = document.getElementById('end_date');

        // Mendapatkan tanggal hari ini
        var today = new Date();

        // Mendapatkan nilai tanggal hari ini dalam format YYYY-MM-DD
        var year = today.getFullYear();
        var month = ('0' + (today.getMonth() + 1)).slice(-2);
        var day = ('0' + today.getDate()).slice(-2);
        var formattedDate = year + '-' + month + '-' + day;

        // Set nilai default ke input tanggal
        tanggalAwalInput.value = formattedDate;
        tanggalAkhirInput.value = formattedDate;
    </script>
<!-- app/Views/kelas_pembayaran.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas Pembayaran</title>
</head>

<body>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #000;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #ddd;
        }

        .table-container {
            overflow-x: auto;
        }
    </style>

    <div class="table-container">
        <?php
        // Array untuk menyimpan data berdasarkan tahun akademik
        $data_by_ta = [];

        // Mengelompokkan data berdasarkan tahun akademik
        foreach ($nama_mhs_list as $nama_mhs) {
            $tahun_akademik = $nama_mhs['ta'];
            $kode_kelas_data = [];

            // Mengelompokkan data berdasarkan kode kelas
            foreach ($kode_kelas_pembayaran_list as $kode_kelas) {
                $kode_kelas_pembayaran = $kode_kelas['kode_kelas_pembayaran'];
                $pelunasan = isset($pelunasan_data[$nama_mhs['nama_mhs']][$kode_kelas_pembayaran]) ?
                    ($pelunasan_data[$nama_mhs['nama_mhs']][$kode_kelas_pembayaran] !== null ? $pelunasan_data[$nama_mhs['nama_mhs']][$kode_kelas_pembayaran] : 1)
                    : 2;
                $kode_kelas_data[$kode_kelas_pembayaran] = $pelunasan;
            }

            // Menyimpan data dalam array berdasarkan tahun akademik
            $data_by_ta[$tahun_akademik][] = [
                'nama_mhs' => $nama_mhs['nama_mhs'],
                'kode_kelas_data' => $kode_kelas_data
            ];
        }

        // Menampilkan tabel berdasarkan tahun akademik
        foreach ($data_by_ta as $tahun_akademik => $data_kelas) {
        ?>
            <h2>Tahun Akademik <?= $tahun_akademik ?></h2>
            <table>
                <thead>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <?php 
                        // Array untuk menyimpan informasi apakah kolom harus ditampilkan
                        $show_column = array_fill_keys(array_keys($kode_kelas_pembayaran_list), false);
                        
                        // Mengatur informasi apakah kolom harus ditampilkan atau tidak
                        foreach ($kode_kelas_pembayaran_list as $key => $kode_kelas) {
                            foreach ($data_kelas as $data) {
                                if ($data['kode_kelas_data'][$kode_kelas['kode_kelas_pembayaran']] != 2) {
                                    $show_column[$key] = true;
                                    break;
                                }
                            }
                        }
                        
                        // Menampilkan kolom kelas pembayaran yang harus ditampilkan
                        foreach ($kode_kelas_pembayaran_list as $key => $kode_kelas) {
                            if ($show_column[$key]) {
                                echo "<th>{$kode_kelas['kode_kelas_pembayaran']}</th>";
                            }
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_kelas as $data) : ?>
                        <tr>
                            <td><?= $data['nama_mhs'] ?></td>
                            <?php 
                            foreach ($kode_kelas_pembayaran_list as $key => $kode_kelas) {
                                if ($show_column[$key]) {
                                    echo "<td>{$data['kode_kelas_data'][$kode_kelas['kode_kelas_pembayaran']]}</td>";
                                }
                            }
                            ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
</body>


</html>
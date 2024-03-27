<!-- app/Views/kelas_pembayaran.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas Pembayaran</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Mahasiswa</th>
                <th>Kode Kelas Pembayaran</th>
                <th>Total Pelunasan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($groupedData as $data): ?>
                <tr>
                    <td><?= $data['nama_mhs']; ?></td>
                    <td><?= $data['kode_kelas_pembayaran']; ?></td>
                    <td><?= $data['total_pelunasan']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <h1 class="m-0 text-dark"><?= $title ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="col-md-10">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title"><?= $title ?></h3>
                <div class="card-tools">

                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <!-- Pesan Error -->
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="card card-success" role="alert">
                        <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value) ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>

                <p>
                <form action="<?= base_url('pembayaran/pem_mitrans') ?>" method="post">
                    <div class="col-sm-6">
                        <div class="form-grup">
                            <label>Nama Depan</label>
                            <input name="depan" class="form-control" placeholder="Nama">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-grup">
                            <label>Nama Belakang</label>
                            <input name="belakang" class="form-control" placeholder="Nama Mahasiswa">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-grup">
                            <label>email</label>
                            <input name="email" class="form-control" placeholder="Nama Mahasiswa">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-grup">
                            <label>ponsel</label>
                            <input name="ponsel" class="form-control" placeholder="Nama Mahasiswa">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-grup">
                            <label>Nominal Tagihan</label>
                            <input name="nominal" class="form-control" placeholder="Nama Mahasiswa">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-grup">
                            <label>Token</label>
                            <input name="token" class="form-control" placeholder="Nama Mahasiswa">
                        </div>
                    </div>
                    </p>
                    <div class="modal-footer justify-content-between">
                        <a href="<?= base_url('mahasiswa') ?>" class="fas fa-edit btn-sm btn-danger">Tutup</a>
                        <button type="submit" class="fas fa-trash btn-sm btn-flat">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="50px" class="text-center">No</th>
                    <th>Nama Belakang</th>
                    <th>Nama Depan</th>
                    <th>Email</th>
                    <th>Ponsel</th>
                    <th>Nominal</th>
                    <th>Bayar</th>
                    <th width="150px" class="text-center">STATUS</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($tagihan as $data) : 
                    $id = $data->id_transaksi_mid;
                    $token = base64_encode("SB-Mid-server-EBgU9ji51TZg0QtIqTFcABgw:");
                    $url=" https://api.sandbox.midtrans.com/v2/". $id ."/status";
                    $header= array(
                    'Accept: application/json',
                    'Authorization: Basic'. $token,
                    'Content-Type: application/json' 
                    );
                    $method='GET';
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, false);
                    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                    $hasil = json_decode($result, true);
                    ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $data->nama_belakang; ?></td>
                        <td><?= $data->nama_depan; ?></td>
                        <td><?= $data->email; ?></td>
                        <td><?= $data->ponsel; ?></td>
                        <td><?= $data->nominal; ?></td>
                        <td class="text-center">
                            <a href="https://app.sandbox.midtrans.com/snap/v2/vtweb/<?= $data->token; ?>" class="fas fa-eye btn-sm btn-danger">Bayar</a>
                        </td>
                        <td class="text-center">
                            <?= $hasil['fraud_status']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th width="50px" class="text-center">No</th>
                    <th>Nama Belakang</th>
                    <th>Nama Depan</th>
                    <th>Email</th>
                    <th>Ponsel</th>
                    <th>Nominal</th>
                    <th>Bayar</th>
                    <th width="150px" class="text-center">Action</th>
                </tr>
            </tfoot>
        </table>
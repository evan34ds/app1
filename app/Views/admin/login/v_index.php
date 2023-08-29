<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->



                <div class="login-box">
                    <div class="login-logo">
                        <a href="<?= base_url() ?>"><b>Login</b>SIAKAD</a>
                    </div>
                    <!-- /.login-logo -->
                    <div class="card">
                        <div class="card-body login-card-body">
                            <p class="login-box-msg">Silakan Login</p>

                            <!-- untuk Error jika kosong -->
                            <?php
                            $errors = session()->getFlashdata('errors');
                            if (!empty($errors)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        <?php foreach ($errors as $key => $value) { ?>
                                            <li><?= esc($value) ?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>

                            <!-- untuk masuk ke menu utama -->
                            <?php
                            if (session()->getFlashdata('pesan')) {
                                echo '<div class="alert alert-warning" role="alert">';
                                echo session()->getFlashdata('pesan');
                                echo '</div>';
                            }
                            ?>

                            <?php
                            if (session()->getFlashdata('sukses')) {
                                echo '<div class="alert alert-success alert-dismissible" role="alert">';
                                echo session()->getFlashdata('sukses');
                                echo '</div>';
                            }
                            ?>

                            <?php
                            echo form_open('auth/cek_login') ?>
                            <div class="input-group mb-3">
                                <input name="username" class="form-control" placeholder="Username">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <select name="level" class="form-control">
                                    <option value="">--Hak Akses--</option>
                                    <option value="1">1. Admin</option>
                                    <option value="2">2. Mahasiswa</option>
                                    <option value="3">3. Dosen</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <input name="password" type="password" class="form-control" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">

                                </div>
                                <!-- /.col -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block">Log In</button>
                                </div>
                                <!-- /.col -->
                            </div>
                            <?php echo form_close() ?>
                            <!-- /.social-auth-links -->
                        </div>
                        <!-- /.login-card-body -->
                    </div>
                </div>
                <!-- /.login-box -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
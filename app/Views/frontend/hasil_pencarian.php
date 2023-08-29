
<section id="berita" class="courses">
    <div class="container" data-aos="fade-up">


        <div class="section-title">
            <h2>Berita</h2>
            <form action="<?php echo base_url('home/cari') ?>" action="GET" class="form-inline">
                <input name="cari" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="cari">Search</button>
            </form>
            <div class="row mb-12">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark"><?= $title ?> <b><?= $cari ?></b></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div>
        <div class="row" data-aos="zoom-in" data-aos-delay="100">

            <?php
            foreach ($data as $value) :
            ?>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="course-item">
                        <img src="<?= base_url('img/berita/thumb/' . $value['gambar']) ?>" class="img-fluid" alt="...">
                        <div class="course-content">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4><?= $value['nama_kategori'] ?></h4>
                            </div>
                            <h6><?= date_indo($value['tgl_berita']) ?></h6>
                            <h3><a href="<?= base_url('home/detail_berita/' . $value['slug_berita']) ?>"><?= $value['judul_berita'] ?></a></h3>
                            <p> <?= substr(strip_tags($value['isi']), 0, 150) ?>...</p>
                            <div class="trainer d-flex justify-content-between align-items-center">
                                <div class="trainer-profile d-flex align-items-center">
                                    <img src="<?= base_url('user/thumb/' . 'thumb_' . $value['foto']) ?>" class="img-fluid" alt="">
                                    <span><?= $value['nama_user'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Course Item-->
            <?php endforeach; ?>

        </div>
        <a href="<?= base_url('home/semua_berita') ?>"> <button class="btn btn-block btn-success btn-lg">Lihat Semua Berita</button></a>

    </div>



</section>
</div>

<section id="berita" class="courses">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Berita</h2>
        </div>
        <?= form_open('home/semua_berita') ?>
        <?= csrf_field() ?>
        <div class="input-group mb-3">
            <input type="text" class="form-control" value="<?= $cari ?>" placeholder="Cari Berita" name='cariberita' aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append" autofocus>
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="tombolcariberita">Cari</button>
            </div>
        </div>
        <?= form_close(); ?>
      
        <div class="row" data-aos="zoom-in" data-aos-delay="100">

            <?php

            $nomor= 1 + (($noHalaman - 1) * 3);
            foreach ($berita as $data) :
            ?>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="course-item">
                        <img src="<?= base_url('img/berita/thumb/' . $data['gambar']) ?>" width="100%" class="img-fluid" alt="...">
                        <div class="course-content">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4><?= $data['nama_kategori'] ?></h4>
                            </div>
                            <h6><?= date_indo($data['tgl_berita']) ?></h6>
                            <h3><a href="<?= base_url('home/detail_berita/' . $data['slug_berita']) ?>"><?= $data['judul_berita'] ?></a></h3>
                            <p> <?= substr(strip_tags($data['isi']), 0, 150) ?>...</p>
                            <div class="trainer d-flex justify-content-between align-items-center">
                                <div class="trainer-profile d-flex align-items-center">
                                    <img src="<?= base_url('user/thumb/' . 'thumb_' . $data['foto']) ?>" class="img-fluid" alt="">
                                    <span><?= $data['nama_user'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Course Item-->
            <?php endforeach; ?>

        </div>

        <?= $pager->links('berita', 'bootstrap_template') ?>
    </div>





</section>
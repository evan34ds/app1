<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->

<div class="content-header">
  <div class="container">
    <div class="col-sm-3">
    </div><!-- /.col -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <?php foreach ($slider as $key => $value) : ?>
          <?php if ($key == 0) : ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $key ?>" class="active"></li>
          <?php else : ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $key ?>"></li>
          <?php endif ?>
        <?php endforeach ?>
      </ol>
      <div class="carousel-inner">
        <?php foreach ($slider as $key => $value) : ?>
          <?php if ($key == 0) : ?>
            <div class="carousel-item active">
              <img src="<?= base_url() ?>/corousel/<?= $value['foto'] ?>" alt="First slide">
              <div class="carousel-caption">
                <br> <span class="tulisan_satu">SELAMAT DATANG</span></br>
                <br><span class="font-wight-bold">SEKOLAH TINGGI AGAMA KRISTEN LUWUK BANGGAI</span></br>
              </div>
            </div>

          <?php else : ?>

            <div class="carousel-item">
              <img src="<?= base_url() ?>/corousel/<?= $value['foto'] ?>" alt="Third slide">
            </div>

          <?php endif ?>
        <?php endforeach ?>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>


  </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>

<section id="berita" class="courses">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Berita</h2>
    </div>
    <div class="row" data-aos="zoom-in" data-aos-delay="100">

      <?php
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
    <a href="<?= base_url('home/semua_berita') ?>"> <button class="btn btn-block btn-success btn-lg">Lihat Semua Berita</button></a>

  </div>

</section>
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
<section id="course-details" class="course-details">
  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="col-lg-8">
        <img src="<?= base_url('img/berita/' . $berita->gambar) ?>" width="100%" class="img-fluid" alt="">
        <h3><?= $berita->judul_berita ?></h3>
        <p>
          <?= $berita->isi ?>
        </p>
      </div>
      <div class="col-lg-4">

        <div class="course-info d-flex justify-content-between align-items-center">
          <h5>Tanggal</h5>
          <p><a href="#"> <?= date_indo($berita->tgl_berita) ?></a></p>
        </div>

        <div class="course-info d-flex justify-content-between align-items-center">
          <h5>Kategori</h5>
          <p> <?= $berita->nama_kategori ?></p>
        </div>

        <div class="course-info d-flex justify-content-between align-items-center">
          <h5>Post By</h5>
          <p> <?= $berita->nama_user ?></p>
        </div>

        <div class="text-center">
          <h5>Bagikan Berita</h5>
          <a href="http://www.facebook.com/sharer.php?u=<?= base_url('home/detail_berita/' . $berita->slug_berita) ?>" target="_blank" class="btn btn-primary"><i class="mdi mdi-facebook"></i> Facebook</a>
          <a href="http://twitter.com/share?url=<?= base_url('home/detail_berita/' . $berita->slug_berita) ?>" target="_blank" class="btn btn-info"><i class="mdi mdi-twitter"></i> Twitter</a>
          <a href="whatsapp://send?text=<?= base_url('home/detail_berita/' . $berita->slug_berita) ?>" target="_blank" data-action="share/whatsapp/share" class="btn btn-success"><i class="mdi mdi-whatsapp"></i> Whatsapp</a>
        </div>
      </div>
    </div>

  </div>
</section><!-- End Cource Details Section -->
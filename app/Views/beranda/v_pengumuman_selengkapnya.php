<section id="services" class="services">
  <div class="container">
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2><?= $title ?></h2>
        </div>
        <div class="row">
          <?php foreach ($pengumumanSelengkapnya as $key => $data) : ?>
            <?php if ($key == 0) : ?>
              <div class="col-md-12">
                <div class="icon-box">
                  <i class="bi bi-file-earmark-pdf-fill"></i>
                  <h4><a href="<?= base_url('home/viewPdf/' . $data['pdf']) ?>"><?= $data['judul_pengumuman'] ?></a></h4>
                  <p><?= date_indo($data['tgl_pengumuman']) ?></p>
                </div>
              </div>
            <?php else : ?>
              <div class="col-md-6 mt-4 mt-md-0">
                <div class="icon-box">
                  <i class="bi bi-file-earmark-pdf-fill"></i>
                  <h4><a href="<?= base_url('home/viewPdf/' . $data['pdf']) ?>" target="_blank"><?= $data['judul_pengumuman'] ?></a></h4>
                  <p><?= date_indo($data['tgl_pengumuman']) ?></p>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </section><!-- End Services Section -->

  </div>
</section><!-- End Services Section -->
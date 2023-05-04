<?= $this->include('template/navbar'); ?>

<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">List</h6>
            <h1 class="display-6 mb-4">Unit Kegiatan Mahasiswa</h1>
        </div>
        <div class="row g-4">
            <?php
            $links = [
                '/home/damus',
                '/home/ldk'
            ];
            foreach ($list as $index => $l) : ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="<?= $links[$index]; ?>">
                        <img class="img-fluid rounded mb-4" src="/img/<?= $l['logo']; ?>" alt="">
                        <h4 class="mb-0"><?= $l['namaukm']; ?></h4>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>
<!-- Service End -->



<!-- Project Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Kegiatan</h6>
            <h1 class="display-6 mb-4">Galleri Kegiatan UKM - UKM</h1>
        </div>
        <!-- //kegiatanldk -->
        <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
            <?php $i = 1; ?>
            <?php foreach ($kegiatanldk as $l) : ?>
                <div class="project-item border rounded h-100 p-4" data-dot="01">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded" src="/img/<?= $l['dokumentasi']; ?>" alt="">
                        <a href="/img/<?= $l['dokumentasi']; ?>" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                    </div>
                    <h6><?= $l['namakegiatan']; ?></h6>
                    <span><?= $l['deskripsi']; ?></span>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- kegiatan damus -->
        <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
            <?php $i = 1; ?>
            <?php foreach ($kegiatandapus as $d) : ?>
                <div class="project-item border rounded h-100 p-4" data-dot="01">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded" src="/img/<?= $d['dokumentasi']; ?>" alt="">
                        <a href="/img/<?= $d['dokumentasi']; ?>" data-lightbox="project"><i class="fa fa-eye fa-2x"></i></a>
                    </div>
                    <h6><?= $d['namakegiatan']; ?></h6>
                    <span><?= $d['deskripsi']; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Project End -->



<?= $this->include('template/footer'); ?>
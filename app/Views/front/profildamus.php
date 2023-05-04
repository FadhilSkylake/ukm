<?= $this->include('template/navbar'); ?>

<!-- Facts Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="fact-item bg-light rounded text-center h-100 p-5">
                    <i class="fa fa-users fa-4x text-primary mb-4"></i>
                    <h5 class="mb-3">Jumlah Anggota</h5>
                    <h1 class="display-5 mb-0" data-toggle="counter-up"><?= $anggotadapus; ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Facts End -->

<!-- Feature Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="h-100">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Unit Kegiatan Mahasiswa</h6>
                    <?php foreach ($damus as $d) : ?>
                        <h1 class="display-6 mb-4"><?= $d['namaukm']; ?></h1>
                        <p class="mb-4"><?= $d['deskripsi']; ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="img-border">
                    <img class="img-fluid" src="/img/<?= $d['logo']; ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->

<?= $this->include('template/footer'); ?>
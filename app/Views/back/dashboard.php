<?= $this->include('layout/sidebar'); ?>
<?= $this->include('layout/navbar'); ?>
<?= $this->section('content'); ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card corona-gradient-card">
          <div class="card-body py-0 px-0 px-sm-3">
            <div class="row align-items-center">
              <div class="col-4 col-sm-3 col-xl-2">
                <img src="<?= base_url(); ?>/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
              </div>
              <div class="col-5 col-sm-7 col-xl-8 p-0">
                <h4 class="mb-1 mb-sm-0">Universitas Subang</h4>
                <p class="mb-0 font-weight-normal d-none d-sm-block">Sistem Informasi Unit Kegiatan Mahasiswa</p>
              </div>
              <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">

              </div>
            </div>
          </div>
        </div>
      </div>
      <?php if (in_groups('adminbem')) : ?>
        <!-- data -->
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0"><?= $anggotadapus; ?></h3>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal">Anggota UKM Dapur Musik</h6>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0"><?= $anggotaldk; ?></h3>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal">Anggota UKM LDK Subulussalam</h6>
            </div>
          </div>
        </div>
        <!-- kegiatan LDK Kegiatan -->
        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-row justify-content-between">
                <h4 class="card-title mb-1">Kegiatan UKM LDK Subulussalam</h4>
                <!-- <p class="text-muted mb-1">Your data status</p> -->
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="preview-list">
                    <?php $i = 1; ?>
                    <?php foreach ($kegiatanldk as $l) : ?>
                      <div class="preview-item border-bottom">
                        <div class="preview-item-content d-sm-flex flex-grow">
                          <div class="flex-grow">
                            <img src="/img/<?= $l['dokumentasi']; ?>" width="200" height="200">
                            <br>
                            <h6 class="preview-subject"><?= $l['namakegiatan']; ?></h6>
                            <p class="text-muted mb-0"><?= $l['deskripsi']; ?></p>
                          </div>
                          <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                            <!-- <p class="text-muted">15 minutes ago</p>
                            <p class="text-muted mb-0">30 tasks, 5 issues </p> -->
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- kegiatan Dapur Musik -->
        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-row justify-content-between">
                <h4 class="card-title mb-1">Kegiatan UKM Dapur Musik</h4>
                <!-- <p class="text-muted mb-1">Your data status</p> -->
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="preview-list">
                    <?php $i = 1; ?>
                    <?php foreach ($kegiatandapus as $d) : ?>
                      <div class="preview-item border-bottom">
                        <div class="preview-item-content d-sm-flex flex-grow">
                          <div class="flex-grow">
                            <img src="/img/<?= $d['dokumentasi']; ?>" width="200" height="200">
                            <br>
                            <h6 class="preview-subject"><?= $d['namakegiatan']; ?></h6>
                            <p class="text-muted mb-0"><?= $d['deskripsi']; ?></p>
                          </div>
                          <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                            <!-- <p class="text-muted">15 minutes ago</p>
                            <p class="text-muted mb-0">30 tasks, 5 issues </p> -->
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php elseif (in_groups('admindamus')) : ?>
        <!-- damus -->
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0"><?= $anggotadapus; ?></h3>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal">Anggota UKM Dapur Musik</h6>
            </div>
          </div>
        </div>
        <!-- kegiatan Dapur Musik -->
        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-row justify-content-between">
                <h4 class="card-title mb-1">Kegiatan UKM Dapur Musik</h4>
                <!-- <p class="text-muted mb-1">Your data status</p> -->
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="preview-list">
                    <?php $i = 1; ?>
                    <?php foreach ($kegiatandapus as $d) : ?>
                      <div class="preview-item border-bottom">
                        <div class="preview-item-content d-sm-flex flex-grow">
                          <div class="flex-grow">
                            <img src="/img/<?= $d['dokumentasi']; ?>" width="200" height="200">
                            <br>
                            <h6 class="preview-subject"><?= $d['namakegiatan']; ?></h6>
                            <p class="text-muted mb-0"><?= $d['deskripsi']; ?></p>
                          </div>
                          <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                            <!-- <p class="text-muted">15 minutes ago</p>
                            <p class="text-muted mb-0">30 tasks, 5 issues </p> -->
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php elseif (in_groups('adminldk')) :  ?>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0"><?= $anggotaldk; ?></h3>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal">Anggota UKM LDK Subulussalam</h6>
            </div>
          </div>
        </div>
        <!-- kegiatan LDK Kegiatan -->
        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-row justify-content-between">
                <h4 class="card-title mb-1">Kegiatan UKM LDK Subulussalam</h4>
                <!-- <p class="text-muted mb-1">Your data status</p> -->
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="preview-list">
                    <?php $i = 1; ?>
                    <?php foreach ($kegiatanldk as $l) : ?>
                      <div class="preview-item border-bottom">
                        <div class="preview-item-content d-sm-flex flex-grow">
                          <div class="flex-grow">
                            <img src="/img/<?= $l['dokumentasi']; ?>" width="200" height="200">
                            <br>
                            <h6 class="preview-subject"><?= $l['namakegiatan']; ?></h6>
                            <p class="text-muted mb-0"><?= $l['deskripsi']; ?></p>
                          </div>
                          <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                            <!-- <p class="text-muted">15 minutes ago</p>
                            <p class="text-muted mb-0">30 tasks, 5 issues </p> -->
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
<?= $this->include('layout/footer'); ?>
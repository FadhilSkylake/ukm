<?= $this->include('template/navbar'); ?>

<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">FORMULIR</h6>
            <h1 class="display-6 mb-4">Pendaftaran Anggota Baru Unit Kegiatan Mahasiswa</h1>
        </div>
        <div class="row g-0 justify-content-center">
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.5s">
                <p class="text-center mb-4">Isikan data dibawah dengan sesuai dan benar. Setelah submit tunggu pihak masing - masing UKM untuk melakukan interview</a>.</p>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <form action="/formpendaftaran/save" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" placeholder="Nama Lengkap" name="nama" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                                <label for="nama">Nama Lengkap</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control <?= ($validation->hasError('npm')) ? 'is-invalid' : ''; ?>" id="npm" placeholder="NPM" name="npm" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('npm'); ?>
                                </div>
                                <label for="npm">NPM</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control <?= ($validation->hasError('fakultas')) ? 'is-invalid' : ''; ?>" id="fakultas" placeholder="Fakultas" name="fakultas" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('fakultas'); ?>
                                </div>
                                <label for="fakultas">Fakultas</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="tel" class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : ''; ?>" id="telepon" placeholder="No Telepon" name="telepon">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('telepon'); ?>
                                </div>
                                <label for="subject">No Telepon</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control <?= ($validation->hasError('ukm')) ? 'is-invalid' : ''; ?>" id="ukm" placeholder="UKM" name="ukm">
                                <label for="ukm">UKM YANG DIPILIH</label>
                                <!-- <select class="form-select form-select-sm ">
                                    <option value="1">Dapur Musik</option>
                                    <option value="2">LDK Subulussalam</option>
                                </select> -->
                                <!-- <input type="tel" class="form-control" id="telepon" placeholder="No Telepon">
                                <label for="subject">No Telepon</label> -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control <?= ($validation->hasError('alasan')) ? 'is-invalid' : ''; ?>" placeholder="Alasan" id="alasan" name="alasan" style="height: 200px"></textarea>
                                <label for="message">Alasan Memilih UKM</label>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Daftar Sekarang</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->



<?= $this->include('template/footer'); ?>
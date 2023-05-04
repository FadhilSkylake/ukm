<?= $this->include('layout/sidebar'); ?>
<?= $this->include('layout/navbar'); ?>
<?= $this->section('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="my-3">Form Ubah Data Kegiatan Dapur Musik</h2>
                        <form action="/kdapus/update/<?= $kdamus['id']; ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="slug" value="<?= $kdamus['slug']; ?>">
                            <input type="hidden" name="dokumentasiLama" value="<?= $kdamus['dokumentasi']; ?>">
                            <div class="form-group row">
                                <label for="namakegiatan" class="col-sm-2 col-form-label">Nama Kegiatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('namakegiatan')) ? 'is-invalid' : ''; ?>" id="namakegiatan" name="namakegiatan" autofocus value="<?= (old('namakegiatan')) ? old('namakegiatan') : $kdamus['namakegiatan']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('namakegiatan'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Kegiatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= (old('deskripsi')) ? old('deskripsi') : $kdamus['deskripsi']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tempat_kegiatan" class="col-sm-2 col-form-label">Tempat Kegiatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tempat_kegiatan" name="tempat_kegiatan" value="<?= (old('tempat_kegiatan')) ? old('tempat_kegiatan') : $kdamus['tempat_kegiatan']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="waktu_kegiatan" class="col-sm-2 col-form-label">Waktu Kegiatan</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="waktu_kegiatan" name="waktu_kegiatan" value="<?= (old('waktu_kegiatan')) ? old('waktu_kegiatan') : $kdamus['waktu_kegiatan']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="waktu_dibuat" class="col-sm-2 col-form-label">Waktu Dibuat</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="waktu_dibuat" name="waktu_dibuat" value="<?= (old('waktu_dibuat')) ? old('waktu_dibuat') : $kdamus['waktu_dibuat']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dokumentasi" class="col-sm-2 col-form-label">Dokumentasi</label>
                                <div class="col-sm-2">
                                    <img src="/img/<?= $kdamus['dokumentasi']; ?>" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-10">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('dokumentasi')) ? 'is-invalid' : ''; ?>" id="dokumentasi" name="dokumentasi" onchange="previewImg()">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('dokumentasi'); ?>
                                    </div>
                                    <label class="custom-file-label" for="Dokumentasi"><?= $kdamus['dokumentasi']; ?></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImg() {
        const dokumentasi = document.querySelector('#dokumentasi');
        const dokumentasiLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        dokumentasiLabel.textContent = dokumentasi.files[0].name;

        const fileDok = new FileReader();
        fileDok.readAsDataURL(dokumentasi.files[0]);

        fileDok.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection(); ?>
<?= $this->include('layout/footer'); ?>
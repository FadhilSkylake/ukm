<?= $this->include('layout/sidebar'); ?>
<?= $this->include('layout/navbar'); ?>
<?= $this->section('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class=" grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="my-3">Form Ubah Data Profil Dapur Musik</h2>
                        <form action="/pdapus/update/<?= $damus['id']; ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="slug" value="<?= $damus['slug']; ?>">
                            <input type="hidden" name="logoLama" value="<?= $damus['logo']; ?>">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama UKM</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('namaukm')) ? 'is-invalid' : ''; ?>" id="namaukm" name="namaukm" autofocus value="<?= (old('namaukm')) ? old('namaukm') : $damus['namaukm']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('namaukm'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sampul" class="col-sm-2 col-form-label">Logo</label>
                                <div class="col-sm-2">
                                    <img src="/img/<?= $damus['logo']; ?>" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-8">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= ($validation->hasError('logo')) ? 'is-invalid' : ''; ?>" id="logo" name="logo" onchange="previewImg()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('logo'); ?>
                                        </div>
                                        <label class="custom-file-label" for="Logo"><?= $damus['logo']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= (old('deskripsi')) ? old('deskripsi') : $damus['deskripsi']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tahundibuat" class="col-sm-2 col-form-label">Tahun Dibuat</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="tahundibuat" name="tahundibuat" value="<?= (old('tahundibuat')) ? old('tahundibuat') : $damus['tahundibuat']; ?>">
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
        const logo = document.querySelector('#logo');
        const logoLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        logoLabel.textContent = logo.files[0].name;

        const fileLogo = new FileReader();
        fileLogo.readAsDataURL(logo.files[0]);

        fileLogo.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection(); ?>
<?= $this->include('layout/footer'); ?>
<?= $this->include('layout/sidebar'); ?>
<?= $this->include('layout/navbar'); ?>
<?= $this->section('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="my-3">Form Tambah Data Profil UKM LDK Subulussalam</h2>
                        <form action="/pldk/save" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="slug" value="">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama UKM</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('namaukm')) ? 'is-invalid' : ''; ?>" id="namaukm" name="namaukm" autofocus value="<?= old('namaukm'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('namaukm'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sampul" class="col-sm-2 col-form-label">Logo</label>
                                <div class="col-sm-2">
                                    <img src="/img/default.jpg" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-8">
                                    <div class="col-sm-10">
                                        <input type="file" class="custom-file-input <?= ($validation->hasError('logo')) ? 'is-invalid' : ''; ?>" id="logo" name="logo" onchange="previewImg()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('logo'); ?>
                                        </div>
                                        <label class="custom-file-label" for="Logo">Pilih gambar</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="penulis" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= old('deskripsi'); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="penulis" class="col-sm-2 col-form-label">Tahun Dibuat</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="tahundibuat" name="tahundibuat" value="<?= old('tahundibuat'); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Tambah Data</button>
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
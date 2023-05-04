<?= $this->include('layout/sidebar'); ?>
<?= $this->include('layout/navbar'); ?>
<?= $this->section('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Tambah Data UKM</h4>
                        <p class="card-description"> </p>
                        <form class="forms-sample" action="/ukmlist/save" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama UKM</label>
                                <input type="text" class="form-control <?= ($validation->hasError('namaukm')) ? 'is-invalid' : ''; ?>" id="namaukm" placeholder="Masukkan Nama UKM" name="namaukm" autofocus value="<?= old('namaukm'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('namaukm'); ?>
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
                            <div class="form-group">
                                <label for="exampleInputUsername1">Pembimbing</label>
                                <input type="text" class="form-control" id="pembimbing" placeholder="Masukkan Nama Pembimbing" name="pembimbing" autofocus value="<?= old('pembimbing'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Ketua</label>
                                <input type="text" class="form-control" id="namaketua" placeholder="Masukkan Nama Ketua" name="namaketua" autofocus value="<?= old('namaketua'); ?>">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-dark">Cancel</button>
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
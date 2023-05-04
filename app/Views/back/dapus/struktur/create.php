<?= $this->include('layout/sidebar'); ?>
<?= $this->include('layout/navbar'); ?>
<?= $this->section('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Tambah Data Struktur UKM Dapur Musik</h4>
                        <p class="card-description"> </p>
                        <form class="forms-sample" action="/sdapus/save" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Lengkap</label>
                                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" placeholder="Nama Lengkap" name="nama" autofocus value="<?= old('nama'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" placeholder="Jabatan" name="jabatan" autofocus value="<?= old('jabatan'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">NPM</label>
                                <input type="text" class="form-control" id="npm" placeholder="Nomor Pokok Mahasiswa" name="npm" autofocus value="<?= old('npm'); ?>">
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
<?= $this->endSection(); ?>
<?= $this->include('layout/footer'); ?>
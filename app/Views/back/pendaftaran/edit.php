<?= $this->include('layout/sidebar'); ?>
<?= $this->include('layout/navbar'); ?>
<?= $this->section('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="my-3">Form Ubah Data Pendaftar</h2>
                        <form action="/pendaftaran/update/<?= $daftar['id']; ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="slug" value="<?= $daftar['slug']; ?>">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= (old('nama')) ? old('nama') : $daftar['nama'] ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="penulis" class="col-sm-2 col-form-label">NPM</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="npm" name="npm" value="<?= (old('npm')) ? old('npm') : $daftar['npm']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="penulis" class="col-sm-2 col-form-label">Fakultas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="fakultas" name="fakultas" value="<?= (old('fakultas')) ? old('fakultas') : $daftar['fakultas']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="penulis" class="col-sm-2 col-form-label">No Telepon</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="telepon" name="telepon" value="<?= (old('telepon')) ? old('telepon') : $daftar['telepon']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="penulis" class="col-sm-2 col-form-label">UKM Yang Dipilih</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ukm" name="ukm" value="<?= (old('ukm')) ? old('ukm') : $daftar['ukm']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="penulis" class="col-sm-2 col-form-label">Alasan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="alasan" name="alasan" value="<?= (old('alasan')) ? old('alasan') : $daftar['alasan']; ?>">
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
<?= $this->endSection(); ?>
<?= $this->include('layout/footer'); ?>
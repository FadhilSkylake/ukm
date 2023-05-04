<?= $this->include('layout/sidebar'); ?>
<?= $this->include('layout/navbar'); ?>
<?= $this->section('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col">
                <div class="page-header">
                    <h3 class="page-title"> Detail Pendaftar Anggota Baru UKM UKM</h3>
                    </nav>
                </div>
                <h2 class="mt-2"></h2>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <!-- <div class="col-md-4"> -->

                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text">Nama Lengkap : <?= $daftar['nama']; ?></p>
                            <p class="card-text">NPM : <?= $daftar['npm']; ?></p>
                            <p class="card-text">Fakultas : <?= $daftar['fakultas']; ?></p>
                            <p class="card-text">No Telepon : <?= $daftar['telepon']; ?></p>
                            <p class="card-text">UKM yang dipilih : <?= $daftar['ukm']; ?></p>
                            <p class="card-text">Alasan : <?= $daftar['alasan']; ?></p>


                            <a href="/pendaftaran/edit/<?= $daftar['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/pendaftaran/<?= $daftar['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                            </form>

                            <br><br>
                            <a href="/pendaftaran">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->include('layout/footer'); ?>
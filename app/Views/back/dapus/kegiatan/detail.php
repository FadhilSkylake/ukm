<?= $this->include('layout/sidebar'); ?>
<?= $this->include('layout/navbar'); ?>
<?= $this->section('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col">
                <div class="page-header">
                    <h3 class="page-title"> Detail Kegiatan UKM Dapur Musik</h3>
                    <nav aria-label="breadcrumb">
                    </nav>
                </div>
                <h2 class="mt-2"></h2>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="/img/<?= $kdamus['dokumentasi']; ?>" class="card-img" alt="...">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text">Nama Kegiatan : <?= $kdamus['namakegiatan']; ?></p>
                            <p class="card-text">Deskripsi Kegiatan : <?= $kdamus['deskripsi']; ?></p>
                            <p class="card-text">Tempat Kegiatan : <?= $kdamus['tempat_kegiatan']; ?></p>
                            <p class="card-text">Waktu Kegiatan : <?= $kdamus['waktu_kegiatan']; ?></p>
                            <p class="card-text">Waktu Dibuat : <?= $kdamus['waktu_dibuat']; ?></p>
                            <p class="card-text">Dokumentasi : <?= $kdamus['dokumentasi']; ?></p>


                            <a href="/kdapus/edit/<?= $kdamus['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/kdapus/<?= $kdamus['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                            </form>

                            <br><br>
                            <a href="/kdapus">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->include('layout/footer'); ?>
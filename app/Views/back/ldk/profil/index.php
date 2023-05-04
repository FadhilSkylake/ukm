<?= $this->include('layout/sidebar'); ?>
<?= $this->include('layout/navbar'); ?>
<?= $this->section('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Profil UKM LDK Subulussalam </h3>
            <nav aria-label="breadcrumb">
                <a href="/pldk/create" class=" btn btn-primary mt-3" id="exampleModal">Tambah Data Profil</a>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Kelola Profil UKM LDK Subulussalam</h4>

                        <div class="col-md-8">
                            <?php $i = 1; ?>
                            <?php foreach ($ldkkegiatan as $k) : ?>
                                <div class="card-body">
                                    <h5 class="card-title">UKM <?= $k['namaukm']; ?></h5>
                                    <p class="card-text">Tahun Berdiri <?= $k['tahundibuat']; ?></p>
                                    <p class="card-text"><img src="/img/<?= $k['logo']; ?>" alt="" width="200" height="200"></p>
                                    <p class="card-text">Tentang
                                        <br>
                                        <?= $k['deskripsi']; ?>
                                    </p>
                                    <a href="/pldk/edit/<?= $k['slug']; ?>" class="btn btn-warning">Edit</a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->include('layout/footer'); ?>
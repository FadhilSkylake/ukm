<?= $this->include('layout/sidebar'); ?>
<?= $this->include('layout/navbar'); ?>
<?= $this->section('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Profil UKM Dapur Musik </h3>
            <nav aria-label="breadcrumb">
                <a href="/pdapus/create" class=" btn btn-primary mt-3" id="exampleModal">Tambah Data Profil</a>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Kelola Profil UKM Dapur Musik</h4>
                        <!-- <p class="card-description"> Add class <code>.table-bordered</code> -->
                        </p>
                        <!-- <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Nama UKM </th>
                                        <th> Logo </th>
                                        <th> Deskripsi </th>
                                        <th> Tahun Dibuat </th>
                                        <th> Aksi </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($damus as $d) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $d['namaukm']; ?></td>
                                            <td><img src="/img/<?= $d['logo']; ?>" alt="" class="logo"></td>
                                            <td><?= $d['deskripsi']; ?></td>
                                            <td><?= $d['tahundibuat']; ?></td>
                                            <td>
                                                <a href="/pdapus/edit" class="btn btn-warning">Edit</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div> -->
                        <div class="col-md-8">
                            <?php $i = 1; ?>
                            <?php foreach ($damus as $d) : ?>
                                <div class="card-body">
                                    <h5 class="card-title">UKM <?= $d['namaukm']; ?></h5>
                                    <p class="card-text">Tahun Berdiri <?= $d['tahundibuat']; ?></p>
                                    <p class="card-text"><img src="/img/<?= $d['logo']; ?>" alt="" width="200" height="200"></p>
                                    <p class="card-text">Tentang
                                        <br>
                                        <?= $d['deskripsi']; ?>
                                    </p>
                                    <a href="/pdapus/edit/<?= $d['slug']; ?>" class="btn btn-warning">Edit</a>
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
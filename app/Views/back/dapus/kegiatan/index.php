<?= $this->include('layout/sidebar'); ?>
<?= $this->include('layout/navbar'); ?>
<?= $this->section('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Kegiatan UKM Dapur Musik </h3>
            <nav aria-label="breadcrumb">
                <a href="/kdapus/create" class=" btn btn-primary mt-3" id="exampleModal">Tambah Data Kegiatan</a>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bordered table</h4>
                        <p class="card-description"> Add class <code>.table-bordered</code>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Nama Kegiatan </th>
                                        <th> Deskripsi Kegiatan </th>
                                        <th> Tempat Kegiatan </th>
                                        <th> Waktu Kegiatan </th>
                                        <th> Waktu Dibuat</th>
                                        <th> Dokumentasi</th>
                                        <th> Aksi </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($kdamus as $k) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $k['namakegiatan']; ?></td>
                                            <td><?= $k['deskripsi']; ?></td>
                                            <td><?= $k['tempat_kegiatan']; ?></td>
                                            <td><?= $k['waktu_kegiatan']; ?></td>
                                            <td><?= $k['waktu_dibuat']; ?></td>
                                            <td><img src="/img/<?= $k['dokumentasi']; ?>"></td>
                                            <td>
                                                <a href="/kdapus/<?= $k['slug']; ?>" class="btn btn-success">Detail</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->include('layout/footer'); ?>
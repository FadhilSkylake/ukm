<?= $this->include('layout/sidebar'); ?>
<?= $this->include('layout/navbar'); ?>
<?= $this->section('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Anggota UKM Dapur Musik </h3>
            <nav aria-label="breadcrumb">
                <!-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol> -->
                <a href="/adapus/create" class=" btn btn-primary mt-3" id="exampleModal">Tambah Data Anggota</a>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tabel List Anggota UKM Dapur Musik</h4>
                        <!-- <p class="card-description"> Add class <code>.table-bordered</code> -->
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Nama Lengkap </th>
                                        <th> NPM </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($anggotadapus as $a) : ?>
                                        <tr>
                                            <td> <?= $i++; ?> </td>
                                            <td> <?= $a['nama']; ?> </td>
                                            <td> <?= $a['npm']; ?> </td>
                                            <td>
                                                <a href="/adapus/edit/<?= $a['slug']; ?>" class="btn btn-warning">Edit</a>
                                                <form action="/adapus/<?= $a['id']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                                                </form>
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
<?= $this->include('layout/sidebar'); ?>
<?= $this->include('layout/navbar'); ?>
<?= $this->section('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Anggota UKM LDK Subulussalam </h3>
            <nav aria-label="breadcrumb">
                <a href="/aldk/create" class=" btn btn-primary mt-3" id="exampleModal">Tambah Data Anggota</a>
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
                                        <th> Nama Lengkap </th>
                                        <th> NPM </th>
                                        <th> Aksi </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($anggotaldk as $a) : ?>
                                        <tr>
                                            <td> <?= $i++; ?> </td>
                                            <td> <?= $a['nama']; ?> </td>
                                            <td> <?= $a['npm']; ?> </td>
                                            <td>
                                                <a href="/aldk/edit/<?= $a['slug']; ?>" class="btn btn-warning">Edit</a>
                                                <form action="/aldk/<?= $a['id']; ?>" method="post" class="d-inline">
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
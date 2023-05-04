<?= $this->include('layout/sidebar'); ?>
<?= $this->include('layout/navbar'); ?>
<?= $this->section('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> List Unit Kegiatan Mahasiswa </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
                <a href="/ukmlist/create" class=" btn btn-primary mt-3" id="exampleModal">Tambah UKM</a>
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
                                        <th> Nama UKM </th>
                                        <th> Logo UKM </th>
                                        <th> Pembimbing </th>
                                        <th> Nama Ketua </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($list as $l) : ?>
                                        <tr>
                                            <td> <?= $i++; ?> </td>
                                            <td> <?= $l['namaukm']; ?> </td>
                                            <td> <img src="/img/<?= $l['logo']; ?>" alt="" width="200" height="200"> </td>
                                            <td> <?= $l['pembimbing']; ?> </td>
                                            <td> <?= $l['namaketua']; ?> </td>
                                            <td>
                                                <a href="/ukmlist/edit/<?= $l['slug']; ?>" class="btn btn-warning">Edit</a>
                                                <form action="/ukmlist/<?= $l['id']; ?>" method="post" class="d-inline">
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
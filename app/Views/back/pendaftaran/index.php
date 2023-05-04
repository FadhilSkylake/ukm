<?= $this->include('layout/sidebar'); ?>
<?= $this->include('layout/navbar'); ?>
<?= $this->section('content'); ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Data Pendaftaran Anggota Baru UKM </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        </ol>
        <a href="/pendaftaran/create" class=" btn btn-primary mt-3" id="exampleModal">Tambah Data Pendaftar</a>
      </nav>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            </p>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th> No </th>
                    <th> Nama Lengkap </th>
                    <th> UKM yang dipilih </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($daftar as $d) : ?>
                    <tr>
                      <td> <?= $i++; ?> </td>
                      <td> <?= $d['nama']; ?> </td>
                      <td> <?= $d['ukm']; ?> </td>
                      <td>
                        <a href="/pendaftaran/<?= $d['slug']; ?>" class="btn btn-success">Detail</a>
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
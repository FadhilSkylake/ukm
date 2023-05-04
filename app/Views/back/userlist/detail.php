<?= $this->include('layout/sidebar'); ?>
<?= $this->include('layout/navbar'); ?>
<?= $this->section('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> List Unit Kegiatan Mahasiswa </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        </p>
                        <div class="table-responsive">
                            <div class="col-md-4">
                                <img src="<?= base_url('/img/' . $user->user_image); ?>" class="card-img" alt="<?= $user->username; ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group">
                                            <h4><?= $user->username; ?></h4>
                                        </li>
                                        <?php if ($user->fullname) : ?>
                                            <li class="list-group"><?= $user->fullname; ?></li>
                                        <?php endif; ?>

                                        <li class="list-group"><?= $user->email; ?></li>
                                        <li class="list-group">
                                            <span class="badge badge-<?= ($user->name == 'adminbem') ? 'success' : 'warning' ?>"><?= $user->name; ?></span>
                                        </li>
                                        <li class="list-group">
                                            <a href="<?= base_url('admin'); ?>">&laquo; back to user list</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->include('layout/footer'); ?>
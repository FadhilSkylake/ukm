<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('auth-content'); ?>
<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="row w-100 m-0">
      <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
        <div class="card col-lg-4 mx-auto">
          <div class="card-body px-5 py-5">
            <h2 class="card-header text-center mb-2"><?= lang('Auth.loginTitle') ?></h2>
            <h5 class="card-title text-center mb-2">SISTEM INFORMASI UNIT KEGIATAN MAHASISWA </h5>
            <h6 class="card-title text-center mb-3">UNIVERSITAS SUBANG</h6>

            <?= view('Myth\Auth\Views\_message_block') ?>

            <form action="<?= route_to('login') ?>" method="post">
              <?= csrf_field() ?>

              <?php if ($config->validFields === ['email']) : ?>
                <div class="form-group">
                  <label for="login"><?= lang('Auth.email') ?></label>
                  <input type="email" class="form-control p_input <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                  <div class="invalid-feedback">
                    <?= session('errors.login') ?>
                  </div>
                </div>
              <?php else : ?>
                <div class="form-group">
                  <label for="login"><?= lang('Auth.emailOrUsername') ?></label>
                  <input type="text" class="form-control p_input <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                  <div class="invalid-feedback">
                    <?= session('errors.login') ?>
                  </div>
                </div>
              <?php endif; ?>

              <div class="form-group">
                <label for="password"><?= lang('Auth.password') ?></label>
                <input type="text" name="password" class="form-control p_input <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                <div class="invalid-feedback">
                  <?= session('errors.password') ?>
                </div>
              </div>

              <div class="form-group d-flex align-items-center justify-content-between">
                <?php if ($config->allowRemembering) : ?>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" name="remember" class="form-check-input"> <?php if (old('remember')) : ?> checked <?php endif ?>
                      <?= lang('Auth.rememberMe') ?> </label>
                  </div>
                <?php endif; ?>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block enter-btn"><?= lang('Auth.loginAction') ?></button>
              </div>
              <?php if ($config->activeResetter) : ?>
                <a href<?= route_to('forgot') ?> class="forgot-pass"><?= lang('Auth.forgotYourPassword') ?></a>
              <?php endif; ?>
            </form>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- row ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<?= $this->endSection(); ?>
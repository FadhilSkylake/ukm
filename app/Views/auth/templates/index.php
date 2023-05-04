<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?= base_url(); ?>/images/favicon.png" />
</head>

<body>
  <?= $this->renderSection('auth-content'); ?>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= base_url(); ?>/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url(); ?>/js/off-canvas.js"></script>
  <script src="<?= base_url(); ?>/js/hoverable-collapse.js"></script>
  <script src="<?= base_url(); ?>/js/misc.js"></script>
  <script src="<?= base_url(); ?>/js/settings.js"></script>
  <script src="<?= base_url(); ?>/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
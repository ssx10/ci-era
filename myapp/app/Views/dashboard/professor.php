<?= $this->extend('layouts/default-with-nav') ?>

<?= $this->section('content') ?>
  <h2 class="text-center py-3">Quick Exam Requests Aporoval</h2>
  <?=view('dashboard/partials/course-pending')?>
  <?=view('dashboard/partials/taught-courses')?>
<?= $this->endSection() ?>

<?= $this->section('footer') ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/shared.css">
<?= $this->endSection() ?>
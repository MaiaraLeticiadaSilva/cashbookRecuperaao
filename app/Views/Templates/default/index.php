
<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<?php
include "header.php";
$this->renderSection('main');
include "footer.php";
?>
<?= $this->endSection() ?>
<?php

$ano=date("Y");
$mes=date("m");

?>
<?= $this->extend('Templates/default/index') ?>

<?= $this->section('main') ?>
<div class="input-group">
        <a class="btn btn-primary" style="margin-right: 1vw; border-radius: 4px" href="<?php echo base_url() ?>/user/add"> Add </a>
    </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Type</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($users AS $user) : ?>
        <!--?= var_dump($moviment->id); ?-->
    <tr>
        <td><?= $user->id ?></td>
        <td><?= $user->name ?></td>
        <td><?= $user->email ?></td>
        <td><?= $user->type ?></td>
    </tr>
        <?php endforeach; ?>
  </tbody>
<table>
    
<?= $this->endSection() ?>
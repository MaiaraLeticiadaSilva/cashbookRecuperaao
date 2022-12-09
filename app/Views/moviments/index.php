<?php

$ano=date("Y");
$mes=date("m");

?>
<?= $this->extend('Templates/default/index') ?>

<?= $this->section('main') ?>
<!-- <div id="header-moviment"> -->
    <div class="input-group">
        <a class="btn btn-primary" style="margin-right: 1vw; border-radius: 4px" href="<?php echo base_url() ?>/moviments/add"> Add </a>
        <a class="btn btn-primary" style="margin-right: 1vw; border-radius: 4px" href="<?php echo base_url() ?>/moviments/pdf"> Gerar PDF </a>
    </div>
    <form action="<?php echo base_url() ?>/moviments/filtrar" method="POST">
        <div class="input-group">
            <label class="input-group-text" for="inputGroupSelect01">Year</label>
            <select name="year" class="form-select" id="inputGroupSelect01">
                <?php  
                    echo "<option value='$ano' selected>$ano</option>";
                    $ano=$ano-1;
                    echo "<option value='$ano' >$ano</option>";
                    $ano=$ano-1;
                    echo "<option value='$ano' >$ano</option>";
                    $ano=$ano-1;
                    echo "<option value='$ano' >$ano</option>";
                ?>
            </select>
        </div>
        <div class="input-group">
            <label class="input-group-text" for="inputGroupSelect01">Month</label>
            <select name="mes"class="form-select" id="inputGroupSelect01">
                <?php  
                    echo "<option value='$mes'>Mes Atual </option>";
                ?>

                <option value="1">Janeiro</option>
                <option value="2">Fevereiro</option>
                <option value="3">Março</option>
                <option value="4">Abril</option>
                <option value="5">Maio</option>
                <option value="6">Junho</option>
                <option value="7">Julho</option>
                <option value="8">Agosto</option>
                <option value="9">Setembro</option>
                <option value="10">Outubro</option>
                <option value="11">Novembro</option>
                <option value="12">Dezembro</option>
            </select>
        </div>
        <div class="input-group">
            <input type="submit" value="Filtrar" name="filtrar" class="btn btn-primary" style="margin-right: 1vw; border-radius: 4px">
        </div>
    </form>
    <div class="input-group">
        <span class="input-group-text" id="basic-addon1">Cash balance</span>
        <input type="text" class="form-control" id="input-cash-balance" value="R$<?php echo $cash_balance?>" disabled>
    </div>
<!-- </div> -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date</th>
      <th scope="col">Description</th>
      <th scope="col">Value</th>
      <th scope="col">Type</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($moviments AS $moviment) : ?>
        <!--?= var_dump($moviment); ?-->
    <tr>
    <td><?= $moviment->id ?></td>
        <td><?= $moviment->date ?></td>
        <td><?= $moviment->description ?></td>
        <td><?= $moviment->value ?></td>
        <td><?= $moviment->type ?></td>
    </tr>
        <?php endforeach; ?>
  </tbody>
<table>
    
<?= $this->endSection() ?>

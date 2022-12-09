<!--?php if ( ! defined('base_url()')) exit; 
//Busca o controller onde traz os dados do grafico
// $moviments = new MainController();
// $moviment = $moviments->buscaSaldo();
?-->
<?= $this->extend('Templates/default/index') ?>

<?= $this->section('main') ?>
<div class="wrap" style="padding: 1vw">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    //Transforma o array do php em um json
    var moviments = JSON.parse('<?= json_encode($moviments);?>');
    //Montagem do grafico
    google.charts.load('current', { 'packages': ['line'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      const fromDb = undefined;
        console.log(moviments[0])
        const dataM = fromDb || [];
        for(i = 0, j = 0; i < moviments.length; i++, j++) {
          dataM[j] = moviments[i]['data']
        }
        console.log(dataM.sort())
        //Cria um table que será adicionado ao gráfico
        var data = new google.visualization.DataTable();
        //Adiciona as colunas
        data.addColumn('number', 'Dia');
        data.addColumn('number', 'Entrada');
        data.addColumn('number', 'Saída');

        var grafico = [];

        //Passa por todos os dados do json para popular o grafico
        moviments.forEach((item) => {
            var input;
            var data;
            //Pega apenas o dia da data
            var dataN = item.data.split("-");
            data = dataN[2];
            //console.log(data.sort())
            //Pega o valor de entrada
            var valorI = Math.trunc(item.valorInput);
            input = JSON.parse(JSON.stringify(valorI));
            //Pega o valor de saída
            var valorO = Math.trunc(item.valorOutput);
            var output = JSON.parse(JSON.stringify(valorO));
            //Adiciona no grafico
            grafico.push([parseInt(data), parseInt(input), parseInt(output)]);
        })

        data.addRows(grafico);

        var options = {
            chart: {
                title: 'Entradas e Saídas',
                subtitle: 'em reais (USD)'
            },
            width: 900,
            height: 500
        };

        var chart = new google.charts.Line(document.getElementById('curve_chart'));

        chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script>
  <!-- <form action="<?php echo base_url()?>/filtro" method="POST">
    <select name="year" id="year" class="form-select" id="inputGroupSelect01" style="margin-bottom: 1vw">
      <option value="2022">2022</option>
      <option value="2021">2021</option>
      <option value="2020">2020</option>
      <option value="2019">2019</option>
      <option value="2018">2018</option>
      <option value="2017">2017</option>
      <option value="2016">2016</option>
      <option value="2015">2015</option>
      <option value="2014">2014</option>
      <option value="2013">2013</option>
      <option value="2012">2012</option>
      <option value="2011">2011</option>
      <option value="2010">2010</option>
    </select>
    <select name="mes" id="mes" class="form-select" id="inputGroupSelect01" style="margin-bottom: 1vw">
      <option value="janeiro">Janeiro</option>
      <option value="fevereiro">Fevereiro</option>
      <option value="marco">Março</option>
      <option value="abril">Abril</option>
      <option value="maio">Maio</option>
      <option value="junho">Junho</option>
      <option value="julho">Julho</option>
      <option value="agosto">Agosto</option>
      <option value="setembro">Setembro</option>
      <option value="outubro">Outubro</option>
      <option value="novembro">Novembro</option>
      <option value="dezembro">Dezembro</option>
    </select>
    <button name="filtro">Filtrar</button>
  </form> -->
  <div class="input-group" style="margin-bottom: 2vw;">
        <span class="input-group-text" id="basic-addon1">Cash balance</span>
        <input type="text" class="form-control" id="input-cash-balance" value="R$<?php echo $cash_balance?>" disabled>
    </div>
	<div id="curve_chart" style="width: 100%; height: 500px;"></div>
</div> 

<?= $this->endSection() ?>
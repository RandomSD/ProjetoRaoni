<?php
 include_once 'dbconnect.php';
   $query = "SELECT Sexo_Al FROM aluno WHERE Sexo_Al='MASCULINO'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
  ?>
  <?php
 include_once 'dbconnect.php';
   $query = "SELECT Sexo_Al FROM aluno WHERE Sexo_Al='FEMININO'";
   $result = mysql_query($query);
   $count2 = mysql_num_rows($result);
  ?>
  <?php
 include_once 'dbconnect.php';
   $query = "SELECT Sexo_Al FROM aluno WHERE Sexo_Al='OUTRO'";
   $result = mysql_query($query);
   $count3 = mysql_num_rows($result);
  ?>
  <?php
 include_once 'dbconnect.php';
   $query = "SELECT Cidade_Al FROM aluno WHERE Cidade_Al='Jaboatão dos Guararapes'";
   $result = mysql_query($query);
   $cidade1 = mysql_num_rows($result);
  ?>
    <?php
 include_once 'dbconnect.php';
   $query = "SELECT Cidade_Al FROM aluno WHERE Cidade_Al='Recife'";
   $result = mysql_query($query);
   $cidade2 = mysql_num_rows($result);
  ?>
  <?php
 include_once 'dbconnect.php';
   $query = "SELECT Cidade_Al FROM aluno WHERE Cidade_Al='Olinda'";
   $result = mysql_query($query);
   $cidade3 = mysql_num_rows($result);
  ?>
  <?php
 include_once 'dbconnect.php';
   $query = "SELECT Cidade_Al FROM aluno WHERE Cidade_Al='Paulista'";
   $result = mysql_query($query);
   $cidade4 = mysql_num_rows($result);
  ?>

  <?php  
 ob_start();
 session_start();
 ?>

  <?php
 if(($_SESSION['user2']) == "" ) {
  header("Location: atendimento.php");
  exit;
 }

 ?> 

<!DOCTYPE html>
<html>
<head>
  <title>AREA Gerente</title>
  <meta charset="utf-8">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="_css/estilos.css" >
</head>
<br>
<br>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="index.html">Logo</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="telaConsultaFuncionario.php">GERENCIAR FUNCIONÁRIOS</a></li>
          <li><a href="logout.php?logout">SAIR</a></li>
          
        </ul>
      </div>
    </div>
  </nav>
<div class="row">
  <div class="col-md-6">
    <div id="novidades">
      <div class="panel panel-default">
        <div class="panel-heading">Novidades</div>
        <div class="panel-body jeito">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
      </div>
   </div> 
  </div>
  <div class="col-md-6">
    <div id="novidades">
      <div class="panel panel-default">
        <div class="panel-heading">Olá Gerente!</div>
        <div class="panel-body jeito">Bem vindo de volta! Esta é a sua área de gerenciamento pensada especialmente para melhorar e agilizar o seu trabalho.</div>
      </div>
   </div> 
  </div>
</div>
 <div class="container-fluid">
  <div id="about" class="row">
    <div class="col-sm-6 bg-black">
      <h2>Gráficos de acompanhamento</h2><br>
      <h4>Pensando na sua empresa, inserimos alguns gráficos personalizados na sua página para melhor acompanhamento dos alunos matriculados na sua academia.</h4><br> 
    </div>
    
  </div>
</div>
  <div class="col-sm-6" id="grafico1">
    <h3 class="text-center">Gráfico por sexo</h3>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Sexo', 'Quantidade'],
          ['Feminino',     <?php echo $count2 ?>],
          ['Masculino',   <?php echo $count ?>],
          ['Outros',  <?php echo $count3 ?>],
        ]);

        var options = {
          title: 'Cores representadas ao lado'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
        <div id="piechart" style="width: 600px; height: 300px;"></div>

    </div>


    <div class="col-sm-6">
    <h3 class="text-center">Gráfico por área</h3>
    <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Quantidade", "alunos", { role: "style" } ],
        ["Jaboatão", <?php echo $cidade1 ?>, "#b87333"],
        ["Recife", <?php echo $cidade2 ?>, "silver"],
        ["Olinda", <?php echo $cidade3 ?>, "gold"],
        ["Paulista", <?php echo $cidade4 ?>, "color: #e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Cores representadas ao lado",
        width: 600,
        height: 300,
        bar: {groupWidth: "55%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>

    <div id="columnchart_values" style="width: 300px; height: 300px;"></div>

  </div>
  <hr>
  <footer class="container-fluid">
    <div class="row">  
        <div class="col-md-12 text-center rodape">
        <br>

        <strong>Qualquer duvida contate-nos</strong>
        <br>
        <br>

        <p><span class="glyphicon glyphicon-phone"></span> +55 1515151515</p>
        <p><span class="glyphicon glyphicon-envelope"></span> meuemail@algumacoisa.com</p>
      </div>
    </div>
  </footer>


</body>


</html>
?>
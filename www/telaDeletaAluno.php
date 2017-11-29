<?php
 ob_start();
 session_start();
 if( isset($_SESSION['user'])!="" ){
  header("Location: negado.html");
 }
 include_once 'dbconnect.php';

 $error = false;

 if ( isset($_POST['btn-signup']) ) {
  
//variáveis


  $id = trim($_POST['id']);
  $id = strip_tags($id);
  $id = htmlspecialchars($id);

  //condições

  if( !$error ) {
   $query = "SELECT idAluno FROM aluno WHERE idAluno='$id'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0)
   {
   $query = "DELETE from aluno where idAluno = '$id'";
   $res = mysql_query($query);
   }
    
   if ($res) {
    echo '<script language="javascript">';
  echo 'alert("Aluno cadastrado com sucesso!")';
  echo '</script>';
    unset($name);
   } else {
    echo '<script language="javascript">';
  echo 'alert("Aluno Não Encontrado")';
  echo '</script>';
   } 
    
  }
  
  
 }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Deletar Aluno</title>
  <meta charset="utf-8">
  <link href="" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script>
  function sucesso() 
  {
    alert("sucesso!");</script>
  }
  </script>

  <script>
  function falha() 
  {
    alert("falha!");</script>
  }
  </script>

</head>
<style>
  .navbar {
      margin-bottom: 0;
      background-color: #f4511e;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
  }
  #btn{
    background-color: #f4511e;
    border: none;
  }
  #btn:hover{
    border: 1px solid #f4511e;
    background-color: #fff !important;
    color: #f4511e;
  } 
  h3 {
      font-size: 24px;
      color: #303030;
      font-weight: 300;
      margin-bottom: 30px;
  }  

</style>
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
          <li><a href="#about">INICIO</a></li>
          <li><a href="#services">OPÇÕES</a></li>
          
        </ul>
      </div>
    </div>
  </nav>

  <div id="main" class="container-fluid">
  
      
      
    <h3 class="page-header">DELETAR ALUNO</h3>
    <br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
      <div class="alert-alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    </div>
      <div class="row">
        <div class="form-group col-md-3">
          <label for="nome">Id do aluno</label>
          <input type="number" name="id" class="form-control">          
        </div>
        </div>
    <hr />    
    <div class="row">
      <div class="col-md-12">
        <button type="submit" id="btn" name="btn-signup" class="btn btn-danger">Deletar</button>
      <a href="TelaConsultaAluno.php" class="btn btn-default">Cancelar</a>
      </div>
    </div>
    </form>
  </div>
</body>

</html>
<?php ob_end_flush(); ?>
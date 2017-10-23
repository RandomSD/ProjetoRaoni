<?php
 ob_start();
 session_start();
 if( isset($_SESSION['user'])!="" ){
  header("Location: home.php");
 }
 include_once 'dbconnect.php';

 $error = false;

 if ( isset($_POST['btn-signup']) ) {
  
//variáveis
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $cpf = trim($_POST['cpf']);
  $cpf = strip_tags($cpf);
  $cpf = htmlspecialchars($cpf);

  $rg = trim($_POST['rg']);
  $rg = strip_tags($rg);
  $rg = htmlspecialchars($rg);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  $pass2 = trim($_POST['pass2']);
  $pass2 = strip_tags($pass2);
  $pass2 = htmlspecialchars($pass2);

  $nascimento = trim($_POST['nascimento']);
  $nascimento = strip_tags($nascimento);
  $nascimento = htmlspecialchars($nascimento);

  $telefone = trim($_POST['telefone']);
  $telefone = strip_tags($telefone);
  $telefone = htmlspecialchars($telefone);

  $celular = trim($_POST['celular']);
  $celular = strip_tags($celular);
  $celular = htmlspecialchars($celular);

  $cep = trim($_POST['cep']);
  $cep = strip_tags($cep);
  $cep = htmlspecialchars($cep);

  $endereco = trim($_POST['endereco']);
  $endereco = strip_tags($endereco);
  $endereco = htmlspecialchars($endereco);

  $numero = trim($_POST['numero']);
  $numero = strip_tags($numero);
  $numero = htmlspecialchars($numero);

  $estado = trim($_POST['estado']);
  $estado = strip_tags($estado);
  $estado = htmlspecialchars($estado);

  $cidade = trim($_POST['cidade']);
  $cidade = strip_tags($cidade);
  $cidade = htmlspecialchars($cidade);

  $bairro = trim($_POST['bairro']);
  $bairro = strip_tags($bairro);
  $bairro = htmlspecialchars($bairro);

  $pergunta = trim($_POST['pergunta']);
  $pergunta = strip_tags($pergunta);
  $pergunta = htmlspecialchars($pergunta);

  $resposta = trim($_POST['resposta']);
  $resposta = strip_tags($resposta);
  $resposta = htmlspecialchars($resposta);

  $empresa = trim($_POST['empresa']);
  $empresa = strip_tags($empresa);
  $empresa = htmlspecialchars($empresa);

  //condições
  if (empty($name)) {
   $error = true;
   $nameError = "Por favor digite seu Nome .";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Nome deve conter no mínimo 3 caracteres.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Use apenas letras.";
  }
  

  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Por favor informe um E-Mail válido.";
  } else {
  
   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "E-Mail já cadastrado.";
   }
} 
   $query = "SELECT Empresa FROM users WHERE Empresa='$empresa'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
    $error = true;
    $empresaError = "Empresa já cadastrada.";
   }
  
  if (empty($pass)){
   $error = true;
   $passError = "Por favor digite sua senha.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Senha deve ter no mínimo 6 caracteres.";
  }

  if(($pass) != ($pass2)) {
   $error = true;
   $passError = "Senhas nao coincidem.";
   $pass2Error = "Senhas nao coincidem.";
  }

  if(strlen($cpf) < 11) {
   $error = true;
   $passError = "Por favor digite seu CPF.";
  }

  if(strlen($rg) < 7) {
   $rg = true;
   $rgError = "Por favor digite seu RG.";
  }

  $password = hash('sha256', $pass);
  
  
  if( !$error ) {
   
   $query = "INSERT INTO users(userName,userEmail,userPass,Empresa) VALUES('$name','$email','$password','$empresa')";
   $res = mysql_query($query);
    
   if ($res) {
    echo '<script language="javascript">';
	echo 'alert("Conta criada com sucesso!")';
	echo '</script>';
    unset($name);
    unset($email);
    unset($pass);
   } else {
    echo '<script language="javascript">';
	echo 'alert("Algo deu errado . . .")';
	echo '</script>';
   } 
    
  }
  
  
 }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tela Cadastro</title>
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
  
  		
  		
	  <h3 class="page-header">Preencha os campos corretamente</h3>
	  <br>
	  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
	  	<div class="alert-alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    </div>
	  	<div class="row">
	  	  <div class="form-group col-md-4">
	  	  	<label for="nome">Nome</label>
	  	  	<input type="text" name="name" class="form-control" placeholder="Digite o seu nome">
	  	  	<span class="text-danger"><?php echo $nameError; ?></span>
	  	  </div>	  	  
		  <div class="form-group col-md-4">
	  	  	<label for="cpf">CPF</label>
	  	  	<input type="text" name="cpf" maxlength="11" class="form-control" placeholder="Digite o CPF">
	  	  	<span class="text-danger"><?php echo $cpfError; ?></span>
	  	  </div>
		  <div class="form-group col-md-4">
	  	  	<label for="ident">Identidade</label>
	  	  	<input type="text" name="rg" maxlength="7"  class="form-control" placeholder="Digite seu RG">
	  	  	<span class="text-danger"><?php echo $rgError; ?></span>
	  	  </div>	  	  
		</div>

		<div class="row">
	  	  <div class="form-group col-md-4">
	  	  	<label for="email">Email</label>
	  	  	<input type="email" name="email" class="form-control" placeholder="Digite o seu email">
	  	  	<span class="text-danger"><?php echo $emailError; ?></span>
	  	  </div>
		  <div class="form-group col-md-4">
	  	  	<label for="senha">Senha</label>
	  	  	<input type="password" name="pass" class="form-control" placeholder="Digite a sua senha">
	  	  	<span class="text-danger"><?php echo $passError; ?></span>
	  	  </div>
		  <div class="form-group col-md-4">
	  	  	<label for="senha1">Repita sua senha</label>
	  	  	<input type="password" name="pass2" class="form-control" placeholder="Repita a sua senha">
	  	  	<span class="text-danger"><?php echo $pass2Error; ?></span>
	  	  </div>
		</div>
		
		<div class="row">
	  	  <div class="form-group col-md-4">
	  	  	<label for="endereco">Nascimento</label>
	  	  	<input type="date" name="nascimento" class="form-control" placeholder="Nascimento">
	  	  	<span class="text-danger"><?php echo $nascimentoError; ?></span>
	  	  </div>
	  	  <div class="form-group col-md-4">
	  	  	<label for="endereco">Telefone (Opcional)</label>
	  	  	<input type="number" name="telefone" class="form-control" placeholder="Telefone">
	  	  	<span class="text-danger"><?php echo $telefoneError; ?></span>
	  	  </div>
	  	  <div class="form-group col-md-4">
	  	  	<label for="endereco">Celular</label>
	  	  	<input type="number" name="celular" class="form-control" placeholder="Celular">
	  	  	<span class="text-danger"><?php echo $celularError; ?></span>
	  	  </div>	 
		</div>

		<div class="row">
	  	  <div class="form-group col-md-4">
	  	  	<label for="endereco">CEP</label>
	  	  	<input type="number" name="cep" class="form-control" placeholder="Digite o CEP">
	  	  	<span class="text-danger"><?php echo $cepError; ?></span>
	  	  </div>
	  	  <div class="form-group col-md-4">
	  	  	<label for="endereco">Endereço</label>
	  	  	<input type="text" name="endereco" class="form-control" placeholder="Endereço">
	  	  	<span class="text-danger"><?php echo $enderecoError; ?></span>
	  	  </div>
	  	  <div class="form-group col-md-4">
	  	  	<label for="endereco">Número (Opcional)</label>
	  	  	<input type="text" name="numero" class="form-control" placeholder="Nº casa">
	  	  	<span class="text-danger"><?php echo $numeroError; ?></span>
	  	  </div>	 
		</div>

		<div class="row">
	  	  <div class="col-md-4">
	  	  	<label for="civil">Estado</label>	  	  	
		      <select class="form-control" name="estado">
		        <option>Acre</option>
		        <option>Alagoas</option>
		        <option>Amapá</option>
		        <option>Amazonas</option>
		        <option>Bahia</option>
		        <option>Ceará</option>
		        <option>Distrito Federal</option>
		        <option>Espírito Santo</option>
		        <option>Goiás</option>
		        <option>Maranhão</option>
		        <option>Mato Grosso</option>
		        <option>Mato Grosso do Sul</option>
		        <option>Minas Gerais</option>
		        <option>Pará</option>
		        <option>Paraíba</option>
		        <option>Paraná</option>
		        <option>Pernambuco</option>
		        <option>Piauí</option>
		        <option>Rio de Janeiro</option>
		        <option>Rio Grande do Norte</option>
		        <option>Rio Grande do Sul</option>
		        <option>Rondônia</option>
		        <option>Roraima</option>
		        <option>Santa Catarina</option>
		        <option>São Paulo</option>
		        <option>Sergipe</option>
		        <option>Tocantins</option>
		      </select>
	  	  </div>
	  	  <div class="form-group col-md-4">
	  	  	<label for="endereco">Cidade</label>
	  	  	<input type="text" name="cidade" class="form-control" placeholder="Cidade">
	  	  	<span class="text-danger"><?php echo $cidadeError; ?></span>
	  	  </div>
	  	  <div class="form-group col-md-4">
	  	  	<label for="endereco">Bairro</label>
	  	  	<input type="text" name="bairro" class="form-control" placeholder="Bairro">
	  	  	<span class="text-danger"><?php echo $bairroError; ?></span>
	  	  </div>	 
		</div>

		<div class="row">
	  	  <div class="form-group col-md-12">
	  	  	<label for="endereco">Pergunta de segurança</label>
	  	  	<input type="text" name="pergunta" class="form-control" placeholder="Digite a Pergunta">
	  	  	<span class="text-danger"><?php echo $perguntaError; ?></span>
	  	  </div>
		</div>

		<div class="row">
	  	  <div class="form-group col-md-12">
	  	  	<label for="lograd">Resposta</label>
	  	  	<input type="text" name="resposta" class="form-control" placeholder="Digite a Resposta">
	  	  	<span class="text-danger"><?php echo $respostaError; ?></span>
	  	  </div>
		</div>

		<div class="row">
	  	  <div class="form-group col-md-12">
	  	  	<label for="lograd">Nome da Empresa</label>
	  	  	<input type="text" name="empresa" class="form-control" placeholder="Digite o nome da Empresa">
	  	  	<span class="text-danger"><?php echo $empresaError; ?></span>
	  	  </div>
		</div>

		<hr />
		
		<div class="row">
		  <div class="col-md-12">
		  	<button type="submit" id="btn" name="btn-signup" class="btn btn-primary">Cadastrar</button>
			<a href="index.html" class="btn btn-default">Cancelar</a>
		  </div>
		</div>

	  </form>
</div>
 


</body>


</html>
<?php ob_end_flush(); ?>
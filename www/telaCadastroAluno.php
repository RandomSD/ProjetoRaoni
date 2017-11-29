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
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $cpf = trim($_POST['cpf']);
  $cpf = strip_tags($cpf);
  $cpf = htmlspecialchars($cpf);

  $rg = trim($_POST['rg']);
  $rg = strip_tags($rg);
  $rg = htmlspecialchars($rg);

  $nascimento = trim($_POST['nascimento']);
  $nascimento = strip_tags($nascimento);
  $nascimento = htmlspecialchars($nascimento);

  $telefone = trim($_POST['telefone']);
  $telefone = strip_tags($telefone);
  $telefone = htmlspecialchars($telefone);

  $celular = trim($_POST['celular']);
  $celular = strip_tags($celular);
  $celular = htmlspecialchars($celular);

  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

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

  $entrada = trim($_POST['entrada']);
  $entrada = strip_tags($entrada);
  $entrada = htmlspecialchars($entrada);

  $status = trim($_POST['status']);
  $status = strip_tags($status);
  $status = htmlspecialchars($status);

  $sexo = trim($_POST['sexo']);
  $sexo = strip_tags($sexo);
  $sexo = htmlspecialchars($sexo);

  //condições

  if( !$error ) {
   
   $query = "INSERT INTO aluno (Nome_Al,CPF_Al,RG_Al,Nasc_Al,Telefone_Al,Celular_Al,Email_Al,CEP_Al,Endereco_Al,Casa_Al,Bairro_Al,Cidade_Al,Estado_Al,DataEntrada,Status_Al,Sexo_Al) VALUES('$name','$cpf','$rg','$nascimento','$telefone','$celular','$email','$cep','$endereco','$numero','$bairro','$cidade','$estado','$entrada','$status','$sexo')";
   $res = mysql_query($query);
    
   if ($res) {
    echo '<script language="javascript">';
	echo 'alert("Aluno cadastrado com sucesso!")';
	echo '</script>';
    unset($name);
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
	  	  	<label for="entrada">Data Entrada</label>
	  	  	<input type="date" name="entrada" class="form-control">	  	  
	  	  </div>
		  <div class="form-group col-md-2">
	  	  	<label for="status">Status</label>
	  	  	<select class="form-control" name="status">
		        <option value="Ativo">Ativo</option>
		        <option value="Inativo">Inativo</option>
		    </select>	  	  	
	  	  </div>
	  	  <div class="form-group col-md-2">
	  	  	<label for="sexo">Sexo</label>
	  	  	<select class="form-control" name="sexo">
		        <option value="MASCULINO">Masculino</option>
		        <option value="FEMININO">Feminino</option>
		        <option value="OUTRO">Outro</option>
		    </select>	  	  	
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
		    	<option value="Acre">Acre</option>
		        <option value="Alagoas">Alagoas</option>
		        <option value="Amapá">Amapá</option>
		        <option value="Amazonas">Amazonas</option>
		        <option value="Bahia" >Bahia</option>
		        <option value="Ceará" >Ceará</option>
		        <option value="Distrito Federal" >Distrito Federal</option>
		        <option value="Espírito Santo" >Espírito Santo</option>
		        <option value="Goiás" >Goiás</option>
		        <option value="Maranhão" >Maranhão</option>
		        <option value="Mato Grosso" >Mato Grosso</option>
		        <option value="Mato Grosso do Sul" >Mato Grosso do Sul</option>
		        <option value="Minas Gerais" >Minas Gerais</option>
		        <option value="Pará" >Pará</option>
		        <option value="Paraíba" >Paraíba</option>
		        <option value="Paraná" >Paraná</option>
		        <option value="Pernambuco" >Pernambuco</option>
		        <option value="Piauí" >Piauí</option>
		        <option value="Rio de Janeiro" >Rio de Janeiro</option>
		        <option value="Rio Grande do Norte" >Rio Grande do Norte</option>
		        <option value="Rio Grande do Sul" >Rio Grande do Sul</option>
		        <option value="Rondônia" >Rondônia</option>
		        <option value="Roraima" >Roraima</option>
		        <option value="Santa Catarina" >Santa Catarina</option>
		        <option value="São Paulo" >São Paulo</option>
		        <option value="Sergipe" >Sergipe</option>
		        <option value="Tocantins" >Tocantins</option>
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

		<hr />
		
		<div class="row">
		  <div class="col-md-12">
		  	<button type="submit" id="btn" name="btn-signup" class="btn btn-primary">Cadastrar</button>
			<a href="telaconsultaaluno.php" class="btn btn-default">Cancelar</a>
		  </div>
		</div>
	  </form>
	</div>
</body>

</html>
<?php ob_end_flush(); ?>
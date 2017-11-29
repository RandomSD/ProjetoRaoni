 <?php  
 $connect = mysqli_connect("localhost", "root", "", "empresax");  
 $query ="SELECT *, DATE_FORMAT(Nasc_Fun,'%d/%m/%Y') AS niceDate , DATE_FORMAT(Admissao,'%d/%m/%Y') AS niceDate2 
FROM funcionario";  
 $result = mysqli_query($connect, $query);
 ?>  
   <?php  
 ob_start();
 session_start();
 ?>

  <?php
 if(($_SESSION['user2']) == "" ) {
  header("Location: negado.html");
  exit;
 }

 ?>
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Consulta de alunos</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> 
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
           <link rel = "stylesheet" href="_css/estilos1.css">  
      </head>  
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
          <li><a href="gerenciamento.php">VOLTAR</a></li>
          <li><a href="index.php">SAIR</a></li>
          
        </ul>
      </div>
    </div>
  </nav> 

        

  <div id="main" class="container-fluid">


<div class="container">  
                <h3 align="center">Consulta de alunos</h3>  
                <br />
      
    <div class="row">
      <div id ="buttons" class="col-md-5" >
        <a href="telaCadastroFuncionario.php"> <button type="button" class="btn btn-primary">Cadastrar</button></a>
        <a href="telaAlteraFuncionario.php"><button type="button" class="btn btn-warning">Alterar</button></a>
        <a href="telaDeletaFuncionario.php"><button type="button" class="btn btn-danger" >Deletar</button></a>
      </div>

          <br>
          <br>          
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>ID</td>
                                    <td>Nome</td>
                                    <td>CPF</td>
                                    <td>RG</td>
                                    <td>Data de nascimento</td>
                                    <td>Telefone</td>
                                    <td>Celular</td>
                                    <td>E-mail</td>  
                                    <td>Cep</td>
                                    <td>Endereço</td>     
                                    <td>Número</td>               
                                    <td>Bairro</td>
                                    <td>Cidade</td>
                                    <td>Estado</td>
                                    <td>Cargo</td>
                                    <td>Admissão</td>
                                    <td>Status</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                            //NOME DOS CAMPOS DA TABELA
                               echo '  
                               <tr>  
                                    <td>'.$row["idFuncionario"].'</td>  
                                    <td>'.$row["Nome_Fun"].'</td>  
                                    <td>'.$row["CPF_Fun"].'</td>  
                                    <td>'.$row["RG_Fun"].'</td>  
                                    <td>'.$row["niceDate"].'</td>  
                                    <td>'.$row["Telefone_Fun"].'</td>
                                    <td>'.$row["Celular_Fun"].'</td>    
                                    <td>'.$row["Email"].'</td>  
                                    <td>'.$row["CEP_Fun"].'</td> 
                                    <td>'.$row["Endereco_Fun"].'</td>
                                    <td>'.$row["Casa_Fun"].'</td>
                                    <td>'.$row["Bairro_Fun"].'</td>      
                                    <td>'.$row["Cidade_Fun"].'</td>
                                    <td>'.$row["Estado_Fun"].'</td>
                                    <td>'.$row["Cargo"].'</td>
                                    <td>'.$row["niceDate2"].'</td>
                                    <td>'.$row["Status_Fun"].'</td>          
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>
                  
                </div>
              </div>
            </div>     



           <footer class="container-fluid">
    <div class="row">  
        <div class="col-md-12 text-center rodape">
        <br><br><br>

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
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable({
        "language" : br
      });
 });  
 var br = {
    "sEmptyTable": "Nenhum funcioário encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ funcioários",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 alunos",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "_MENU_ funcioários por página",
    "sLoadingRecords": "Carregando...",
    "sProcessing": "Processando...",
    "sZeroRecords": "Nenhum funcioário encontrado",
    "sSearch": "Pesquisar",
    "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
    },
    "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
    }
}
  </script>
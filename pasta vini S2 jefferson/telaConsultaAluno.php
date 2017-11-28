<?php  
 $connect = mysqli_connect("localhost", "root", "", "banco1");  
 $query ="SELECT * FROM testando1 ORDER BY Id DESC";  
 $result = mysqli_query($connect, $query);
 ?>  
<!DOCTYPE html>
<html>
<head>
  <title>Consultar lista alunos</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> 
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />         
           
  <link rel = "stylesheet" href="_css/estilos1.css">
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
          <li><a href="index.html.html">HOME</a></li>
          <li><a href="gerenciamento.html">VOLTAR</a></li>
          <li><a href="index.html">SAIR</a></li>
          
        </ul>
      </div>
    </div>
  </nav>

  <div id="main" class="container-fluid">
    <div id="top" class="row">
    <div class="col-md-5">
        <h2>Informações dos alunos</h2>
    </div>
 
    <div class="col-md-6">
        <div class="input-group">
            <input id="textb" name="data[search]" class="form-control" id="search" type="text" placeholder="CPF/NOME">
               <br>
                <span class="input-group-btn h2">
                   <button id="button" class="btn btn-primary" type="submit">
                       <span class="glyphicon glyphicon-search"></span>
                   </button>
               </span>
            </div>
        </div>
    </div> <!-- /#top -->

      <hr />

      <div id ="buttons" class="col-md-6" >
        <a href="telaCadastroAluno.html"> <button type="button" class="btn btn-primary">Cadastrar</button></a>
        <a href="telaAlteraAluno.html"><button type="button" class="btn btn-warning">Alterar</button></a>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Deletar</button>

        <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          
          <br>
          <br>

      <!-- Modal content-->
         <div class="modal-content">
           <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h4 class="modal-title">Digite a matricula do aluno a ser excluido.</h4>
           </div>
           <div class="modal-body">
                
              <div id="grupo2" class="input-group">
                  <input name="data[search]" class="form-control" id="search" type="text" placeholder="Matricula">
                   <br>
                    <span class="input-group-btn h2">
                      <button id="button" class="btn btn-danger" type="submit">
                         <span class="glyphicon glyphicon-trash"></span>
                      </button>
                    </span>
              </div>
                
            </div>
           <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>  
      <div class="container">  
                <h3 align="center">Consulta de alunos</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Nome</td>  
                                    <td>Email</td>  
                                    <td>CPF</td>  
                                    <td>RG</td>  
                                    <td>Nascimento</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                            //NOME DOS CAMPOS DA TABELA
                               echo '  
                               <tr>  
                                    <td>'.$row["Nome"].'</td>  
                                    <td>'.$row["Email"].'</td>  
                                    <td>'.$row["CPF"].'</td>  
                                    <td>'.$row["RG"].'</td>  
                                    <td>'.$row["Nascimento"].'</td>  
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>       

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
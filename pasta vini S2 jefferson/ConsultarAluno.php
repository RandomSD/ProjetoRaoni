 <?php  
 $connect = mysqli_connect("localhost", "root", "", "empresax");  
 $query ="SELECT * FROM aluno ORDER BY idAluno DESC";  
 $result = mysqli_query($connect, $query);
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
          <li><a href="index.html.html">HOME</a></li>
          <li><a href="gerenciamento.html">VOLTAR</a></li>
          <li><a href="index.html">SAIR</a></li>
          
        </ul>
      </div>
    </div>
  </nav>   
           <br /><br />  

           <div class="container">  
                <h3 align="center">Consulta de alunos</h3>  
                <br />  

  <div class="row">
      <div id ="buttons" class="col-md-5" >
        <a href="telaCadastroAluno.html"> <button type="button" class="btn btn-primary">Cadastrar</button></a>
        <a href="telaAlteraAluno.html"><button type="button" class="btn btn-warning">Alterar</button></a>
        <button type="button" class="btn btn-danger">Deletar</button>
      </div>
 </div>
                <br>

                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>ID</td>
                                    <td>Nome</td>
                                    <td>Sexo</td>
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
                                    <td>Status</td>
                                    <td>Entrada</td>                                    
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                            //NOME DOS CAMPOS DA TABELA
                               echo '  
                               <tr>  
                                    <td>'.$row["idAluno"].'</td>  
                                    <td>'.$row["Nome_Al"].'</td>
                                    <td>'.$row["Sexo_Al"].'</td>   
                                    <td>'.$row["CPF_Al"].'</td>  
                                    <td>'.$row["RG_Al"].'</td>  
                                    <td>'.$row["Nasc_Al"].'</td>  
                                    <td>'.$row["Telefone_Al"].'</td>
                                    <td>'.$row["Celular_Al"].'</td>    
                                    <td>'.$row["Email_Al"].'</td>  
                                    <td>'.$row["CEP_Al"].'</td> 
                                    <td>'.$row["Endereco_Al"].'</td>
                                    <td>'.$row["Casa_Al"].'</td>
                                    <td>'.$row["Bairro_Al"].'</td>      
                                    <td>'.$row["Cidade_Al"].'</td>
                                    <td>'.$row["Estado_Al"].'</td>                                    
                                    <td>'.$row["Status_Al"].'</td>
                                    <td>'.$row["DataEntrada"].'</td>           
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable({
        "language" : br
      });
 });  
 var br = {
    "sEmptyTable": "Nenhum aluno encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ alunos",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 alunos",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "_MENU_ alunos por página",
    "sLoadingRecords": "Carregando...",
    "sProcessing": "Processando...",
    "sZeroRecords": "Nenhum aluno encontrado",
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
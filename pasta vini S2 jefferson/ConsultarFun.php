 <?php  
 $connect = mysqli_connect("localhost", "root", "", "empresax");  
 $query ="SELECT * FROM funcionario ORDER BY idFuncionario DESC";  
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
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">Consulta de Funcionarios</h3>  
                <br />  
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
                                    <td>'.$row["Nasc_Fun"].'</td>  
                                    <td>'.$row["Telefone_Fun"].'</td>
                                    <td>'.$row["Celular_Fun"].'</td>    
                                    <td>'.$row["Email_Fun"].'</td>  
                                    <td>'.$row["CEP_Fun"].'</td> 
                                    <td>'.$row["Endereco_Fun"].'</td>
                                    <td>'.$row["Casa_Fun"].'</td>
                                    <td>'.$row["Bairro_Fun"].'</td>      
                                    <td>'.$row["Cidade_Fun"].'</td>
                                    <td>'.$row["Estado_Fun"].'</td>
                                    <td>'.$row["Cargo"].'</td>
                                    <td>'.$row["Admissao_Fun"].'</td>
                                    <td>'.$row["Status_Fun"].'</td>          
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
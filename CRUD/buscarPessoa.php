<?php
include_once("config.php");
session_start();

if(isset($_SESSION["usuario"])){

    $pesquisa = $conn->real_escape_string($_POST['pesquisa']);
    $pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
    $qtd_result_pg = filter_input(INPUT_POST, 'qtd_result_pg', FILTER_SANITIZE_NUMBER_INT);

    //calcula o começo da visualização
    $inicio = ($pagina * $qtd_result_pg) - $qtd_result_pg;

    $sql = "SELECT *
                    FROM tbpessoa
                    where nome_CompletoPessoa like '%$pesquisa%'
                    order by idpessoa
                    LIMIT $inicio, $qtd_result_pg";
    
    //executando o sql
    $dadosPessoas = $conn->query($sql);
    if($dadosPessoas->num_rows > 0){
?>    
       <br><br>
       <table class="table table-striped">
           <tr>
               <th>Id</th>
               <th>Nome Completo</th>
               <th>Estado Civil</th>
               <th>CPF</th>
               <th>Data de nascimento</th>
               <th>Editar</th>
               <?php
               if($_SESSION["tipo"] == 'A') {
                   ?>
                   <th>Excluir</th>
                   <?php                  
               }
               ?>             
           </tr>
           <?php

           while($exibir = $dadosPessoas->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $exibir["idPessoa"] ?></td>
                <td><?php echo $exibir["nomeCompletoPessoa"] ?> </td>
                <td><?php echo $exibir["Sobrenome"] ?> </td>
                <?php

                $sqlEstCivil = "SELECT * FROM tbestcivil WHERE idEstcivil = " .$exibir["idEstcivil"];
                $dadosEstCivil = $conn->query($sqlEstcivil);
                $estCivil = $dadosEstcivil->fetch_assoc();
                ?>
                <td><?php echo $estCivil["estadoCivil"] ?> </td>
                <td><?php echo $exibir["Sexo"] ?> </td>
                <td><a href="editarPessoa.php?idPessoa=<?php echo $exibir["idPessoa"] ?>">
                Editar </a></td>
                <?php
                if ($_SESSION["tipo"] == 'A'){
                    ?>
                    <td>
                        <a href="#" on click="confirmarExclusao(' <?php echo $exibir ["idPessoa"] ?>',
                        ' <?php echo $exibir["nomeCompletoPessoa"] ?>')">
                        </td>

                    <?php
                    }
                    ?>
                </tr>
            <?php
            }

            ?>
        </table>
        <?php    
            }
        
        }
?>
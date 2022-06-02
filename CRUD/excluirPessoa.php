<?php
include_once ("config.php");

if(isset($_GET["idPessoa"])){
    $idpessoa = $_GET["idPessoa"];

$sql = "DELETE FROM tbpessoa WHERE idPessoa = $idpessoa";
    
    if($conn->query($sql) == TRUE ) {
    ?>
    
     <script>
        alert("Exclusão realizada com sucesso");
        window.location = "selecionar_Pessoa.php";
     </script>    
    <?php
       }
                else{
        ?>
          <script>
            alert("Erro ao realizar exclusão");
            window.location = "selecionar_Pessoa.php";
          </script>
        <?php
                      }
                    }

?>
}
?>




    

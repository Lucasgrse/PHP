<?php
include_once ("config.php");

$idpessoa = $_POST["idPessoa"];
$nome = $_POST["txtNome"];
$sobrenome = $_POST["txtSobrenome"];
$sexo = $_POST["sexo"];
$dataNascimento = $_POST['dataNascimento'];
$idEstCivil = $_POST["lEstadoCivil"];

$sql = "UPDATE tbpessoa 
        SET nomePessoa = '$nome', sobrenomePessoa = '$sobrenome', idEstCivil = $idEstCivil, 
        sexo = '$sexo', dataNasc = '$dataNascimento'
        WHERE idPessoa = $idpessoa";

    if($conn->query($sql) == TRUE ) {
    ?>
    
     <script>
        alert("Atualização realizada com sucesso");
        window.location = "selecionar_Pessoa.php";
     </script>    
    <?php
       }
        else{
        ?>
          <script>
            alert("Erro ao realizar atualização");
            window.location = "selecionar_Pessoa.php";
          </script>
        <?php
        }



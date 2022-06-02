<?php
include_once ("config.php");

$nome = $_POST["txtNome"];
$sobrenome = $_POST["txtSobrenome"];
$sexo = $_POST["sexo"];
$dataNascimento = $_POST['dataNascimento'];
$idEstCivil = $_POST["lEstadoCivil"];


$sql = "INSERT INTO tbpessoa(nomePessoa, sobrenomePessoa, idEstCivil, sexo, dataNasc)
        VALUES ('$nome', '$sobrenome', '$idEstCivil', '$sexo', '$dataNascimento')";

    if($conn->query($sql) == TRUE){
        ?>
       <script>
        alert('Registro inserido com sucesso!');
        window.location = "selecionar_Pessoa.php";
        </script>
<?php       
    }else{
         ?>
    <script>
        alert('Erro ao inserir o registro!');
        window.history.back();
        </script>
<?php
}


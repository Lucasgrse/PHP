<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" hrel="https://maxcdn.boostrapcdn.com/bootsrap/4.5.2/js/bootstrap.min.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery/min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" ></script>

<script>
function confirmarExclusao(id, nome_completo){
    let pergunta = "Deseja excluir este arquivo permanentemente?.\n" + id + " - " + nome_completo;
    if(window.confirm(pergunta)){
        window.location = "excluirPessoa.php?idPessoa="+id;
    }
}
</script>
</head>
<body style="margin: 21px">
<h2>Pessoas cadastradas</h2> 

<button onclick="window.location.href='cadastro.php'" style="margin-bottom: 10px;">Cadastrar Novo Usuário</button>
<?php
    include_once ("config.php");

    $sql = "select * from tbpessoa order by idPessoa";

    $consulta = $conn->query($sql);
    
    if($consulta->num_rows > 0){
    ?>
    
    <table style="border: 1px solid black; ">
        <tr>
            <th>ID</th>
            <th>Nome Completo</th>
            <th>Estado Civil</th>
            <th>Data de Nascimento</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
<?php

    while($linha = $consulta->fetch_assoc()){
        ?>
        <tr>
            <td ><?php echo $linha["idPessoa"]?></td>
            <td ><?php echo $linha["nomePessoa"] ." " .$linha['sobrenomePessoa']?></td> 
            
            <?php
            $sqlEstadoCivil = "SELECT * FROM  tbestcivil WHERE idEstCivil =  " . $linha["idEstCivil"];
            $dadosEstadoCivil = $conn->query($sqlEstadoCivil);
            $EstadoCivil = $dadosEstadoCivil ->fetch_assoc();
            ?>

            <td ><?php echo $EstadoCivil['estadoCivil']?></td>

            <td ><?php echo date ("d/m/Y", strtotime ($linha ["dataNasc"]))?></td>

            <td><a href="editar_pessoa.php?idPessoa=<?php echo $linha['idPessoa']?>" title="Editar registro"><i class="fa fa-edit"></i></a></td>

            <td>
                <a href="#" onclick="confirmarExclusao(<?php echo $linha['idPessoa']?>,
            '<?php echo $linha['nomePessoa']?>')"
             title="Excluir registro"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
    <?php
    }

    ?>
</table>
<?php
    } else{
        echo "Nenhum registro encontrado!";
    }
?>
</table>
</body>
</html>
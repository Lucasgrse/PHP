<?php
include_once ("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Usuário</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" hrel="https://maxcdn.boostrapcdn.com/bootsrap/4.5.2/js/bootstrap.min.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" ></script>
</head>
<body style="margin: 20 px;">
    <h1>
    Cadastrar o usuário
    </h1>
    <h2>
    <form action="inserePessoa.php" method="post">
        <div class="form-group-row">
        <label class="co1-sm-2 font-weight0bold col-form-label text-right" for="txtNome">Nome</label>
        <div class="col-sm-10">
                <input type="text" class="form-control" name="txtNome" required placeholder="Por favor, digite seu nome completo:" autofocus>
        </div>
        <div>

        <div class="form-group-row">
        <label class="co1-sm-2 font-weight0bold col-form-label text-right" for="txtNome">Sobrenome</label>
        <div class="col-sm-10">
                <input type="text" class="form-control" name="txtSobrenome" required placeholder="Por favor, digite seu nome completo:" autofocus>
        </div>
        <div>

        <div class="form-group row">
        <label class="col-sm-2 font-weight-bold col-form-label text-right" for="sexo">Sexo</label>
            <div class="col-sm=10">
            <select class="form-control" name="sexo" id="sexo">
                <option value="Feminino">Feminino</option>
                <option value="Masculino">Masculino</option>
            </select>     
            </div>
        </div>
    
        <div class="form-group row">
        <label class="col-sm-2 font-weight-bold col-form-label text-right" for="dateNascimento">Data de Nascimento</label>
            <div class="col-sm=10">
            <input class="form-control" type="date" name="dataNascimento" id="dateNascimento" required>     
            </div>
        </div>


        <div class="form-group row">
        <label class="col-sm-2 font-weight-bold col-form-label text-right" for="lEstadoCivil">Estado Civil</label>
        <div class="col-sm-2">
        <select class="form-control" name="lEstadoCivil" id="idEstadoCivil">
        <?php

            $sql = "select * from tbestcivil";
            $estadoCivil = $conn->query($sql); //executa e retorna
            while($linha = $estadoCivil->fetch_assoc()){
        ?>
            <option value="<?php echo $linha['idEstCivil'];?>"><?php echo $linha['estadoCivil'];?></option>

                <?php

                    }
            
                ?>
            
        </select>
        </div>  
        </div>
        </h2>

        
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
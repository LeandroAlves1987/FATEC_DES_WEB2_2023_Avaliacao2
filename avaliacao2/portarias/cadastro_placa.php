<?php

    require_once('header.php');
    require_once('dados_banco.php');

    $aluno = $_POST['aluno'];
    $placa = $_POST['placa'];

    if(strlen($aluno) > 10 ){
        header("location: cadastro.php");
    }
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO veiculos (aluno, placa) VALUES ('" . $_POST['aluno'] . "', '" . $_POST['placa'] . "')";
        $conn->exec($sql);
        echo "Novo registro criado com sucesso";
    }
    catch(PDOException $e)
    {
        echo "Erro: " . $e->getMessage();
    }
    $conn = null;
?>
 
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Portaria Fatec</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>
            <?php echo $_SESSION["username"]; ?>
            <br>
        </h1>
    </div>
    <p>
    Aluno: <b>
        <?php echo $aluno; ?>
    </b>cadastrado com sucesso.
    <br><br>
        <a href="principal.php" class="btn btn-primary">Voltar</a>
    <br><br>
    </p>
</body>
</html>
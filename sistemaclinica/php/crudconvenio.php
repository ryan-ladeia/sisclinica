<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <aside class="sidebar">
        <div class="menu">
                <a href="index.php" class="menu-item"><img src="../imagens/home.svg" class="logo" width="35px"></a> <br>
                <br> <br> <br>
                <a href="criaconsulta.php" class="menu-item"><img src="../imagens/calendario.svg" class="logo" width="35px"></a>
                <br> <br> <br> <br> 
                <a href="cadastropac.php" class="menu-item"><img src="../imagens/pessoaadd.svg" class="logo"
                        width="35px"></a> 
                        <br> <br> <br> <br>
                <a href="listamedico.php" class="menu-item"><img src="../imagens/doctor.svg" class="logo"
                        width="35px"></a> 
                         <br> <br> <br> <br>
                <a href="cadastroconvenio.php" class="menu-item"><img src="../imagens/convenio.svg" class="logo"
                        width="35px"></a>  
                        <br> <br> <br> <br>
                <a href="cadastroconsultorio.php" class="menu-item"><img src="../imagens/hospital.svg" class="logo"
                        width="35px"></a>
            </div>
        </aside>

        <main class="main-content-cad">
            <header class="header-crud">
                <h1>convênio cadastrado com sucesso ✅ </h1>
            </header>
<?php
include_once("conexao.php");

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$site = $_POST['site'];

$sql = "INSERT INTO convenio (nome, descricao, telefone, email, `site`) 
        VALUES ('$nome', '$descricao', '$telefone', '$email', '$site')";

$sqlcombanco = $conexao->prepare($sql);

if ($sqlcombanco->execute()) {
    echo "<div class='success-message'>";
    echo "<h3>Ok, o convênio $nome foi cadastrado com sucesso!</h3>";
    echo "<a href='listaconvenio.php' class='success-button'>Visualizar lista de convênios</a>";
    echo "</div>";
} else {
    echo "<div class='error-message'>";
    echo "<h3>Erro: Não foi possível cadastrar o convênio. Por favor, tente novamente.</h3>";
    echo "</div>";
}

?>

</main>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Paciente</title>
</head>
<body>
<div class="container">
<aside class="sidebar">
        <div class="menu">
                <a href="index.php" class="menu-item"><img src="../imagens/home.svg" class="logo" width="35px"></a> <br>
                <br> <br> <br>
                <a href="listaconsulta.php" class="menu-item"><img src="../imagens/calendario.svg" class="logo" width="35px"></a>
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
                <a href="listaconsultorio.php" class="menu-item"><img src="../imagens/hospital.svg" class="logo"
                        width="35px"></a>
            </div>
        </aside>

        <main class="main-content">

<?php
include_once("conexao.php");

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];

    try {
        
        $sql = "DELETE FROM consulta WHERE id_paciente = :id_paciente";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id_paciente', $id);
        $stmt->execute();

        $sql = "DELETE FROM paciente WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo "<h3>Paciente excluído com sucesso!</h3>";
    } catch (PDOException $e) {
        echo "<h3>Erro!</h3> Não foi possível excluir o Paciente. Detalhes: " . $e->getMessage();
    }
} else {
    echo "<h3>Erro!</h3> ID do paciente não foi informado.";
}
?>

<button class="button"><a href="listapaciente.php">Voltar</a></button>

</main>
</div>
</body>
</html>

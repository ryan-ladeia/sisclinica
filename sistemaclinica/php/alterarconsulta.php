<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Alterar Consulta</title>
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
        <header class="header-cad">
                <h1>Alterar Cadastro de Convênio</h1>
            </header>
    <?php
    require_once("conexao.php");

    $id = $_POST['id'];
    $id_medico = $_POST['id_medico'];
    $id_paciente = $_POST['id_paciente'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $procedimento = $_POST['procedimento'];
    $observacoes = $_POST['observacoes'];
    $status = $_POST['status'];

    $sql = "UPDATE consulta
            SET id_medico = '$id_medico',
                id_paciente = '$id_paciente',
                data = '$data',
                horario = '$horario',
                procedimento = '$procedimento',
                observacoes = '$observacoes',
                status = '$status'
            WHERE id = '$id';";
    $sqlcombanco = $conexao->prepare($sql);

    if ($sqlcombanco->execute()) {
        echo "<h3>Ok!</h3> <h3> A consulta foi alterada com sucesso! </h3> ";
    } else {
        echo "<h3>Erro!</h3>";
    }
    ?>
  <button class="button"><a href="listaconsultas.php">Voltar à Lista de Consultas</a></button>

</main>
</div>
</body>
</html>

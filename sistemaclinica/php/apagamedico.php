<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="..css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Convênio</title>
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

include_once('conexao.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $consultaSql = 'SELECT COUNT(*) as total FROM consulta WHERE id_medico = :id';
    $stmt = $conexao->prepare($consultaSql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado['total'] > 0) {
        echo "<script>
                alert('Não é possível excluir o médico porque ele tem consultas associadas.');
                window.location.href = 'listamedico.php'; 
              </script>";
    } else {
    
        $deleteHorariosSql = 'DELETE FROM horarios_atendimento WHERE medico_id = :id';
        $stmt = $conexao->prepare($deleteHorariosSql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $deleteSql = 'DELETE FROM medico WHERE id = :id';
        $stmt = $conexao->prepare($deleteSql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Médico excluído com sucesso.');
                    window.location.href = 'listamedico.php'; 
                  </script>";
        } else {
            echo "<script>
                    alert('Erro ao excluir o médico.');
                    window.location.href = 'listamedico.php'; 
                  </script>";
        }
    }
} else {
    header('Location: listamedicos.php');
}

?>

</main>
</div>
</body>
</html>
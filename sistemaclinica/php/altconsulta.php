<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <h1>Alterar Consulta</h1>
            </header>


<form class="alterar" method="POST" action="alterarconsulta.php">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    
    <label for="id_medico">Médico</label>
    <select id="id_medico" name="id_medico" required>
        <?php
        include_once('conexao.php');
        $retornoMedico = $conexao->prepare('SELECT id, nome FROM medico');
        $retornoMedico->execute();
        foreach($retornoMedico->fetchAll() as $medico) {
            $selected = ($medico['id'] == $id_medico) ? "selected" : "";
            echo "<option value='{$medico['id']}' $selected>{$medico['nome']}</option>";
        }
        ?>
    </select>

    <label for="id_paciente">Paciente</label>
    <select id="id_paciente" name="id_paciente" required>
        <?php
        $retornoPaciente = $conexao->prepare('SELECT id, nome FROM paciente');
        $retornoPaciente->execute();
        foreach($retornoPaciente->fetchAll() as $paciente) {
            $selected = ($paciente['id'] == $id_paciente) ? "selected" : "";
            echo "<option value='{$paciente['id']}' $selected>{$paciente['nome']}</option>";
        }
        ?>
    </select>

    <label for="data">Data</label>
    <input type="date" name="data" value="<?php echo $data ?>" required>

    <label for="horario">Horário</label>
    <input type="time" name="horario" value="<?php echo $horario ?>" required>


    <input type="submit" name="update" value="Alterar">
</form>
</main>
</div>
</body>
</html>

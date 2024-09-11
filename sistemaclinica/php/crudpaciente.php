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
                <h1>Paciente cadastrado com sucesso ✅ </h1>
            </header>
<?php
include_once("conexao.php");

$nome = $_POST['nome'];
$nascimento = $_POST['nascimento'];
$sexo = $_POST['sexo'];
$estadocivil = $_POST['estadocivil']; 
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$nacionalidade = $_POST['nacionalidade'];
$naturalidade = $_POST['naturalidade'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$condicoesmedicas = $_POST['condicoes-medicas'];
$medicacoes = $_POST['medicacoes'];
$historico = $_POST['historico-cirurgias'];
$alergias = $_POST['alergias'];
$emergencia = $_POST['contato-emergencia'];
$tiposanguineo = $_POST['tipo-sanguineo'];
$convenio = $_POST['tipo-paciente'];

try {
    
    $sql = "INSERT INTO paciente (nome, nascimento, sexo, estadocivil, rg, cpf, nacionalidade, naturalidade, endereco, telefone, email, convenio, condicoesmedicas, medicacoes, historico, alergias, emergencia, tiposanguineo) 
            VALUES (:nome, :nascimento, :sexo, :estadocivil, :rg, :cpf, :nacionalidade, :naturalidade, :endereco, :telefone, :email, :convenio, :condicoesmedicas, :medicacoes, :historico, :alergias, :emergencia, :tiposanguineo)";
    
    $stmt = $conexao->prepare($sql);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':nascimento', $nascimento);
    $stmt->bindParam(':sexo', $sexo);
    $stmt->bindParam(':estadocivil', $estadocivil);
    $stmt->bindParam(':rg', $rg);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':nacionalidade', $nacionalidade);
    $stmt->bindParam(':naturalidade', $naturalidade);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':convenio', $convenio);
    $stmt->bindParam(':condicoesmedicas', $condicoesmedicas);
    $stmt->bindParam(':medicacoes', $medicacoes);
    $stmt->bindParam(':historico', $historico);
    $stmt->bindParam(':alergias', $alergias);
    $stmt->bindParam(':emergencia', $emergencia);
    $stmt->bindParam(':tiposanguineo', $tiposanguineo);

    if ($stmt->execute()) {
        echo "<div class='success-message'>";
        echo "<h3>Ok, o paciente $nome foi incluído com sucesso!</h3>";
        echo "<a href='listapaciente.php' class='success-button'>Visualizar lista de usuários</a>";
        echo "</div>";
    } else {
        echo "<div class='error-message'>";
        echo "<h3>Erro: Não foi possível incluir o paciente. Por favor, tente novamente.</h3>";
        echo "</div>";
    }
} catch (PDOException $e) {
    echo "<div class='error-message'>";
    echo "<h3>Erro: " . $e->getMessage() . "</h3>";
    echo "</div>";
}
?>

</main>
</div>
</body>
</html>
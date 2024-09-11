<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Convênio</title>
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
                <h1>Cadastro de Convênio</h1>
                <a href="listaconvenio.php" class="add"> <img src="../imagens/hospital.svg" width="35px"></a>
            </header>
<div class="fomulario">
<form class="cadastro" method="POST" action="crudconvenio.php">
<div class="form-group">
    <label for="nome">Nome Completo</label>
    <input type="text" name="nome" placeholder="Nome do Convênio" required>
</div>
<div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" name="descricao" placeholder="Descrição do Convênio">
</div>
<div class="form-group">
    <label for="telefone">Telefone</label>
    <input type="tel" name="telefone" placeholder="Telefone">
</div>
<div class="form-group">
    <label for="email">E-mail</label>
    <input type="email" name="email" placeholder="E-mail">
</div>
<div class="form-group">
    <label for="site">Site</label>
    <input type="url" name="site" placeholder="Site">
</div>
<input type="submit" class="cad-button" value="Cadastrar Convênio">

</form>
</div>


</main>
</div>
</body>
</html>

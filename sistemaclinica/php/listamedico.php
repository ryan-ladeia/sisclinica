<?php 
include_once('conexao.php');

$sql = 'SELECT medico.*, 
               GROUP_CONCAT(DISTINCT horarios_atendimento.dia ORDER BY horarios_atendimento.dia SEPARATOR ",") as dias,
               GROUP_CONCAT(DISTINCT CONCAT(horarios_atendimento.horario_inicio, "-", horarios_atendimento.horario_fim) ORDER BY horarios_atendimento.horario_inicio SEPARATOR ",") as horarios 
        FROM medico 
        LEFT JOIN horarios_atendimento ON medico.id = horarios_atendimento.medico_id
        GROUP BY medico.id';

$retorno = $conexao->prepare($sql);
$retorno->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Lista de Médicos</title>

   
     <script>
        function confirmarExclusao(nome) {
            return confirm('Deseja mesmo excluir os registros do médico ' + nome + '?');
        }
    </script>
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

        <main class="main-content-cad">

        <header class="header-cad">
                <h1>Médicos</h1>
                <a href="cadastromedico.php" class="add"><img src="../imagens/doctoradd.svg" width="35px"></a>
            </header>
            <table> 
                 <thead>
   <!--  <tr>
        <th>Nome</th>
        <th>CRM</th>
        <th>Especialidade</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Endereço</th>
        <th>Consultório</th>
        <th>Atendimento</th>
        <th>Alterar</th>
        <th>Excluir</th>
    </tr>-->
</thead> 
                <tbody>
                <?php foreach($retorno->fetchAll() as $value) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($value['nome']); ?></td> 
                        <td><?php echo htmlspecialchars($value['crm']); ?></td> 
                        <td><?php echo htmlspecialchars($value['especialidade']); ?></td> 
                        <td><?php echo htmlspecialchars($value['telefone']); ?></td> 
                        <td><?php echo htmlspecialchars($value['email']); ?></td> 
                        <td><?php echo htmlspecialchars($value['endereco']); ?></td> 
                        <td><?php echo htmlspecialchars($value['consultorio']); ?></td> 
                        <td>
                            <div class="dropdown">
                                
                                <div class="dropdown-content">             
                                    <h3>Horario de atendimento:</h3>
                                    <strong>Dias:</strong>
                                    <select disabled>
                                        <?php 
                                        if (!empty($value['dias'])) {
                                            $dias = explode(',', $value['dias']);
                                            foreach($dias as $dia) { ?>
                                                <option><?php echo htmlspecialchars(trim($dia)); ?></option>
                                            <?php }
                                        } else { ?>
                                            <option>Nenhum dia cadastrado</option>
                                        <?php } ?>
                                    </select>
                                    <strong>Horários:</strong>
                                    <select disabled>
                                        <?php 
                                        if (!empty($value['horarios'])) {
                                            $horarios = explode(',', $value['horarios']);
                                            foreach($horarios as $horario) { ?>
                                                <option><?php echo htmlspecialchars(trim($horario)); ?></option>
                                            <?php }
                                        } else { ?>
                                            <option>Nenhum horário cadastrado</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </td> 
                        <td>
                            <form method="POST" action="altmedico.php">
                                <input name="id" type="hidden" value="<?php echo htmlspecialchars($value['id']); ?>"/>
                                <button class="button" type="submit">Alterar</button>
                            </form>
                        </td> 
                        <td>
                            <form method="POST" action="apagamedico.php" onsubmit="return confirmarExclusao('<?php echo htmlspecialchars($value['nome']); ?>')">
                                <input name="id" type="hidden" value="<?php echo htmlspecialchars($value['id']); ?>"/>
                                <button class="button" type="submit">Excluir</button>
                            </form>
                        </td> 
                    </tr>
                <?php } ?> 
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>

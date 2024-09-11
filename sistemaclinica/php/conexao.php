<?php
define('HOST', 'ceteia.guanambi.ifbaiano.edu.br:3306');
define('USUARIO', 'sisclinica');
define('SENHA', 'sisclinica');
define('DBNAME', 'sisclinica');


try{
    $conexao=new pdo('mysql:host='.HOST.';dbname='. DBNAME, USUARIO,SENHA);
}catch(PODException $e){
    echo "Erro: Conexão com barra de dados nao 
    foi realizada com sucesso. Erro gerado" . $e->getMessage();
}

?>
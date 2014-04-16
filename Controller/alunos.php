<?php
require_once '../Model/aluno.class.php';

    $nome           = $_POST['nome'];
    $nomeTratamento = $_POST['nomeTratamento'];
    $cpf            = $_POST['cpf'];
    $email          = $_POST['email'];
    $senha          = $_POST['senha'];
    
    if( (!empty($nome)) && (!empty($nomeTratamento)) && (!empty($cpf)) && (!empty($email)) && (!empty($senha))){
        
        $cadastrar = new aluno();
        echo $cadastrar->cadastrar($nome, $nomeTratamento, $cpf, $email, $senha);
        
    }
    else{
        echo "Campos vazios!";
    }

?>
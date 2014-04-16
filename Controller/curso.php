<?php
session_start(); // Inicia a sessão

require_once '../Model/curso.class.php';

    $curso = $_POST['curso'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];
    $grade = $_POST['grade'];
    
    if((!empty($curso)) && (!empty($descricao))&&(!empty($categoria)) && (!empty($grade))){
        $cadCurso = new curso();
        $cadCurso->cadastrar($curso, $descricao, $categoria, $grade);
        
    }
    else{
        echo "Campo de E-mail ou Senha não preenchido!";
    }

?>